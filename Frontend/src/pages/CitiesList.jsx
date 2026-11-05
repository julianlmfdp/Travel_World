import { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import { eliminarCiudad, listarCiudades } from '../services/cities';

export default function CitiesList() {
    const [items, setItems] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState('');

    const cargar = () => {
        setLoading(true);
        listarCiudades()
            .then(setItems)
            .catch((err) => setError(err.response?.data?.message || 'No se pudieron cargar las ciudades.'))
            .finally(() => setLoading(false));
    };

    useEffect(() => { cargar(); }, []);

    const borrar = async (id) => {
        if (!window.confirm('¿Eliminar esta ciudad?')) return;
        setError('');
        try {
            await eliminarCiudad(id);
            setItems((prev) => prev.filter((ciudad) => ciudad.id !== id));
        } catch (err) {
            setError(err.response?.data?.message || 'No se pudo eliminar la ciudad. Puede tener destinos asociados.');
        }
    };

    if (loading) return <p>Cargando ciudades...</p>;

    return (
        <section>
            <h1>Ciudades</h1>
            {error && <p style={{ color: 'red' }}>{error}</p>}
            <p><Link to="/cities/nueva">Crear ciudad</Link></p>
            {!items.length ? <p>No hay ciudades registradas.</p> : (
                <table border="1" cellPadding="8">
                    <thead>
                        <tr><th>Nombre</th><th>País (ID)</th><th>Región</th><th>Descripción</th><th>Acciones</th></tr>
                    </thead>
                    <tbody>
                        {items.map((ciudad) => (
                            <tr key={ciudad.id}>
                                <td>{ciudad.nombre}</td>
                                <td>{ciudad.paisId}</td>
                                <td>{ciudad.region || '—'}</td>
                                <td>{ciudad.descripcion || '—'}</td>
                                <td>
                                    <Link to={`/cities/${ciudad.id}/editar`}>Editar</Link>{' '}
                                    <button type="button" onClick={() => borrar(ciudad.id)}>Eliminar</button>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            )}
        </section>
    );
}
