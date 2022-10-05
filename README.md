# CRUD-app

## Käivitamine
Tekita andmebaas. Kasutasin xampp mysql baasi enda korral.  
Tekita näite pealt .env fail ja täienda andmebaasi ühenduse infot.  
Liigu kausta crud-app ja jooksuta käsud:

```
composer install
php artisan migrate
php artisan serve
```

Rakendus peaks olema kättesaadav aadressil http://127.0.0.1:8000  
Esimesel korral kurdab rakendus, et app_key on puudu. Selle saab seal samas genereerida.  
Pärast lehe värskendust on rakendus töökorras.

