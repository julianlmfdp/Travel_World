import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import { actualizarCiudad, crearCiudad, listarPaises, obtenerCiudad } from '../services/cities';

export default function CityForm() {
    const { id } = useParams();
    const navigate = useNavigate();
    const [form, setForm] = useState({ paisId: '', nombre: '', region: '', descripcion: '' });
    const [paises, setPaises] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState('');

    useEffect(() => {
        let activo = true;
        listarPaises()
            .then((data) => { if (activo) setPaises(data); })
            .catch((err) => { if (activo) setError(err.response?.data?.message || 'No se pudieron cargar los países.'); })
            .finally(() => { if (activo) setLoading(false); });

        if (id) {
            obtenerCiudad(id)
                .then((ciudad) => {
                    if (activo) setForm({ paisId: String(ciudad.paisId), nombre: ciudad.nombre || '', region: ciudad.region || '', descripcion: ciudad.descripcion || '' });
                })
                .catch((err) => { if (activo) setError(err.response?.data?.message || 'No se pudo cargar la ciudad.'); });
        }
        return () => { activo = false; };
    }, [id]);

    const onChange = (e) => setForm({ ...form, [e.target.name]: e.target.value });

    const onSubmit = async (e) => {
        e.preventDefault();
        setError('');
        const datos = { ...form, paisId: Number(form.paisId) };
        try {
            if (id) await actualizarCiudad(id, datos);
            else await crearCiudad(datos);
            navigate('/cities');
        } catch (err) {
            const errores = err.response?.data?.errors;
            const detalle = errores ? Object.values(errores).flat().join(' ') : '';
            setError(detalle || err.response?.data?.message || 'No se pudo guardar la ciudad.');
        }
    };

    if (loading) return <p>Cargando países...</p>;

    return (
        <form onSubmit={onSubmit}>
            <h1>{id ? 'Editar ciudad' : 'Nueva ciudad'}</h1>
            {error && <p style={{ color: 'red' }}>{error}</p>}
            {!paises.length && <p style={{ color: 'red' }}>No hay países disponibles. El backend requiere un país para guardar una ciudad.</p>}
            <p>
                <label>País{' '}
                    <select name="paisId" value={form.paisId} onChange={onChange} required>
                        <option value="">Selecciona un país</option>
                        {paises.map((pais) => <option key={pais.id} value={pais.id}>{pais.nombre} (ID {pais.id})</option>)}
                    </select>
                </label>
            </p>
            <p><label>Nombre{' '}<input name="nombre" value={form.nombre} onChange={onChange} maxLength="255" required /></label></p>
            <p><label>Región{' '}<input name="region" value={form.region} onChange={onChange} maxLength="255" /></label></p>
            <p><label>Descripción{' '}<textarea name="descripcion" value={form.descripcion} onChange={onChange} /></label></p>
            <button type="submit" disabled={!paises.length}>{id ? 'Guardar cambios' : 'Crear'}</button>{' '}
            <button type="button" onClick={() => navigate('/cities')}>Cancelar</button>
        </form>
    );
}
