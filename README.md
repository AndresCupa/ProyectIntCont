# MobileSync - Proyecto de Integración Continua

Este repositorio contiene el proyecto **MobileSync**, una aplicación Laravel desarrollada como parte del curso de Integración Continua en la Facultad de Ingeniería, Diseño e Innovación.

## Integrantes del Grupo 10

- **JAVIER ANDRÉS MENDOZA CUPA**
- **JHONATAN ARTURO ELNATHAN CARREÑO PRIETO**
- **LUIS ANGELO HERNANDEZ BLANCO**

---

## 📦 Requisitos del Sistema

Asegúrate de tener instalado:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)
- [Git](https://git-scm.com/downloads)
- [Composer](https://getcomposer.org/download/) (para gestionar dependencias de PHP)
- [Laravel 10 o superior](https://laravel.com/docs/12.x/installation)
- [Jenkins](https://www.jenkins.io/download/) (opcional para CI/CD)
- [Ngrok](https://ngrok.com/downloads) (para pruebas de webhook)

---

## 🚀 Clonar el Repositorio

```bash
git clone https://github.com/AndresCupa/ProyectoIntCont.git
cd ProyectoIntCont
```

---

## ⚙️ Configuración del Entorno

1. Copia el archivo de entorno:

```bash
cp .env.example .env
```

2. Genera la clave de la aplicación:

```bash
php artisan key:generate
```

3. Verifica que los valores de conexión a la base de datos coincidan con tu contenedor MySQL.

---

## 🐳 Despliegue con Docker

1. Asegúrate de tener `docker-compose.yml` y los Dockerfile configurados correctamente.
2. Construye e inicia los contenedores:

```bash
docker-compose up -d --build
```

3. Verifica que los servicios estén corriendo:

```bash
docker ps
```

---

## 🧪 Migraciones y Seeders

1. Ingresa al contenedor de la app:

```bash
docker exec -it laravel_app bash
```

2. Ejecuta las migraciones:

```bash
php artisan migrate
```

3. (Opcional) Ejecuta los seeders:

```bash
php artisan db:seed
```

---

## 🔗 Acceso a la Aplicación

Una vez levantados los contenedores, accede desde tu navegador a:

```
http://localhost
```

---

## 🤖 Automatización con Jenkins

Se ha implementado Jenkins en un contenedor Docker para automatizar las siguientes tareas:

- Clonación del repositorio
- Instalación de dependencias
- Configuración del entorno Laravel
- Ejecución de pruebas automatizadas

> El pipeline se activa automáticamente mediante un webhook desde GitHub, utilizando **Ngrok** para exponer Jenkins localmente.

Consulta el archivo [MANUAL_JENKINS.md](./MANUAL_JENKINS.md) para instrucciones completas.

---

## 🧪 Ejecutar Pruebas

Dentro del contenedor Laravel:

```bash
php artisan test
```

---

## 🛠 Estructura del Proyecto

- `docker-compose.yml`: Define servicios para Laravel, Nginx y MySQL.
- `dockerfile.laravel`: Imagen personalizada para el backend.
- `dockerfile.nginx`: Imagen personalizada para el servidor web.
- `Jenkinsfile`: Define el pipeline de integración continua.

---

## 📌 Notas Adicionales

- Verifica que los puertos 8080 (Jenkins) y 80 (Nginx) estén disponibles.
- El proyecto usa una base de datos MySQL expuesta en el contenedor `db`.

---

## 📜 Licencia

Este proyecto se desarrolla con fines académicos. Todos los derechos reservados a los autores.

