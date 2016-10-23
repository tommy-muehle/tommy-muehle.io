FROM nginx:mainline-alpine
COPY certs/tommy-muehle_io.bundle /etc/nginx/certs/tommy-muehle_io.bundle
COPY certs/tommy-muehle_io.key /etc/nginx/certs/tommy-muehle_io.key
COPY sites-enabled/tommy-muehle_de /etc/nginx/conf.d/default.conf
COPY conf/dh4096.pem /etc/nginx/dh4096.pem
COPY conf/forward-secrecy.conf /etc/nginx/forward-secrecy.conf
COPY conf/nginx.conf /etc/nginx/nginx.conf
EXPOSE 80 443
