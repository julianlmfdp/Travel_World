import { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import { listar, eliminar } from '../services/reviews';

export default function ReviewsList() {
    const [items, setItems] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState('');

    useEffect(() => {
        listar()
            .then(setItems)
            .catch(() => setError('No se pudo conectar con la API (¿servidor apagado o CORS?)'))
            .finally(() => setLoading(false));
    }, []);

    const borrar = async (id) => {
        if (!window.confirm('¿Eliminar esta reseña?')) return;
        await eliminar(id);
        setItems((prev) => prev.filter((p) => p.id !== id));
    };

    if (loading) return <p>Cargando...</p>;
    if (error) return <p style={{ color: 'red' }}>{error}</p>;

    return (
        <div>
            <h1>Reseñas</h1>
            <table border="1" cellPadding="8">
                <thead>
                    <tr><th>Usuario</th><th>Destino</th><th>Calificación</th><th>Comentario</th><th>Acciones</th></tr>
                </thead>
                <tbody>
                    {items.map((p) => (
                        <tr key={p.id}>
                            <td>{p.usuarioId}</td>
                            <td>{p.destinoId}</td>
                            <td>{p.calificacion}</td>
                            <td>{p.comentario}</td>

                            <td>
                                <Link to={`/Reviews/${p.id}/editar`}>Editar</Link>{' '}
                                <button onClick={() => borrar(p.id)}>Eliminar</button>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
}