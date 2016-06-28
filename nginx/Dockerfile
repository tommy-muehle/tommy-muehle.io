FROM nginx
MAINTAINER Tommy Muehle <tommy.muehle@gmail.com>
RUN apt-get update
RUN apt-get --only-upgrade -y install openssl
COPY certs/tommy-muehle_de.bundle /etc/nginx/certs/tommy-muehle_de.bundle
COPY certs/tommy-muehle_de.key /etc/nginx/certs/tommy-muehle_de.key
COPY sites-enabled/tommy-muehle_de /etc/nginx/conf.d/default.conf
COPY conf/dh4096.pem /etc/nginx/dh4096.pem
COPY conf/forward-secrecy.conf /etc/nginx/forward-secrecy.conf
COPY conf/nginx.conf /etc/nginx/nginx.conf
EXPOSE 80 443
