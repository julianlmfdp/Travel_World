import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import { actualizarPais, crearPais, obtenerPais } from '../services/countries';

export default function CountryForm() {
    const { id } = useParams();
    const navigate = useNavigate();
    const [form, setForm] = useState({ nombre: '', codigoIso: '', descripcion: '' });
    const [loading, setLoading] = useState(Boolean(id));
    const [error, setError] = useState('');

    useEffect(() => {
        let activo = true;
        if (id) {
            obtenerPais(id)
                .then((pais) => {
                    if (activo) setForm({ nombre: pais.nombre || '', codigoIso: pais.codigoIso || '', descripcion: pais.descripcion || '' });
                })
                .catch((err) => { if (activo) setError(err.response?.data?.message || 'No se pudo cargar el país.'); })
                .finally(() => { if (activo) setLoading(false); });
        }
        return () => { activo = false; };
    }, [id]);

    const onChange = (e) => setForm({ ...form, [e.target.name]: e.target.value });

    const onSubmit = async (e) => {
        e.preventDefault();
        setError('');
        try {
            if (id) await actualizarPais(id, form);
            else await crearPais(form);
            navigate('/countries');
        } catch (err) {
            const errores = err.response?.data?.errors;
            const detalle = errores ? Object.values(errores).flat().join(' ') : '';
            setError(detalle || err.response?.data?.message || 'No se pudo guardar el país.');
        }
    };

    if (loading) return <p>Cargando país...</p>;

    return (
        <form onSubmit={onSubmit}>
            <h1>{id ? 'Editar país' : 'Nuevo país'}</h1>
            {error && <p style={{ color: 'red' }}>{error}</p>}
            <p><label>Nombre{' '}<input name="nombre" value={form.nombre} onChange={onChange} maxLength="255" required /></label></p>
            <p><label>Código ISO{' '}<input name="codigoIso" value={form.codigoIso} onChange={onChange} maxLength="255" required /></label></p>
            <p><label>Descripción{' '}<textarea name="descripcion" value={form.descripcion} onChange={onChange} /></label></p>
            <button type="submit">{id ? 'Guardar cambios' : 'Crear'}</button>{' '}
            <button type="button" onClick={() => navigate('/countries')}>Cancelar</button>
        </form>
    );
}
