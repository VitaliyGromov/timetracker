### Установка и настройка

склонируйте этот репозиторий и выполните следующие команды

выполните команду
```
cp .env.example .env
```
После настройки .env выполните эти команды
```
docker-compose up -d
docker-compose exec -it app bash 
composer install
php artisan key:generate
php artisan migrate --seed
exit
```
после этого перейдите в контейнер с Node.js

```
docker-compose exec -it node bash
npm run dev
```
