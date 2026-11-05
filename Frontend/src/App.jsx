import { Routes, Route, Link, Navigate } from 'react-router-dom';
import ReviewsList from './pages/reviewsList';
import ReviewsForm from './pages/reviewsForm';
import CitiesList from './pages/CitiesList';
import CityForm from './pages/CityForm';
import CountriesList from './pages/CountriesList';
import CountryForm from './pages/CountryForm';

export default function App() {
  return (
    <>
      <nav style={{ display: 'flex', gap: 16, padding: 16 }}>
        <Link to="/reviews">Reseñas</Link>
        <Link to="/reviews/nuevo">Nueva</Link>
        <Link to="/cities">Ciudades</Link>
        <Link to="/cities/nueva">Nueva ciudad</Link>
        <Link to="/countries">Países</Link>
        <Link to="/countries/nuevo">Nuevo país</Link>
      </nav>
      <main style={{ padding: 16 }}>
        <Routes>
          <Route path="/" element={<Navigate to="/reviews" replace />} />
          <Route path="/reviews" element={<ReviewsList />} />
          <Route path="/reviews/nuevo" element={<ReviewsForm />} />
          <Route path="/reviews/:id/editar" element={<ReviewsForm />} />
          <Route path="/cities" element={<CitiesList />} />
          <Route path="/cities/nueva" element={<CityForm />} />
          <Route path="/cities/:id/editar" element={<CityForm />} />
          <Route path="/countries" element={<CountriesList />} />
          <Route path="/countries/nuevo" element={<CountryForm />} />
          <Route path="/countries/:id/editar" element={<CountryForm />} />
          <Route path="*" element={<p>Página no encontrada</p>} />
        </Routes>
      </main>
    </>
  );
}
