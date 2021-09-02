FROM php:7.2-apache

ENV MWA_DB_HOST='mydbms' MWA_DB_USER='root' MWA_DB_PASS='' MWA_DB_NAME='mwa_db'

RUN bash -c "set -xe \
    && apt-get update  \
    && apt-get install -y --no-install-recommends gettext-base vim \
    && docker-php-ext-install mysqli \
    && find /var/lib/apt/lists/ -type f -delete \
    && ln -f -s /dev/stdout /var/log/apache2/access.log \
    && ln -f -s /dev/stderr /var/log/apache2/error.log" >/dev/null

COPY src /var/www/html/
COPY start.sh /

CMD ["bash", "/start.sh"]
