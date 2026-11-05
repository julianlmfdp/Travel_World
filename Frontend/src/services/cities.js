import api from '../api/axios';

export const listarCiudades = () => api.get('/cities').then((r) => r.data);
export const obtenerCiudad = (id) => api.get(`/cities/${id}`).then((r) => r.data);
export const crearCiudad = (datos) => api.post('/cities', datos).then((r) => r.data);
export const actualizarCiudad = (id, datos) => api.put(`/cities/${id}`, datos).then((r) => r.data);
export const eliminarCiudad = (id) => api.delete(`/cities/${id}`);
export const listarPaises = () => api.get('/countries').then((r) => r.data);
