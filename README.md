# INSTRUKSI

1. INSTALL COMPOSER
2. KETIK `composer install`. PASTIKAN CMD DI FOLDER ROOT PROJEK.
3. RENAME FILE `env` JADI `.env`
4. BUAT DATABASE NAMANYA SEMBARANG AJA IKUTIN ATURAN (CONTOH: `db_training`)
5. KALAU UDAH BUAT DATABASENYA, BUKA FILE `.env` TADI LALU HAPUS `#` DI
    - [INI GAK PERLU KALAU SUDAH TERUBAH, LANJOT SKIP] CI_ENVIRONMENT = development <= JANGAN LUPA GANTI DARI `production` JADI `development`
    - `app.baseURL` <= GANTI ALAMAT LOCALHOST/NAMA_FOLDER ATAU `http://localhost:8080`
    - [INI JUGA LANGSUNG SKIP KALAU UDAH TERUBAH] SEMUA `database.default`
6. KALO UDAH, ISI `database.default.database` DENGAN NAMA DATABASE YANG UDAH DIBUAT
7. JANGAN LUPA SAVE
8. KALO UDAH, KETIK PHP SPARK MIGRATE DI CONSOLE NYA (CMDER ATAU CMD), PASTIKAN DI ROOT PROJECT YA!
9. TERUS SEMBARANG MAU BUKA LEWAT `http://localhost/namafolder` ATAU BISA KETIK COMMAND
   `php spark serve`. NOTE: NAMAFOLDER ITU NAMA FOLDER PROJECTNYA, MISAL KONEKSIFORHOME-TRAINING.

> [!IMPORTANT]
> JANGAN LUPA HAPUS SETIAP KOMENTAR (BIASANYA DIMULAI DENGAN `//`) DI CONTROLLER ATAUPUN DIMANAPUN TERMASUK DI VIEWS JUGA (BIASANYA BERUPA `<!-- KOMENTAR INI HARUS DIHAPUS-->`)!!!

#### INGAAATTT!!!
> JANGAN LUPA JUGA HAPUS FILE README.MD INI!!, SAMA FILE2 YG ADA DI APP\DATABASE\MIGRATIONS BIAR GAK KETAHUAN!!!