# Tutorial - WordPress

This is a sample project created to demonstrate how to run a scalable WordPress[https://wordpress.org/] website on AWS using [coldbrew-cli](https://github.com/coldbrewcloud/coldbrew-cli).

## 0. Prerequisites

To get started, you will need to install 
- [coldbrew-cli](https://github.com/coldbrewcloud/coldbrew-cli)
- [Docker](https://docs.docker.com/engine/installation/)

And, you will also need
- Your [AWS access keys](http://docs.aws.amazon.com/AWSSimpleQueueService/latest/SQSGettingStartedGuide/AWSCredentials.html)
  - [Sign up](https://aws.amazon.com/) if you don't have an AWS account.
- Your MySQL server connection information: username, password, database host, and, database name
  - See [AWS RDS Tutorial](http://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/CHAP_GettingStarted.CreatingConnecting.MySQL.html) if you want to create a MySQL instance in AWS.

## 1. Clone This Repo

```bash
git clone https://github.com/coldbrewcloud/tutorial-wordpress.git
cd tutorial-wordpress
```

This project contains
- [wordpress](https://github.com/coldbrewcloud/tutorial-wordpress/tree/master/wordpress): WordPress 4.6.1 fresh install
- [Dockerfile](https://github.com/coldbrewcloud/tutorial-wordpress/blob/master/Dockerfile): sample Dockerfile
- [coldbrew.conf](https://github.com/coldbrewcloud/tutorial-wordpress/blob/master/coldbrew.conf): sample [coldbrew-cli](https://github.com/coldbrewcloud/coldbrew-cli) app configuration file
- [httpd.conf](https://github.com/coldbrewcloud/tutorial-wordpress/blob/master/httpd.conf): sample Apache configuration file
- [wp-config.php](https://github.com/coldbrewcloud/tutorial-wordpress/blob/master/wp-config.php): sample WordPress configuraiton file

## 2. Configure WordPress

You typically update [wp-config.php](https://codex.wordpress.org/Editing_wp-config.php) file to configure your WordPress website. In this tutorial, you should update [wp-config.php](https://github.com/coldbrewcloud/tutorial-wordpress/blob/master/wp-config.php) located at the project root, then [Docker build](https://github.com/coldbrewcloud/tutorial-wordpress/blob/master/Dockerfile#L9) will copy the file to a proper location (`wordpress/wp-config.php`).

At the minimum, you should configure 2 things:
- Database settings
  - Update `wp-config.php` file with your MySQL username, password, host, and database name.
  - See more details [here](https://codex.wordpress.org/Editing_wp-config.php#Configure_Database_Settings).
- Configure authentication keys and salts
  - Generate a new keys/salts and update them in `wp-config.php` file.
  - You can use [WordPress secret key service](https://api.wordpress.org/secret-key/1.1/salt/).
  - See more details [here](https://codex.wordpress.org/Editing_wp-config.php#Security_Keys).

## 3. Create a Cluster

Before you can deploy the application, you need to create your first cluster. You can create the cluster using [cluster-create](https://github.com/coldbrewcloud/coldbrew-cli/wiki/CLI-Command:-cluster-create) command.

```bash
coldbrew cluster-create tutorial --disable-keypair
```

<img src="https://raw.githubusercontent.com/coldbrewcloud/assets/master/coldbrew-cli/tutorial-wordpress-cluster-create.gif?v=1" width="800">

_*In this tutorial, `--disable-keypair` flag was used to skip assigning EC2 key pairs to ECS Container Instances, but, that's not recommended if you need to access the instances directly (e.g. via SSH)._

## 4. Deploy App

Now you use [deploy](https://github.com/coldbrewcloud/coldbrew-cli/wiki/CLI-Command:-deploy) command to build the Docker container image and deploy it to AWS ECS.

```bash
coldbrew deploy
```

<img src="https://raw.githubusercontent.com/coldbrewcloud/assets/master/coldbrew-cli/tutorial-wordpress-deploy.gif?v=1" width="800">

## 5. (work in progress)

.... check status, load balancer URL ...

## Notes

### Docker Container

Docker container used in this tutorial contains:
- CentOS 7.2
- Apache/2.4.6 (CentOS)
- PHP 7.0

### Scalable WordPress

To run WordPress in scalable setup, you need to consider following things: 
- Use remote storage for media files (e.g. [S3 Uploads plugin](https://github.com/humanmade/S3-Uploads)).
- Disable automatic version updater (as like [wp-config.php](https://github.com/coldbrewcloud/tutorial-wordpress/blob/master/wp-config.php#L82-L83) in this tutorial)
