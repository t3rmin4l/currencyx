To run, follow:
```
git clone git@github.com:t3rmin4l/currencyx.git
cd currencyx
cp currencyX/.env.example currencyX/.env
cp services/.env.example services/.env
cd services
docker-compose up
```

Run composer:
```
docker exec -it currencyX_app composer install
```

Run migrations:
```
docker exec -it currencyX_app php artisan migrate:fresh 
```

Visit: http://127.0.0.1:6256

Run tests:
```
docker exec -it currencyX_app php artisan test
```