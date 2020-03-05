FROM php:7.2-apache

ENV MWA_DB_HOST='mydbms' MWA_DB_USER='root' MWA_DB_PASS='' MWA_DB_NAME='mwa_db'

RUN apt-get update && apt-get install -y --no-install-recommends gettext-base vim

RUN docker-php-ext-install mysqli

RUN rm /var/log/apache2/access.log /var/log/apache2/error.log
RUN ln -s /dev/stdout /var/log/apache2/access.log
RUN ln -s /dev/stderr /var/log/apache2/error.log

COPY src /var/www/html/
COPY start.sh /

CMD ["bash", "/start.sh"]
