#!/usr/bin/env bash

export DEBIAN_FRONTEND=noninteractive

# Nginx

SITE=$(cat <<EOF
server {
        listen 80;
        server_name glos.dev;
        root /var/www/public;
        index index.php index.html;

        location / {
            try_files \$uri \$uri/ /index.php\$query_string;
        }
        
        location ~ \.php {
            fastcgi_param REQUEST_METHOD \$request_method;
            fastcgi_pass unix:/var/run/php/php7.0-fpm.sock;
            fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
            fastcgi_index index.php;
            include fastcgi_params;
        }
    }
EOF
)

echo "$SITE" >> /etc/nginx/sites-available/glos.dev
ln -s /etc/nginx/sites-available/glos.dev /etc/nginx/sites-enabled/glos.dev
service nginx restart > /dev/null

# MySQL

MYCNF=$(cat <<EOF
[client]
  user=root
  password="vagrant"
[mysql]
  user=root
  password="vagrant"
[mysqldump]
  user=root
  password="vagrant"
[mysqldiff]
  user=root
  password="vagrant"
EOF
)

echo "$MYCNF" >> /home/vagrant/.my.cnf
chown vagrant:vagrant /home/vagrant/.my.cnf
chmod 600 /home/vagrant/.my.cnf

# Create Database

mysql -u root -pvagrant -e "CREATE DATABASE glos"
mysql -u root -pvagrant -e "GRANT ALL PRIVILEGES ON glos.* TO 'vagrant'@'localhost' IDENTIFIED BY 'vagrant'"

# Laravel
chmod 777 /var/www/storage -R

# Composer
wget --quiet https://getcomposer.org/composer.phar
mv composer.phar /usr/local/bin/composer
chmod +x /usr/local/bin/composer

# Update Package Repo
apt-get update -y

# Front-End Build
apt-get install -y nodejs
apt-get install -y npm

# Misc
apt-get install -y curl

# GLOS App Setup
cd /var/www
cp .env.example .env
