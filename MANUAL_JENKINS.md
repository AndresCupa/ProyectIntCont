# Manual de Jenkins para Proyecto Laravel

Este manual describe cómo configurar Jenkins para automatizar la integración y entrega continua (CI/CD) de este proyecto.

## Requisitos Previos

- Docker y Docker Compose instalados
- Git instalado
- Cuenta en GitHub y acceso al repositorio
- Ngrok (para exponer Jenkins local a GitHub)
- Chocolatey en Windows (para instalar ngrok)

## Paso 1: Crear imagen personalizada de Jenkins para Laravel

1. Crear un `Dockerfile` que incluya PHP, Composer y extensiones necesarias de Laravel.
2. Construir la imagen:

```bash
docker build -t jenkins-laravel .
```

## Paso 2: Crear y correr el contenedor de Jenkins

```bash
docker volume create jenkins_home
docker volume create composer_cache

docker run -d -p 8080:8080 -p 50000:50000 \
  -v jenkins_home:/var/jenkins_home \
  -v composer_cache:/root/.composer \
  --name jenkins-laravel-container jenkins-laravel
```

Accede a Jenkins en: http://localhost:8080

Obtén la contraseña de administrador:

```bash
docker exec -it jenkins-laravel-container cat /var/jenkins_home/secrets/initialAdminPassword
```

## Paso 3: Instalar y configurar Jenkins

- Sigue el asistente de instalación.
- Instala los plugins sugeridos.
- Crea el usuario administrador.
- Establece la URL de Jenkins: http://localhost:8080

## Paso 4: Configurar Pipeline con Jenkinsfile

1. En Jenkins, haz clic en "Nueva tarea".
2. Nombre: `TestLaravel`
3. Tipo: **Pipeline**
4. En configuración → Pipeline:
   - Definition: **Pipeline from SCM**
   - SCM: **Git**
   - URL: `https://github.com/AndresCupa/ProyectoIntCont.git`
   - Script Path: `Jenkinsfile`

### Ejemplo de Jenkinsfile:

```groovy
pipeline {
    agent any
    stages {
        stage('Checkout') {
            steps {
                git 'https://github.com/AndresCupa/ProyectoIntCont.git'
            }
        }
        stage('Instalar dependencias') {
            steps {
                sh 'composer install --no-interaction --prefer-dist'
            }
        }
        stage('Configurar Laravel') {
            steps {
                sh '''
                    cp .env.example .env || true
                    php artisan key:generate
                '''
            }
        }
        stage('Ejecutar tests') {
            steps {
                sh 'php artisan test'
            }
        }
    }
}
```

## Paso 5: Configurar Ngrok para recibir webhooks

1. Instalar ngrok en Windows:

```bash
choco install ngrok
```

2. Autenticar ngrok:

```bash
ngrok config add-authtoken TU_TOKEN
```

3. Exponer Jenkins:

```bash
ngrok http 8080
```

4. Copiar la URL generada (ej. https://xxxx.ngrok-free.app)

## Paso 6: Configurar Webhook en GitHub

1. En el repositorio GitHub: Settings → Webhooks → Add webhook.
2. URL: la generada por ngrok.
3. Content type: `application/json`
4. Evento: `Just the push event`

## Prueba del sistema

1. Realiza cambios en el código:

```bash
git add .
git commit -m "JenkinsPrueba"
git push origin master
```

2. Jenkins detectará el `push` mediante webhook.
3. Ejecutará automáticamente el pipeline.
4. Se validarán las pruebas:

```bash
php artisan test
```

## Resultados

- El pipeline descarga el repositorio, instala dependencias, configura el entorno y ejecuta pruebas automáticamente.
- El resultado del pipeline y los tests es visible en la consola de Jenkins.

## Desafíos y Consideraciones

- Jenkins en Windows requiere permisos y configuraciones adicionales.
- Algunos plugins generan conflictos con versiones recientes.
- Errores en la sintaxis del Jenkinsfile interrumpen la ejecución.

## Referencias

- https://dev.to/kennibravo/pipeline-101-for-php-and-laravel-projects-with-jenkins-and-docker-47gh
