#!/bin/sh
envsubst '$LB_UPSTREAM' < /usr/local/etc/haproxy/haproxy.cfg.tmpl > /usr/local/etc/haproxy/haproxy.cfg

exec docker-entrypoint.sh "$@"
