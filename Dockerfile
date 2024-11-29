FROM php:8.2
# Install dependencies
RUN apt-get update -y && apt-get install -y \
    openssl \
    zip \
    unzip \
    git \
    libonig-dev \
    curl

# Install Node.js and npm
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash - \
    && apt-get install -y nodejs
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo mbstring

WORKDIR /app
COPY . /app
RUN composer install
RUN npm install

CMD php artisan serve --host=0.0.0.0 --port=8181
EXPOSE 9000
