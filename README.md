To run, follow:
```
git clone git@github.com:t3rmin4l/currencyx.git
cd currencyx
cp currencyX/.env.example currencyX/.env
cp services/.env.example services/.env
cd services
docker-compose up
```

Run migrations:
```
docker exec -it currencyX_app php artisan migrate:fresh 
```

Run tests:
```
docker exec -it currencyX_app php artisan test
```