# Panduan Instalasi - Task Fullstack Developer
> **Oleh M. Azzam Azizi**
> Github : https://github.com/azzamazizi
> Gitlab : https://gitlab.com/azzamazizi
> Email : azzamazizi09@gmail.com
> HP : 085655909004

#### Requirement
- [x] PHP versi 7.x
- [x] Laravel versi 8.x
- [x] MySQL
- [x] sudah terinstall git
- [x] sudah terinstall composer

## Langkah-langkah :
- clone project menggunakan perintah : 
```sh
git clone https://github.com/azzamazizi/dot-fullstack.git
```

- copy isi dari .env.example dan buat file dengan nama .env, kemudian ketikkan perintah dibawah ini
```sh
php artisan key:generate
```
- setting .env untuk koneksi database mysql seperti dibawah ini
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dot_indonesia_fullstack
DB_USERNAME=root
DB_PASSWORD=
```

- install vendor dengan perintah
```sh
composer update
```

- migrate database dengan perintah
```sh
php artisan migrate
```
- import data user dan kategori berita, database seed dengan perintah
```sh
php artisan db:seed --class=UserSeeder

php artisan db:seed --class=KategoriBeritaSeeder
```
- jalankan aplikasi di port 8080
```sh
php artisan serve --port 8080
```

##### Proses Instalasi Berhasil
---
# Panduan Penggunaan Aplikasi : 
- buka url ```localhost:8080 ``` akan tampil halaman Login.
- masukkan ```Email``` dan ```Password```, contoh user Login :

| Email | Password | Role |
| ------ | ------ | ------ |
| admin@gmail.com | admin123 | admin |
| user@gmail.com | user123 | user |

- akan tampil di Halaman Dashboard, ada perbedaan Fitur **Admin** dan **User Biasa**

```html
Admin
1. Dashboard
2. Berita
    - List Berita
    - Kategori Berita
3. Pengguna


User Biasa
1. Dashboard
2. Berita
    - List Berita
    - Kategori Berita
````


