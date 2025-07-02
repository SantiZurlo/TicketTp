# TicketTp
# 🎟️ Sistema Web de Venta de Tickets para Espectáculos

Este proyecto es una **aplicación web completa** desarrollada en **PHP con el framework CodeIgniter**, pensada para gestionar la **venta de tickets para espectáculos** (como obras de teatro, recitales, shows en vivo, etc.).

Incluye funcionalidades de registro de usuarios, compra de entradas, administración de eventos, y control de stock de tickets. Se ejecuta localmente con **XAMPP** y usa **MySQL/phpMyAdmin** como base de datos.

---

## ⚙️ Tecnologías usadas

- 🧱 **Backend**: PHP 8.x + CodeIgniter 3/4  
- 💾 **Base de datos**: MySQL (phpMyAdmin)  
- 🔧 **Servidor local**: XAMPP  
- 🌐 **Frontend**: HTML, CSS, Bootstrap (opcional)

---

## 🎯 Funcionalidades principales

| Módulo               | Función                                                                 |
|----------------------|-------------------------------------------------------------------------|
| 👤 Registro/Login     | Autenticación de usuarios y administradores                             |
| 🎭 Gestión de eventos | ABM de espectáculos (nombre, lugar, fecha, capacidad, precio, imagen)   |
| 🎟️ Compra de tickets  | Los usuarios pueden seleccionar eventos y adquirir entradas             |
| 📦 Stock de tickets   | Se descuenta automáticamente al realizar una compra                     |
| 🗃️ Panel de admin     | Permite a los administradores gestionar eventos y ver ventas            |
| 📈 Resumen de compras | Muestra historial de tickets adquiridos por cada usuario                |

---


## 🧪 Cómo ejecutar el proyecto

### 1. Clonar o descargar

git clone https://github.com/SantiZurlo/TicketTp.git

### 2. Configurar XAMPP

-Copiar el proyecto en la carpeta htdocs/ de XAMPP
-Iniciar Apache y MySQL desde el panel de control de XAMPP

### 3. Base de datos
-Abrir phpMyAdmin e importar el archivo tickets_de_espectaculo.sql
-Verificar nombre de la base y credenciales en:application/config/database.php
-Los usuarios y contraseñas se encuanteran en el archivo usuarios.txt

### 4. Configurar base URL
-Editar application/config/config.php

### 5. Navegar
http://localhost/tickettp/

## 📸  Imagenes de la página
![Inicio](assets/foto1)
![Espectaculo](assets/foto2)
![Panel de admin](assets/foto3)
![Detalle de ventas](assets/foto4)
![Modificacion de Espectaculos](assets/foto5)

## Autor 
Santiago Zurlo
