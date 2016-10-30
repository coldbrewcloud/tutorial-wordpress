# Tutorial - WordPress

This is a sample project created to demonstrate how to run a scalable WordPress[https://wordpress.org/] website on AWS using [coldbrew-cli](https://github.com/coldbrewcloud/coldbrew-cli).

## 0. Prerequisites

To use [coldbrew-cli]
- Install [coldbrew-cli](https://github.com/coldbrewcloud/coldbrew-cli).
- Install [Docker](https://docs.docker.com/engine/installation/).

You will also need
- your [AWS access keys](http://docs.aws.amazon.com/AWSSimpleQueueService/latest/SQSGettingStartedGuide/AWSCredentials.html)
- MySQL server running somewhere (see [AWS RDS Tutorial](http://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/CHAP_GettingStarted.CreatingConnecting.MySQL.html)) if you want to set up MySQL instance in AWS)

## 1. Clone This Repo

## 2. Configure WordPress

[wp-config.php](https://codex.wordpress.org/Editing_wp-config.php) file is used to configure WordPress website. In this tutorial, we will update [wp-config.php](https://github.com/coldbrewcloud/tutorial-wordpress/blob/master/wp-config.php) located at the project root, then Docker build will copy it to a proper WordPress location. _(See [Dockerfile](https://github.com/coldbrewcloud/tutorial-wordpress/blob/master/Dockerfile) for more details.)_

1. Configure database settings: See [here](https://codex.wordpress.org/Editing_wp-config.php#Configure_Database_Settings).
2. Configure authentication keys and salts: See [here](https://codex.wordpress.org/Editing_wp-config.php#Security_Keys).

## 3. 

## Container Environment

- CentOS 7.2
- Apache/2.4.6 (CentOS)
- PHP 7.0
- WordPress 4.6.1


Points:

- update db connection info
- regen salts: https://api.wordpress.org/secret-key/1.1/salt/
- S3 upload
- disable automatic updater
- HTTPS support
