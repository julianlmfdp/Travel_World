import api from '../api/axios';

export const listarPaises = () => api.get('/countries').then((r) => r.data);
export const obtenerPais = (id) => api.get(`/countries/${id}`).then((r) => r.data);
export const crearPais = (datos) => api.post('/countries', datos).then((r) => r.data);
export const actualizarPais = (id, datos) => api.put(`/countries/${id}`, datos).then((r) => r.data);
export const eliminarPais = (id) => api.delete(`/countries/${id}`);
