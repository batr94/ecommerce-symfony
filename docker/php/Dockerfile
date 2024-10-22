FROM php:8.2-fpm

# Устанавливаем нужные пакеты и расширения
RUN apt-get update && apt-get install -y -qq libpq-dev unzip libxml2-dev libicu-dev libonig-dev zlib1g-dev libpng-dev librabbitmq-dev \
    && docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd && docker-php-ext-install pdo_mysql && \
    docker-php-ext-configure intl && docker-php-ext-install intl && \
    pecl install xdebug amqp redis && rm -rf /tmp/pear && docker-php-ext-enable xdebug amqp redis && \
    rm -rf /var/lib/apt/lists/*

# Качаем и устанавливаем composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer --quiet

# Создаем пользователя app, чтобы не работать под рутом
RUN adduser --disabled-password --gecos '' --uid 1000 app
USER app

# Устанавливаем рабочую директорию
WORKDIR /app