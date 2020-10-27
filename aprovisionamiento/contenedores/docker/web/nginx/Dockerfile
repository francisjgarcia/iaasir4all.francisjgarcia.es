FROM debian
MAINTAINER Francis "francisjgarcia94@gmail.com"

RUN apt-get update && \
  apt-get install -y nginx && \
  apt-get clean && \
  rm -rf /var/lib/apt/lists/*

EXPOSE 80

VOLUME /web

ADD ["datos/nginx.conf","/etc/nginx/sites-available"]

RUN rm /etc/nginx/sites-enabled/default && \
  ln -s /etc/nginx/sites-available/nginx.conf /etc/nginx/sites-enabled/nginx.conf && \
  service nginx restart

CMD ["nginx", "-g", "daemon off;"]
