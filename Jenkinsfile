pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                git 'https://github.com/AndresCupa/ProyectIntCont.git'
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

        stage('Ejecutar pruebas') {
            steps {
                sh 'php artisan test'
            }
        }
    }
}

