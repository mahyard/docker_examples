#!/usr/bin/env bash
envsubst '$MWA_DB_HOST,$MWA_DB_USER,$MWA_DB_PASS,$MWA_DB_NAME' < /var/www/html/config_sample.php > /var/www/html/config.php
if [[ $ENALBE_REMOTE_IP ]]; then
    REGEXP="s/<\/VirtualHost>/\n\tRemoteIPHeader X-Forwarded-For\n\tRemoteIPInternalProxy \/32\n<\/VirtualHost>/g"
    sed -i "$REGEXP" /etc/apache2/sites-available/000-default.conf
    a2enmod remoteip
fi
exec apache2-foreground
