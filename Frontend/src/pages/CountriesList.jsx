import { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import { eliminarPais, listarPaises } from '../services/countries';

export default function CountriesList() {
    const [items, setItems] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState('');

    useEffect(() => {
        listarPaises()
            .then(setItems)
            .catch((err) => setError(err.response?.data?.message || 'No se pudieron cargar los países.'))
            .finally(() => setLoading(false));
    }, []);

    const borrar = async (id) => {
        if (!window.confirm('¿Eliminar este país?')) return;
        setError('');
        try {
            await eliminarPais(id);
            setItems((prev) => prev.filter((pais) => pais.id !== id));
        } catch (err) {
            setError(err.response?.data?.message || 'No se pudo eliminar el país. Si tiene ciudades asociadas, elimínalas primero.');
        }
    };

    if (loading) return <p>Cargando países...</p>;

    return (
        <section>
            <h1>Países</h1>
            {error && <p style={{ color: 'red' }}>{error}</p>}
            <p><Link to="/countries/nuevo">Crear país</Link></p>
            {!items.length ? <p>No hay países registrados.</p> : (
                <table border="1" cellPadding="8">
                    <thead>
                        <tr><th>Nombre</th><th>Código ISO</th><th>Descripción</th><th>Acciones</th></tr>
                    </thead>
                    <tbody>
                        {items.map((pais) => (
                            <tr key={pais.id}>
                                <td>{pais.nombre}</td>
                                <td>{pais.codigoIso}</td>
                                <td>{pais.descripcion || '—'}</td>
                                <td>
                                    <Link to={`/countries/${pais.id}/editar`}>Editar</Link>{' '}
                                    <button type="button" onClick={() => borrar(pais.id)}>Eliminar</button>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            )}
        </section>
    );
}
