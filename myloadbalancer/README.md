## Change upstream

```bash
export LB_UPSTREAM=kavenegar.com
```

## Check configuration syntax

```bash
docker container run --rm --name lb-syntaxcheck --env-file myloadbalancer_env -e LB_UPSTREAM -it mahyard/myloadbalancer haproxy -c -f /usr/local/etc/haproxy/haproxy.cfg
```

## Run an LB service

```bash
docker container run --rm --name myloadbalancer --env-file myloadbalancer_env -e LB_UPSTREAM -p 80:80 -p 7000:7000 -d mahyard/myloadbalancer
```
