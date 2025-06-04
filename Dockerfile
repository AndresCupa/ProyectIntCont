FROM jenkins/jenkins:lts

USER root

# Instalar PHP, Composer y herramientas necesarias
# RUN apt-get update && apt-get install -y \
#     php php-mbstring php-xml php-pdo php-mysql php-xdebug php-curl unzip curl git && \
#     curl -sS https://getcomposer.org/installer | php && \
#     mv composer.phar /usr/local/bin/composer

# Instala PHP y extensiones necesarias
RUN apt-get update && apt-get install -y \
    php php-mbstring php-xml php-pdo php-mysql php-xdebug php-curl \
    unzip curl git

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

USER jenkins

