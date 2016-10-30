FROM centos:7.2.1511

RUN rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm && \
    rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm
RUN yum install -y httpd wget rsync php70w php70w-common php70w-mysqlnd php70w-gd php70w-mcrypt

COPY wordpress /var/www/html/
COPY httpd.conf /etc/httpd/conf/httpd.conf
COPY wp-config.php /var/www/html/wp-config.php

RUN chown -R apache:apache /var/www/html && \
    chmod 2775 /var/www && \
    find /var/www -type d -exec chmod 2775 {} \; && \
    find /var/www -type f -exec chmod 0664 {} \;

EXPOSE 80

CMD ["/usr/sbin/apachectl", "-DFOREGROUND"]
