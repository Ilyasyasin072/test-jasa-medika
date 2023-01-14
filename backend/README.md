# REST API Backend Test Jasa Medika Application

 Berikut adalah Rest Api test yang terdiri dari 
 - api pasient
 - api kelurahan
 - api login (role : admin - operator)

## Install

    - Pastikan menginstall Composer pada local machine
    - Setelah di extrak 
    - ketik "composer install"
    - jika file .env tidak ada lakukan hal berikut "cp .env-example .env"
    - config database pada .env DB_DATABASE, DB_PASSWORD
    - "php artisan migrate"
    - "php artisan db:seed --class=AuthSeeder" // make 2 user admin and operator
    - "php artisan db:seed --class=KelurahanSeed"

## Run the app

    - "php artisan serve"

## Run the tests

    vendor/bin/phpunit tests/Controllers/KelurahanControllerTest.php  
    vendor/bin/phpunit tests/Controllers/PasienControllerTest.php  

### Request

`GET /thing/`

curl -i -H 'Accept: application/json' -d http://localhost:8000/kelurahan/list
curl -i -H 'Accept: application/json' -d http://localhost:8000/pasien/list
curl -i -H 'Accept: application/json' -d http://localhost:8000/kelurahan/edit/1

### Response
    {{"id":1,"nama":"12312","alamat":"lorem","tlp":"1312","id_kelurahan":1,"tanggal_lahir":"123","jk":"L","created_at":"2023-01-13T13:17:47.000000Z","updated_at":"2023-01-13T13:17:47.000000Z","kelurahan":{"id":1,"nama_kelurahan":"lorem saya","nama_kecamatan":"lorem","nama_kota":"lorem","created_at":null,"updated_at":"2023-01-14T02:49:07.000000Z"}}

## Create REST API 

### Request

`POST /thing/`

    curl -X POST http://localhost:8000/pasien/1


### Response
    {{ "id":1,"nama":"12312","alamat":"lorem","tlp":"1312","id_kelurahan":1,"tanggal_lahir":"123","jk":"L","created_at":"2023-01-13T13:17:47.000000Z","updated_at":"2023-01-13T13:17:47.000000Z","kelurahan":{"id":1,"nama_kelurahan":"lorem saya","nama_kecamatan":"lorem","nama_kota":"lorem","created_at":null,"updated_at":"2023-01-14T02:49:07.000000Z"}}

### Request

`PUT /kelurahan/update/1`

    curl -i -H 'Accept: application/json' -X PUT http://localhost:8000/kelurahan/update/1

### Response

    {"status":"success"}

## Get changed Thing

