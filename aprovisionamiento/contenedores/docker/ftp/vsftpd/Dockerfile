FROM debian

RUN apt-get update \
    && apt-get install -y vsftpd libpam-mysql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* \
    && useradd --home /home/vsftpd --gid nogroup -m --shell /bin/false vsftpd \
    && mkdir -p /var/run/vsftpd/empty

EXPOSE 20-21
EXPOSE 10090-10100

ADD ["datos/vsftpd.conf","/etc"]
ADD ["datos/iniciar_vsftpd.sh","/usr/sbin/autostartftp.sh"]

RUN chmod +x /usr/sbin/autostartftp.sh

CMD ["/usr/sbin/autostartftp.sh"]
