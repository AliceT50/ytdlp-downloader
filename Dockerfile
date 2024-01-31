FROM debian:latest
RUN echo 'deb http://deb.debian.org/debian bookworm-backports main' >> /etc/apt/sources.list
RUN apt update && DEBIAN_FRONTEND=noninteractive apt install -yq apache2 libapache2-mod-php yt-dlp/bookworm-backports
COPY index.php /var/www/html/index.php
RUN rm /var/www/html/index.html
VOLUME /srv
RUN chmod 777 /srv
EXPOSE 80 443
CMD chmod 777 /srv
CMD apache2ctl -D FOREGROUND
