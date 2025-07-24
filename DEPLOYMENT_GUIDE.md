# Panduan Deployment ke Hosting

## Error Vite Manifest: Unable to locate file in Vite manifest: resources/css/filament.css

Error ini terjadi karena file build assets tidak ter-upload atau konfigurasi environment tidak tepat. Ikuti langkah-langkah berikut:

## 1. Persiapan Sebelum Upload

### Build Assets untuk Production
```bash
# Install dependencies
npm install

# Build assets untuk production
npm run build
```

### Pastikan File Build Ter-generate
Setelah menjalankan `npm run build`, pastikan folder berikut ada:
- `public/build/assets/`
- `public/build/manifest.json`

## 2. Konfigurasi Environment

### Copy file .env.production ke hosting
1. Upload file `.env.production` ke hosting
2. Rename menjadi `.env` di hosting
3. Edit konfigurasi sesuai hosting:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://domain-anda.com

# Database hosting
DB_HOST=localhost
DB_DATABASE=nama_database_hosting
DB_USERNAME=user_database_hosting
DB_PASSWORD=password_database_hosting
```

## 3. File yang Harus Di-upload ke Hosting

### Wajib Upload:
- Semua file aplikasi Laravel
- Folder `public/build/` (hasil npm run build)
- File `.env` (dari .env.production)
- Folder `vendor/` (atau jalankan composer install di hosting)

### Jangan Upload:
- `node_modules/`
- `.env.local` atau `.env.example`
- File development lainnya

## 4. Perintah di Hosting (jika ada akses SSH)

```bash
# Install composer dependencies
composer install --optimize-autoloader --no-dev

# Generate application key (jika belum ada)
php artisan key:generate

# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

# Optimize untuk production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Migrate database
php artisan migrate --force

# Set permissions
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
```

## 5. Troubleshooting

### Jika Error Masih Muncul:

1. **Pastikan folder build ter-upload:**
   - Cek apakah `public/build/manifest.json` ada di hosting
   - Cek apakah folder `public/build/assets/` ada dan berisi file CSS/JS

2. **Cek file .env di hosting:**
   ```env
   APP_ENV=production
   APP_DEBUG=false
   ```

3. **Clear cache di hosting:**
   ```bash
   php artisan cache:clear
   php artisan config:clear
   php artisan view:clear
   ```

4. **Jika menggunakan shared hosting:**
   - Pastikan document root mengarah ke folder `public/`
   - Beberapa hosting memerlukan file `.htaccess` khusus

## 6. Alternatif: Build di Hosting

Jika hosting mendukung Node.js:
```bash
# Di hosting
npm install
npm run build
```

## 7. Verifikasi

Setelah deployment, cek:
1. Apakah website bisa diakses tanpa error
2. Apakah CSS dan JS ter-load dengan benar
3. Apakah tidak ada error 404 untuk file assets

---

**Catatan Penting:**
- Selalu backup database sebelum migrate
- Test di staging environment dulu jika memungkinkan
- Pastikan versi PHP di hosting kompatibel (minimal PHP 8.1)
- Pastikan ekstensi PHP yang dibutuhkan sudah aktif (mysql, mbstring, etc.)