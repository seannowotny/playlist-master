# What this repo is about
This is an online application which seeks to give the best playlist experience possible.
Composition of playlists and community features are at the core of this website.
This project is current work in progress. Feel free to contribute to get this web app up and running.

# How to clone and repreduce this repo with XAMPP
Open c:/xampp/apache/conf/extra/vhosts.conf and add the following rule

```
<VirtualHost localhost:80>
  DocumentRoot "c:/xampp/htdocs/playlist-master/frontend/public" 
  <Directory "c:/xampp/htdocs/playlist-master/frontend/public">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
  </Directory>
</VirtualHost>
```

In your browser enter localhost/phpmyadmin in the url bar and create DBs called playlist-master and playlist-master-testing with utf8mb4_unicode_ci
Open a command line interface of your choice and type the following

```
cd c:/xampp/htdocs
git clone https://github.com/seannowotny/playlist-master.git
cd raddite
```

Create a .env file and enter the following

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=playlist-master
DB_USERNAME=root
DB_PASSWORD=
```

Back to the command line interface

```
cd ./backend
php artisan key:generate
rm composer.lock
composer install
php artisan passport:install --force
cd ../frontend
npm install
cd ../backend
php artisan migrate
```

Optional:

```
php artisan db:seed --no-interaction
```

To open the react application, open your browser and enter localhost:3000 into the url bar 
and enter the following into your command line interface

```
cd ../frontend
npm run dev
```
