# Build with:
# docker image build -t mahyard/nginx:latest .
#
# Get the image with:
# docker pull mahyard/nginx:latest
#
# Run with:
# docker container run -v $(pwd)/html/:/var/www/html:ro --rm --name ng1 -p 80:80 -d mahyard/nginx:latest
#
# Exit with:
# docker container stop ng1

FROM debian:buster-slim

RUN apt update
RUN apt install -y nginx
RUN rm /var/log/nginx/access.log /var/log/nginx/error.log
RUN ln -s /dev/stdout /var/log/nginx/access.log
RUN ln -s /dev/stderr /var/log/nginx/error.log

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]
