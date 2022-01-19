## Installation Guide

```
composer install
```
```
Windows (CMD) : copy .env.example .env | Linux (Bash) : cp .env.example .env
```
```
php artisan key:generate
```
Configure .env file
```
php artisan migrate
```
```
php artisan storage:link
```
```
php artisan serve
```

## API Documentation

### Pre-request
All request must include a header

| Key    | Value            |
| ------ | ---------------- |
| Accept | application/json |

### API List

| Method | URI              | Description |
| ------ | ---------------- | ----------- |
| GET    | /api/images      | Get all image data |
| GET    | /api/images/{id} | Get specific image data |
| POST   | /api/images      | Upload/post image |
| POST   | /api/images/{id} | Update image |
| DELETE | /api/images/{id} | Delete image |

### API Documentation

* Get all image data

    URI : `/api/images` <br>
    Method : GET <br>
    Response : 
    ```
    {
        "message": "images data sucessfully loaded",
        "data": [
            {
                "id": 1,
                "image_name": "b11594c0b3c311.jpg",
                "image_url": "url/storage/images/qKJ8Psz.jpg"
            },
            {
                "id": 2,
                "image_name": "b11594c0b3c311.jpg",
                "image_url": "url/storage/images/qKJ8Psz.jpg"
            }
        ]
    }
    ```

* Get specific image data

    URI : `/api/images/{id}` <br>
    Method : GET <br>
    Response : 
    ```
    {
        "message": "image data sucessfully loaded",
        "data": {
            "id": 1,
            "image_name": "b11594c0b3c311.jpg",
            "image_url": "url/storage/images/qKJ8Psz.jpg"
        }
    }
    ```

* Upload/post image

    URI : `/api/images` <br>
    Method : POST <br>
    Parameters : form data

    | Key   | Value |
    | ----- | ----- |
    | image | image file |

    Response : 
    ```
    {
        "message": "Upload image successful",
        "data": {
            "id": 1,
            "image_name": "b11594c0b3c311.jpg",
            "image_url": "url/storage/images/qKJ8Psz.jpg"
        }
    }
    ```

* Update image

    URI : `/api/images/{id}` <br>
    Method : POST <br>
    Parameters : form data

    | Key     | Value |
    | ------- | ----- |
    | image   | image file |
    | _method | put |

    Response : 
    ```
    {
        "message": "Image data successfully updated",
        "data": {
            "id": 1,
            "image_name": "b11594c0b3c311.jpg",
            "image_url": "url/storage/images/qKJ8Psz.jpg"
        }
    }
    ```

* Delete image data

    URI : `/api/images/{id}` <br>
    Method : DELETE <br>
    Response : 
    ```
    {
        "message": "Succesfully delete image"
    }
    ```