# Get the image with:
# docker pull mahyard/nginx:latest
#
# Run with:
# docker container run --rm --name ng1 -p 80:80 -d mahyard/nginx:latest
#
# Exit with:
# docker container stop ng1

FROM debian:buster-slim

RUN apt update
RUN apt install -y nginx
RUN rm /var/log/nginx/access.log /var/log/nginx/error.log
RUN ln -s /dev/stdout /var/log/nginx/access.log
RUN ln -s /dev/stderr /var/log/nginx/error.log

CMD ["nginx", "-g", "daemon off;"]
