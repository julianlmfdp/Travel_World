import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import { obtener, crear, actualizar } from '../services/reviews';

export default function ReviewsForm() {
    const { id } = useParams();           // undefined si es "nuevo"
    const navigate = useNavigate();
    const [form, setForm] = useState({ usuarioId: '', destinoId: '', calificacion: '', comentario: '' });
    const [error, setError] = useState('');

    useEffect(() => {
        let activo = true;
        if (id) {
            obtener(id)
                .then((p) => {
                    if (activo) setForm({ usuarioId: String(p.usuarioId), destinoId: String(p.destinoId), calificacion: String(p.calificacion), comentario: p.comentario ?? '' });
                })
                .catch((err) => {
                    if (activo) setError(err.response?.data?.message || 'No se pudo cargar la reseña.');
                });
        }
        return () => { activo = false; };
    }, [id]);

    const onChange = (e) => setForm({ ...form, [e.target.name]: e.target.value });

    const onSubmit = async (e) => {
        e.preventDefault();
        setError('');
        try {
            const datos = { ...form, usuarioId: Number(form.usuarioId), destinoId: Number(form.destinoId), calificacion: Number(form.calificacion) };
            if (id) await actualizar(id, datos);
            else await crear(datos);
            navigate('/reviews');
        } catch (err) {
            const errores = err.response?.data?.errors;
            const detalle = errores ? Object.values(errores).flat().join(' ') : '';
            setError(detalle || err.response?.data?.message || 'Error al guardar. Revisa los datos e inténtalo de nuevo.');
        }
    };

    return (
        <form onSubmit={onSubmit}>
            <h1>{id ? 'Editar reseña' : 'Nueva reseña'}</h1>
            {error && <p style={{ color: 'red' }}>{error}</p>}
            <p><label>ID usuario{' '}<input name="usuarioId" type="number" min="1" step="1" value={form.usuarioId} onChange={onChange} required /></label></p>
            <p><label>ID destino{' '}<input name="destinoId" type="number" min="1" step="1" value={form.destinoId} onChange={onChange} required /></label></p>
            <p><label>Calificación (1 a 5){' '}<input name="calificacion" type="number" min="1" max="5" step="1" value={form.calificacion} onChange={onChange} required /></label></p>
            <p><input name="comentario" value={form.comentario} onChange={onChange} placeholder="Comentario" /></p>
            <button type="submit">{id ? 'Guardar cambios' : 'Crear'}</button>{' '}
            <button type="button" onClick={() => navigate('/reviews')}>Cancelar</button>
        </form>
    );
}
