<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg"
             width="400"
             alt="Laravel Logo">
    </a>
</p>

<p align="center">
    <img src="https://img.shields.io/badge/Laravel-11.x-red" alt="Laravel Version">
    <img src="https://img.shields.io/badge/PHP-8.x-blue" alt="PHP Version">
    <img src="https://img.shields.io/badge/Status-Activo-success" alt="Status">
    <img src="https://img.shields.io/badge/Licencia-Privada-important" alt="License">
</p>

## 📑 Sistema de Control de Documentos de Calidad

El **Sistema de Control de Documentos de Calidad** es una aplicación web desarrollada con **Laravel**, diseñada para administrar documentos institucionales de forma segura, organizada y controlada, cumpliendo con estándares de calidad y trazabilidad.

---

## 🚀 Características Principales

- 📂 Gestión centralizada de documentos
- 🏢 Organización por **Áreas**
- 🔐 Control de accesos por **roles y permisos**
- 📁 Secciones **Públicas** y **Privadas** por área
- 🔔 Notificaciones automáticas a responsables de área
- 📄 Listado dinámico con filtros
- 🛡️ Acceso a documentos por zonas restringidas

---

## 🏗️ Estructura Funcional

### Áreas
Cada área del sistema cuenta con:
- Sección pública
- Sección privada
- Responsable asignado
- Control de permisos de visualización

### Documentos
- Subida y administración por área
- Clasificación por visibilidad
- Control de acceso según permisos
- Registro de publicaciones

### Usuarios
- Roles definidos
- Acceso limitado según permisos
- Visualización solo de áreas autorizadas

---

## 🔔 Sistema de Notificaciones

El sistema envía notificaciones automáticas cuando:
- Se publica un nuevo documento
- Un documento pertenece al área del responsable

Las notificaciones pueden enviarse por:
- Correo electrónico
- Notificación interna (Laravel Notifications)

---

## 🧰 Tecnologías Utilizadas

- Laravel
- AdminLTE
- MySQL
- SweetAlert2
- DataTables
- Vite
- Laravel Notifications

---
