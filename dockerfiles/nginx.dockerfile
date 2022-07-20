FROM nginx:stable-alpine

MAINTAINER Chandan Sharma <chandan.sharma@introcept.co>

RUN sed -i "s/user www-data/user www-data /g" /etc/nginx/nginx.conf

ADD config/talent.conf /etc/nginx/conf.d/

RUN addgroup --system www-data; exit 0
RUN adduser --system -G www-data -s /bin/sh -D www-data; exit 0

WORKDIR /var/www/talent