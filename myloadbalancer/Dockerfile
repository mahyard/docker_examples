FROM haproxy:2.4.3-alpine

USER root

RUN apk update
RUN apk add gettext

COPY start_lb.sh /usr/local/bin/
COPY haproxy.cfg.tmpl /usr/local/etc/haproxy/haproxy.cfg.tmpl

RUN chown haproxy:haproxy /usr/local/etc/haproxy/

USER haproxy

ENV LB_UPSTREAM=example.com

ENTRYPOINT ["start_lb.sh"]
CMD ["haproxy", "-f", "/usr/local/etc/haproxy/haproxy.cfg"]
