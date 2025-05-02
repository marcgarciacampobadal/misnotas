# 📝 Aplicación de Notas Simples (PHP + MySQL)

Una aplicación web CRUD para crear, leer, actualizar y eliminar notas, desarrollada con PHP, HTML y MySQL. Ideal para aprender los fundamentos del desarrollo web con backend y base de datos.

## 🚀 Características

- Crear nuevas notas con título y contenido.
- Ver todas las notas guardadas.
- Editar o eliminar notas existentes.
- Interfaz web básica con estilos en CSS.
- Funciona en entorno local con XAMPP.

## 📦 Requisitos

- PHP >= 7.0 (incluido en XAMPP)
- MySQL (también en XAMPP)
- Navegador web
- Git (opcional)

## 🔧 Instalación y uso local

1. Descarga o clona el repositorio:

   ```bash
   git clone https://github.com/tu_usuario/notas_app.git
   ```

2. Copia la carpeta en el directorio `htdocs` de XAMPP:

   Por ejemplo:

   ```
   C:\xampp\htdocs\notas_app\
   ```

3. (Opcional) Crear base de datos MySQL:

   Si tu aplicación requiere base de datos (verifica en `conexion.php`), crea una base de datos `notas` y ejecuta esta consulta en phpMyAdmin:

   ```sql
   CREATE TABLE notas (
       id INT AUTO_INCREMENT PRIMARY KEY,
       titulo VARCHAR(255) NOT NULL,
       contenido TEXT NOT NULL,
       fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```

4. Ejecuta XAMPP, inicia Apache (y MySQL si se usa).

5. Abre el navegador y visita:

   ```
   http://localhost/notas_app/
   ```

## 📁 Estructura del proyecto

```
notas_app/
├── index.php
├── conexion.php
├── css/
│   └── styles.css
└── README.md
```

## 📄 Licencia

Este proyecto es de uso libre con fines educativos. Puedes adaptarlo y reutilizarlo bajo tu responsabilidad.

## 👨‍💻 Autor

Tu Nombre — https://github.com/tu_usuario
