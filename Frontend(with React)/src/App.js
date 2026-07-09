import { Routes, Route, Navigate } from "react-router-dom";
import { useState, useEffect } from "react";

import Dashboard from "./pages/Dashboard";
import PsychometricTest from "./pages/PsychometricTest";
import Result from "./pages/Result";
import Profile from "./pages/Profile";
import Layout from "./components/layouts/Layout";

function App() {
  const [darkMode, setDarkMode] = useState(() => {
    return localStorage.getItem("theme") === "dark";
  });
  // Apply theme to body
  useEffect(() => {
    if (darkMode) {
      document.documentElement.classList.add("dark");
      localStorage.setItem("theme", "dark");
    } else {
      document.documentElement.classList.remove("dark");
      localStorage.setItem("theme", "light");
    }
  }, [darkMode]);

  return (
    <Routes>
      {/* Default redirect */}
      <Route path="/" element={<Navigate to="/dashboard" />} />

      {/* Wrap all pages inside Layout */}
      <Route
        path="/dashboard"
        element={
          <Layout darkMode={darkMode} toggleTheme={() => setDarkMode(!darkMode)}>
            <Dashboard />
          </Layout>
        }
      />

      <Route
        path="/test"
        element={
          <Layout darkMode={darkMode} toggleTheme={() => setDarkMode(!darkMode)}>
            <PsychometricTest />
          </Layout>
        }
      />

      <Route
        path="/result"
        element={
          <Layout darkMode={darkMode} toggleTheme={() => setDarkMode(!darkMode)}>
            <Result />
          </Layout>
        }
      />

      <Route
        path="/profile"
        element={
          <Layout darkMode={darkMode} toggleTheme={() => setDarkMode(!darkMode)}>
            <Profile />
          </Layout>
        }
      />

      {/* 404 */}
      <Route path="*" element={<h1>404 Not Found</h1>} />
    </Routes>
  );
}

export default App;