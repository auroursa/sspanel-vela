FROM php:8.4-fpm
RUN apt-get update && apt-get install -y netcat-openbsd
RUN apt-get install -y unzip git

# Install PHP extensions
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions curl json mysqli xml pdo_mysql zip-stable

# Compose it
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
WORKDIR /var/www/html/
ENV COMPOSER_ALLOW_SUPERUSER=1

RUN sed -i 's@^disable_functions.*@disable_functions = passthru,exec,system,chroot,chgrp,chown,shell_exec,proc_open,proc_get_status,ini_alter,ini_restore,dl,readlink,symlink,popepassthru,stream_socket_server,fsocket,popen@' /usr/local/etc/php-fpm.conf

RUN #sed -i 's/^listen = .*/listen = \/run\/php\/php8.3-fpm.sock/' /usr/local/etc/php-fpm.d/www.conf
RUN sed -i 's/^user = .*/user = root/' /usr/local/etc/php-fpm.d/www.conf
RUN sed -i 's/^group = .*/group = root/' /usr/local/etc/php-fpm.d/www.conf
#RUN sed -i 's/^;listen.owner = .*/listen.owner = root/' /usr/local/etc/php-fpm.d/www.conf
#RUN sed -i 's/^;listen.group = .*/listen.group = root/' /usr/local/etc/php-fpm.d/www.conf

RUN cp $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini
RUN sed -i 's/^error_reporting = .*/error_reporting = E_ALL \& ~E_DEPRECATED/' $PHP_INI_DIR/php.ini

COPY ./docker-sspanel-entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Run
ENTRYPOINT ["/entrypoint.sh"]
