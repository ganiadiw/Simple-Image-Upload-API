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
Konfigurasi file .env meliputi nama database
```
php artisan migrate
```
```
php artisan storage:link
```
```
php artisan serve
```

## API

#### POST
```
/api/image
```
Isi form data
```
image : image_file (pilih file image)
```

#### GET
```
/api/images
```

#### GET by Id
```
/api/image/{id}
```
Masukkan id sesuai id image di database

#### POST
```
/api/image/{id}
```
Update image sesuai id

Isi form data
```
id : id image yang akan di ubah
image : image_file (pilih file image)
_method : put
```

#### DELETE
```
/api/image/{id}
```