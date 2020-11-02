FROM debian

MAINTAINER Francis "francisjgarcia94@gmail.com"

RUN apt-get update && \
  apt-get install -y postgresql

ADD ["datos/database.sql","/tmp/database.sql"]

USER postgres

RUN /etc/init.d/postgresql start && \
  psql --command "CREATE USER usuario WITH PASSWORD 'clave';" && \
  createdb -O usuario dbprueba && \
  psql dbprueba < /tmp/database.sql && \
  psql --dbname=dbprueba --command "UPDATE pg_class SET relowner = (SELECT oid FROM pg_roles WHERE rolname = 'usuario') WHERE relname IN (SELECT relname FROM pg_class, pg_namespace WHERE pg_namespace.oid = pg_class.relnamespace AND pg_namespace.nspname = 'public');"

RUN echo "host all all 0.0.0.0/0 md5" >> /etc/postgresql/9.6/main/pg_hba.conf

RUN echo "listen_addresses='*'" >> /etc/postgresql/9.6/main/postgresql.conf

EXPOSE 5432

CMD ["/usr/lib/postgresql/9.6/bin/postgres", "-D", "/var/lib/postgresql/9.6/main", "-c", "config_file=/etc/postgresql/9.6/main/postgresql.conf"]
