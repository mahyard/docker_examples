#!/usr/bin/env bash
envsubst '$MWA_DB_HOST,$MWA_DB_USER,$MWA_DB_PASS,$MWA_DB_NAME' < /var/www/html/config_sample.php > /var/www/html/config.php
exec apache2-foreground
