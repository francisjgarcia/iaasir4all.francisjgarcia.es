FROM debian
MAINTAINER Francis "francisjgarcia94@gmail.com"

RUN apt-get update && \
  apt-get install -y apache2 php libapache2-mod-php php-mysql && \
  apt-get clean && \
  rm -rf /var/lib/apt/lists/*

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2

EXPOSE 80
VOLUME /web

ADD ["datos/virtualhost.conf","/etc/apache2/sites-available"]

RUN a2dissite 000-default.conf && \
  a2ensite virtualhost.conf && \
  service apache2 restart

ENTRYPOINT ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
