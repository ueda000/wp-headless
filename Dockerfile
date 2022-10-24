FROM alpine/git
RUN git clone https://github.com/kevinoid/postgresql-for-wordpress.git
RUN cp -r postgresql-for-wordpress/pg4wp /

FROM wordpress
RUN apt-get update
RUN apt-get install -y libpq-dev
RUN docker-php-ext-install pgsql
COPY --from=0 /pg4wp /usr/src/wordpress/wp-content/pg4wp
RUN chown -R www-data:www-data /usr/src/wordpress/wp-content/pg4wp
RUN cd /usr/src/wordpress/wp-content && cp pg4wp/db.php .
