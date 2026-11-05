import api from '../api/axios';

export const listar     = ()         => api.get('/reviews').then(r => r.data);
export const obtener    = (id)       => api.get(`/reviews/${id}`).then(r => r.data);
export const crear      = (datos)    => api.post('/reviews', datos).then(r => r.data);
export const actualizar = (id, datos) => api.put(`/reviews/${id}`, datos).then(r => r.data);
export const eliminar   = (id)       => api.delete(`/reviews/${id}`);
