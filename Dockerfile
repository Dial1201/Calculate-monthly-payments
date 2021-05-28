# Docker image for installing php & dependencies
# Build with:
# docker build --tag=dial1201/calculate-monthly-payments .
# Run with:
# docker run -it --rm --publish 8000:8000 dial1201/calculate-monthly-payments
# Or for interactive shell:
# docker run -it --rm dial1201/calculate-monthly-payments bash
FROM php:7.4-cli

RUN apt update -qq > /dev/null && apt --yes install --no-install-recommends \
    libmcrypt-dev \
    libonig-dev \
    unzip \
    && apt --yes autoremove && apt --yes clean

RUN curl --silent --show-error https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && curl --silent --show-error https://get.symfony.com/cli/installer | bash \
    && mv ~/.symfony/bin/symfony /usr/local/bin/ \
    && docker-php-ext-install \
    mbstring \
    mysqli \
    pdo \
    pdo_mysql

WORKDIR /app
COPY . /app

RUN composer install

EXPOSE 8000
CMD symfony server:start --no-tls
