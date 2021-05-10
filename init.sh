rm -rf ./bootstrap/cache/config.php
rm -rf ./bootstrap/cache/packages.php
rm -rf ./bootstrap/cache/routes-v7.php
rm -rf ./bootstrap/cache/services.php
docker-compose up --build -d
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan optimize
docker-compose exec app php artisan run:migrate demo
docker-compose exec app php artisan run:seed demo


