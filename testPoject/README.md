We must have the following installed on the server:
-Apache Web Serve
-PHP >=7.1.3 with OpenSSL,PDO,MbString(MultibyteString extension),Tokenizer,XML,Ctype(php extension) and JSON PHP Extensions
-Composer – an application-level package manager for the PHP


1.Install Apache and PHP 7.2 alongside other prerequisites:
    $ sudo apt-get install apache2 libapache2-mod-php7.2 php7.2 php7.2-xml php7.2-gd php7.2-opcache php7.2-mbstring 

2.Install Composer:
    ***We can install some useful tools like git version control, curl and unzip packages.
    $ sudo apt install curl git unzip
    ***Now we can install Composer
    $ cd /opt
    $ curl -sS https://getcomposer.org/installer | php
    -The "curl" command download Composer to the "/opt" directory.Since we need composer running globally,we must move it to the "/usr/local/bin" directory under "composer" name
    $ mv composer.phar /usr/local/bin/composer

3.Install Laravel:
    ***We navigate to public_html directory:
    cd /var/www/html
    ***We will create a directory "project-name" with Laravel installation:
    $ sudo composer create-project laravel/laravel project-name --prefer-dist

4.Configure Apache Web Server for Laravel:
    ***We need to assign the necessary permissions to the project directory which will allow access to it from the "www-data" group and give it write permissions to the storage directory:
     sudo chgrp -R www-data /var/www/html/your-project
     sudo chmod -R 775 /var/www/html/your-project/storage
    ***Navigate to "/etc/apache2/sites-available" directory and run the command below to create a configuration file for our Laravel install:
     $ vim /etc/apache2/sites-available/laravel.conf
    ***Add the following content:
    ServerName localhost
    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/html/project-name/public
    AllowOverride All
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined

5.Save the file and Exit:
    ***Finally, we are going to enable the newly created laravel.conf file. But before that, let’s disable the default config file.
    $ sudo a2dissite 000-default.conf
    $ sudo a2ensite laravel.conf
    $ sudo a2enmod rewrite

6.Restart Apache service:
    $ sudo systemctl restart apache2

(To verify that Apache is running execute the command: systemctl status apache2)
(Visit your server’s IP address to see if it works)

-In ENV we have to change the variables related to DB, we have to change the values in the APP variables.
