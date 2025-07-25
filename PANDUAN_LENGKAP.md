# Panduan Lengkap Aplikasi Infrastruktur TI Sijunjung

## 📋 Daftar Isi
1. [Cara Login](#cara-login)
2. [Akun Login yang Tersedia](#akun-login-yang-tersedia)
3. [Panduan Tabel dan Modul](#panduan-tabel-dan-modul)
4. [Troubleshooting](#troubleshooting)
5. [Kontak Support](#kontak-support)

---

alamat web: https://infrastruktur.sijunjung.go.id

## 🔐 Cara Login

### URL Login
```
https://infrastruktur.sijunjung.go.id/admin/login
```

### Langkah-langkah Login:
1. Buka browser dan akses URL di atas
2. Masukkan **Email** dan **Password** sesuai dengan role Anda
3. Klik tombol **"Sign in"**
4. Anda akan diarahkan ke dashboard sesuai dengan hak akses role Anda

---

## 👥 Akun Login yang Tersedia

| No | Role | Email | Password | Deskripsi |
|----|------|-------|----------|----------|
| 1 | **Super Admin** | superadmin@gmail.com | password | Akses penuh ke semua fitur |
| 2 | **Petugas 1** | petugas1@gmail.com | password | Mengelola laporan dan inventaris |
| 3 | **Petugas 2** | petugas2@gmail.com | password | Mengelola laporan dan inventaris |
| 4 | **Kepala Bidang TI** | kabid.ti@gmail.com | password | Supervisi dan approval |
| 5 | **Kepala Dinas Kominfo** | kadis.kominfo@gmail.com | password | Manajemen tingkat dinas |
| 6 | **Pengguna 1** | user1@gmail.com | password | Akses terbatas untuk viewing |
| 7 | **Pengguna 2** | user2@gmail.com | password | Akses terbatas untuk viewing |

---

## 📊 Panduan Tabel dan Modul

### 1. 📍 **Tabel Kecamatan**
**Fungsi:** Mengelola data kecamatan di Kabupaten Sijunjung

**Kolom:**
- `id` - ID unik kecamatan
- `nama` - Nama kecamatan
- `created_at` - Tanggal dibuat
- `updated_at` - Tanggal diperbarui

**Cara Penggunaan:**
- **Melihat Data:** Klik menu "Kecamatan" di sidebar
- **Tambah Data:** Klik tombol "New Kecamatan"
- **Edit Data:** Klik ikon edit pada baris data
- **Hapus Data:** Klik ikon hapus pada baris data

**Hak Akses:**
- Super Admin: CRUD (Create, Read, Update, Delete)
- Petugas: Read, Update
- Lainnya: Read only

---

### 2. 🏘️ **Tabel Nagari**
**Fungsi:** Mengelola data nagari dalam setiap kecamatan

**Kolom:**
- `id` - ID unik nagari
- `nama` - Nama nagari
- `kecamatan_id` - Relasi ke tabel kecamatan
- `jumlah_penduduk_nagari` - **Otomatis dihitung** dari total penduduk jorong
- `created_at` - Tanggal dibuat
- `updated_at` - Tanggal diperbarui

**Fitur Khusus:**
- ✅ **Jumlah Penduduk Otomatis:** Kolom ini akan menampilkan total penduduk dari semua jorong dalam nagari tersebut
- Format tampilan: "[Jumlah] Jiwa" atau "Belum ada data penduduk" jika kosong

**Cara Penggunaan:**
- **Melihat Data:** Klik menu "Nagari" di sidebar
- **Tambah Data:** Klik tombol "New Nagari", pilih kecamatan
- **Edit Data:** Klik ikon edit, dapat mengubah nama dan kecamatan
- **Hapus Data:** Klik ikon hapus (hati-hati, akan mempengaruhi data jorong)

**Hak Akses:**
- Super Admin: CRUD
- Petugas: Read, Update
- Lainnya: Read only

---

### 3. 🏠 **Tabel Jorong**
**Fungsi:** Mengelola data jorong dalam setiap nagari

**Kolom:**
- `id` - ID unik jorong
- `nama` - Nama jorong
- `nagari_id` - Relasi ke tabel nagari
- `jumlah_penduduk_jorong` - Jumlah penduduk di jorong (input manual)
- `created_at` - Tanggal dibuat
- `updated_at` - Tanggal diperbarui

**Cara Penggunaan:**
- **Melihat Data:** Klik menu "Jorong" di sidebar
- **Tambah Data:** Klik tombol "New Jorong", pilih nagari, isi jumlah penduduk
- **Edit Data:** Klik ikon edit, dapat mengubah nama, nagari, dan jumlah penduduk
- **Hapus Data:** Klik ikon hapus

**Catatan Penting:**
- Perubahan jumlah penduduk jorong akan otomatis mempengaruhi total penduduk nagari
- Pastikan data jumlah penduduk akurat

**Hak Akses:**
- Super Admin: CRUD
- Petugas: CRUD
- Lainnya: Read only

---

### 4. 📡 **Tabel BTS (Base Transceiver Station)**
**Fungsi:** Mengelola data menara BTS dan infrastruktur telekomunikasi

**Kolom:**
- `id` - ID unik BTS
- `nama` - Nama/lokasi BTS
- `latitude` - Koordinat latitude
- `longitude` - Koordinat longitude
- `tinggi_menara` - Tinggi menara (meter)
- `jenis_menara` - Jenis menara (Monopole, Lattice, dll)
- `status` - Status operasional
- `provider` - Penyedia layanan
- `created_at` - Tanggal dibuat
- `updated_at` - Tanggal diperbarui

**Cara Penggunaan:**
- **Melihat Data:** Klik menu "BTS" di sidebar
- **Tambah Data:** Klik tombol "New BTS", isi semua informasi
- **Edit Data:** Klik ikon edit untuk memperbarui informasi
- **Hapus Data:** Klik ikon hapus
- **Lihat Peta:** Gunakan koordinat untuk melihat lokasi di peta

**Hak Akses:**
- Super Admin: CRUD
- Petugas: CRUD
- Kepala Bidang TI: Read, Update
- Lainnya: Read only

---

### 5. 🖥️ **Tabel Peralatan**
**Fungsi:** Mengelola data peralatan IT dan infrastruktur

**Kolom:**
- `id` - ID unik peralatan
- `nama` - Nama peralatan
- `jenis` - Jenis peralatan (Server, Router, Switch, dll)
- `merk` - Merk/brand peralatan
- `model` - Model peralatan
- `serial_number` - Nomor seri
- `tahun_pembelian` - Tahun pembelian
- `kondisi` - Kondisi peralatan (Baik, Rusak, Maintenance)
- `lokasi` - Lokasi penempatan
- `created_at` - Tanggal dibuat
- `updated_at` - Tanggal diperbarui

**Cara Penggunaan:**
- **Melihat Data:** Klik menu "Peralatan" di sidebar
- **Tambah Data:** Klik tombol "New Peralatan", isi detail lengkap
- **Edit Data:** Klik ikon edit untuk update kondisi atau lokasi
- **Hapus Data:** Klik ikon hapus
- **Filter:** Gunakan filter berdasarkan jenis, kondisi, atau lokasi

**Hak Akses:**
- Super Admin: CRUD
- Petugas: CRUD
- Kepala Bidang TI: Read, Update
- Lainnya: Read only

---

### 6. 📦 **Tabel Inventaris**
**Fungsi:** Mengelola inventaris barang dan aset IT

**Kolom:**
- `id` - ID unik inventaris
- `nama_barang` - Nama barang
- `kategori` - Kategori barang
- `jumlah` - Jumlah barang
- `satuan` - Satuan (unit, pcs, set)
- `kondisi` - Kondisi barang
- `lokasi` - Lokasi penyimpanan
- `tanggal_masuk` - Tanggal barang masuk
- `keterangan` - Keterangan tambahan
- `created_at` - Tanggal dibuat
- `updated_at` - Tanggal diperbarui

**Cara Penggunaan:**
- **Melihat Data:** Klik menu "Inventaris" di sidebar
- **Tambah Data:** Klik tombol "New Inventaris", isi detail barang
- **Edit Data:** Klik ikon edit untuk update jumlah atau kondisi
- **Hapus Data:** Klik ikon hapus
- **Laporan:** Generate laporan inventaris berdasarkan kategori

**Hak Akses:**
- Super Admin: CRUD
- Petugas: CRUD
- Kepala Bidang TI: Read, Update
- Lainnya: Read only

---

### 7. 🏢 **Tabel OPD (Organisasi Perangkat Daerah)**
**Fungsi:** Mengelola data instansi/dinas di lingkungan Pemkab Sijunjung

**Kolom:**
- `id` - ID unik OPD
- `nama` - Nama OPD/Instansi
- `created_at` - Tanggal dibuat
- `updated_at` - Tanggal diperbarui

**Daftar OPD yang Tersedia:**
- Dinas Komunikasi dan Informatika
- Dinas Pendidikan
- Dinas Kesehatan
- RSUD
- Sekretariat Daerah
- Dan 50+ OPD lainnya

**Cara Penggunaan:**
- **Melihat Data:** Klik menu "OPD" di sidebar
- **Tambah Data:** Klik tombol "New OPD", masukkan nama instansi
- **Edit Data:** Klik ikon edit untuk mengubah nama
- **Hapus Data:** Klik ikon hapus (hati-hati, akan mempengaruhi data laporan)

**Hak Akses:**
- Super Admin: CRUD
- Kepala Dinas Kominfo: Read, Update
- Lainnya: Read only

---

### 8. 📋 **Tabel Laporan**
**Fungsi:** Mengelola laporan gangguan, koordinasi teknis, dan permintaan bandwidth

**Kolom:**
- `id` - ID unik laporan
- `no_tiket` - Nomor tiket otomatis
- `tgl_laporan` - Tanggal laporan dibuat
- `nama_pelapor` - Nama yang melaporkan
- `nomor_kontak` - Nomor telepon pelapor
- `opd_id` - Relasi ke tabel OPD
- `jenis_laporan` - Jenis laporan (enum)
- `uraian_laporan` - Deskripsi detail laporan
- `status_laporan` - Status pemrosesan (enum)
- `keterangan_petugas` - Catatan dari petugas
- `petugas_id` - Relasi ke user yang menangani
- `file_laporan` - Lampiran file (opsional)
- `created_at` - Tanggal dibuat
- `updated_at` - Tanggal diperbarui

**Jenis Laporan:**
1. **Laporan Gangguan** (Merah) - Untuk melaporkan gangguan jaringan/sistem
2. **Koordinasi Teknis** (Kuning) - Untuk koordinasi teknis antar instansi
3. **Kenaikan Bandwidth** (Hijau) - Untuk permintaan penambahan bandwidth

**Status Laporan:**
1. **Belum Diproses** (Merah) - Laporan baru masuk
2. **Sedang Diproses** (Kuning) - Laporan sedang ditangani petugas
3. **Selesai Diproses** (Hijau) - Laporan sudah selesai ditangani

**Cara Penggunaan:**
- **Melihat Data:** Klik menu "Laporan" di sidebar
- **Filter Status:** Gunakan tab untuk filter berdasarkan status
- **Proses Laporan:** 
  - Klik "Proses" untuk mengubah status menjadi "Sedang Diproses"
  - Isi keterangan petugas
  - Klik "Selesaikan" untuk menyelesaikan laporan
- **Download File:** Klik link file untuk download lampiran

**Workflow Laporan:**
1. Laporan masuk dengan status "Belum Diproses"
2. Petugas membaca dan mengisi keterangan → Status otomatis "Sedang Diproses"
3. Petugas menyelesaikan penanganan → Status "Selesai Diproses"

**Hak Akses:**
- Super Admin: CRUD
- Petugas: Read, Update (proses laporan)
- Kepala Bidang TI: Read, Update
- Kepala Dinas Kominfo: Read
- Lainnya: Read only

---

### 9. 👤 **Tabel User**
**Fungsi:** Mengelola akun pengguna sistem

**Kolom:**
- `id` - ID unik user
- `name` - Nama lengkap
- `email` - Email (unique)
- `password` - Password (encrypted)
- `role` - Role/jabatan user
- `email_verified_at` - Tanggal verifikasi email
- `created_at` - Tanggal dibuat
- `updated_at` - Tanggal diperbarui

**Role yang Tersedia:**
- **Super Admin** - Akses penuh semua fitur
- **Petugas** - Mengelola laporan dan inventaris
- **Kepala Bidang TI** - Supervisi dan approval
- **Kepala Dinas Kominfo** - Manajemen tingkat dinas
- **Pengguna** - Akses terbatas untuk viewing

**Cara Penggunaan:**
- **Melihat Data:** Klik menu "Users" di sidebar
- **Tambah Data:** Klik tombol "New User", isi data lengkap
- **Edit Data:** Klik ikon edit untuk mengubah informasi
- **Reset Password:** Gunakan fitur reset password
- **Hapus Data:** Klik ikon hapus (hati-hati dengan data relasi)

**Hak Akses:**
- Super Admin: CRUD
- Lainnya: Read only (profil sendiri)

---

### 10. 🔧 **Tabel Operator**
**Fungsi:** Mengelola data operator jaringan dan provider

**Kolom:**
- `id` - ID unik operator
- `nama` - Nama operator/provider
- `jenis` - Jenis layanan (Internet, Telepon, dll)
- `kontak` - Informasi kontak
- `created_at` - Tanggal dibuat
- `updated_at` - Tanggal diperbarui

**Cara Penggunaan:**
- **Melihat Data:** Klik menu "Operator" di sidebar
- **Tambah Data:** Klik tombol "New Operator", isi detail operator
- **Edit Data:** Klik ikon edit untuk update informasi kontak
- **Hapus Data:** Klik ikon hapus

**Hak Akses:**
- Super Admin: CRUD
- Petugas: Read, Update
- Lainnya: Read only

---

## 📊 Dashboard dan Statistik

### Widget Dashboard:
1. **Total BTS** - Jumlah menara BTS yang terdaftar
2. **Total Inventaris** - Jumlah item inventaris
3. **Total Jorong** - Jumlah jorong yang terdaftar
4. **Total Kecamatan** - Jumlah kecamatan
5. **Total Nagari** - Jumlah nagari
6. **Total OPD** - Jumlah instansi yang terdaftar

### Laporan yang Tersedia:
- Laporan Inventaris per Kategori
- Laporan BTS per Provider
- Laporan Status Peralatan
- Laporan Gangguan Bulanan
- Statistik Laporan per OPD

---

## 🔧 Troubleshooting

### Masalah Login:
- **Email/Password Salah:** Pastikan menggunakan kredensial yang benar
- **Akun Terkunci:** Hubungi administrator
- **Lupa Password:** Gunakan fitur "Forgot Password" atau hubungi admin

### Masalah Akses:
- **Menu Tidak Muncul:** Periksa role/hak akses Anda
- **Tidak Bisa Edit:** Pastikan Anda memiliki permission yang sesuai
- **Error 403:** Akses ditolak, hubungi administrator

### Masalah Data:
- **Data Tidak Muncul:** Refresh halaman atau clear cache browser
- **Upload File Gagal:** Periksa ukuran dan format file
- **Data Duplikat:** Periksa data yang sudah ada sebelum input

### Masalah Performa:
- **Loading Lambat:** Periksa koneksi internet
- **Timeout:** Refresh halaman dan coba lagi
- **Browser Tidak Kompatibel:** Gunakan Chrome, Firefox, atau Edge terbaru

---

## 📞 Kontak Support

### Tim IT Dinas Kominfo Sijunjung:
- **Email:** kominfo@sijunjung.go.id
- **Telepon:** (0754) 21XXX
- **WhatsApp:** 08XX-XXXX-XXXX

### Jam Operasional:
- **Senin - Jumat:** 08:00 - 16:00 WIB
- **Sabtu - Minggu:** Libur (kecuali emergency)

### Untuk Emergency (24/7):
- **Hotline:** 08XX-XXXX-XXXX
- **Email Emergency:** emergency.it@sijunjung.go.id

---

## 📝 Catatan Penting

1. **Backup Data:** Sistem melakukan backup otomatis setiap hari
2. **Keamanan:** Jangan share kredensial login dengan orang lain
3. **Update:** Sistem akan diupdate secara berkala untuk perbaikan
4. **Training:** Tersedia training untuk pengguna baru
5. **Dokumentasi:** Panduan ini akan diupdate sesuai perkembangan sistem

---

**Versi Panduan:** 1.0  
**Tanggal Update:** Desember 2024  
**Dibuat oleh:** Tim IT Dinas Kominfo Sijunjung

---

*Untuk pertanyaan lebih lanjut atau request fitur baru, silakan hubungi tim support.*
