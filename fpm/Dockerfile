FROM php:8.1-fpm

# ставим необходимые для нормальной работы модули
RUN apt-get update && apt-get install -y \
    curl \
    wget \
    git \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
	libpng-dev \
	libonig-dev \
	libzip-dev \
	libmcrypt-dev \
    libpq-dev  \
    && docker-php-ext-install -j$(nproc) iconv mbstring mysqli pdo_mysql  zip \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd
RUN pecl channel-update pecl.php.net && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug \

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Create system user to run Composer and Artisan Commands
#RUN groupadd --gid $gid $uname --non-unique \
#  && useradd --uid $uid --gid $gid $uname -G www-data,root -s /bin/bash
#
#RUN mkdir -p /home/$uname/.composer && \
#    chown -R $uname:$uname /home/$uname

WORKDIR /data

VOLUME /data

EXPOSE 9000
EXPOSE 9003

CMD ["php-fpm"]
