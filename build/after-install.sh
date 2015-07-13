#!/bin/sh -ex

# symlink new release
ln -snf /var/www/tommy-muehle_de/releases/<%= release %>/website /var/www/tommy-muehle_de/current

# clear cache
rm -rf /var/www/tommy-muehle_de/app/cache/*
chmod 777 -Rf /var/www/tommy-muehle_de/app/cache