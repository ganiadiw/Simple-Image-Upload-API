## Penggunaan

```
composer install
```
```
Windows (CMD) : copy .env.example .env | Linux (Bash) : cp .env.example .env
```
```
php artisan key:generate
```
Konfigurasi file .env meliputi nama database, google client id dan google client secret, (pastikan client dan secret sama dengan di frontend)
```
php artisan migrate
```
```
php artisan serve
```

## API

### POST
```
/api/image
```
Isi data
```
image : image untuk di upload
```

### GET
```
/api/images
```

### GET by Id
```
/api/image/{id}
```
Masukkan id sesuai di database

### POST
```
/api/image/{id}
```
Update image sesuai id

Isi data
```
id : id image yang akan di ubah
image : image untuk di upload
_method : put
```

### DELETE
```
/api/image/{id}
```