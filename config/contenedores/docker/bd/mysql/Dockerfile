FROM debian

MAINTAINER Francis "francisjgarcia94@gmail.com"

RUN apt-get update && \
  apt-get -y install mysql-server && \
  service mysql start && \
  mysql -u root -e "grant all privileges on dbprueba.* to 'usuario'@'%' identified by 'clave'" && \
  mysql -u root -e "flush privileges" && \
  mysql -u root -e "CREATE DATABASE dbprueba"

EXPOSE 3306

ADD ["datos/database.sql","/tmp/database.sql"]
ADD ["datos/50-server.cnf","/etc/mysql/mariadb.conf.d/50-server.cnf"]

RUN /bin/bash -c "/usr/bin/mysqld_safe --skip-grant-tables &" && \
  sleep 5 && \
  mysql -u root dbprueba < /tmp/database.sql && \
  rm /tmp/database.sql && \
  mysql -u root -e "UPDATE mysql.user SET Password=PASSWORD('ClaveRoot') WHERE User='root'" && \
  mysql -u root -e "UPDATE mysql.user SET plugin = 'mysql_native_password' WHERE user = 'root'" && \
  mysql -u root -e "flush privileges" && \
  service mysql restart

ENTRYPOINT ["mysqld_safe"]

