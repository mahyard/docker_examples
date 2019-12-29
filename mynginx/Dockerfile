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

CMD ["nginx", "-g", "daemon off;"]
