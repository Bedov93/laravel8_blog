FROM php:7.4-fpm

RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    nodejs \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

#RUN docker-php-ext-configure gd \
#  --with-png-dir=/usr/include/ \
#  --with-jpeg-dir=/usr/include/ \
#  --with-freetype-dir=/usr/include/freetype2/

# Install PHP extensions
RUN docker-php-ext-install gd zip mysqli pdo pdo_mysql mbstring exif pcntl bcmath

RUN curl -sS https://getcomposer.org/installer | php -- \
        --filename=composer \
        --install-dir=/usr/local/bin && \
        echo "alias composer='composer'" >> /root/.bashrc && \
        composer
