ARG WP_VERSION
ARG WP_CLI_VERSION

FROM wordpress:cli-${WP_CLI_VERSION}

FROM wordpress:${WP_VERSION}
COPY --from=0 /usr/local/bin/wp /usr/local/bin/wp
RUN apt-get update
RUN apt-get install -y sudo
ARG UID
ARG GID
RUN sed -i "1iwww-data:x:$UID:$GID::/var/www:/bin/bash" /etc/passwd
RUN sed -i "1iwww-data:x:$GID" /etc/group
RUN echo '%www-data ALL=(ALL) NOPASSWD:ALL' >> /etc/sudoers
RUN chmod 777 /var/www
USER www-data
