FROM nginx
MAINTAINER Tommy Muehle <tommy.muehle@gmail.com>
COPY certs/tommy-muehle_de.crt /etc/nginx/certs/tommy-muehle_de.crt
COPY certs/tommy-muehle_de.key /etc/nginx/certs/tommy-muehle_de.key
COPY sites-enabled/tommy-muehle_de /etc/nginx/conf.d/default.conf
EXPOSE 80 443
