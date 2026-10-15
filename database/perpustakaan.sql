CREATE DATABASE IF NOT EXISTS perpustakaan
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE perpustakaan;

CREATE TABLE IF NOT EXISTS buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_buku VARCHAR(20) NOT NULL UNIQUE,
    judul VARCHAR(150) NOT NULL,
    penulis VARCHAR(100) NOT NULL,
    penerbit VARCHAR(100) NOT NULL,
    tahun_terbit YEAR NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO buku (kode_buku, judul, penulis, penerbit, tahun_terbit) VALUES
('BK-001', 'Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', 2005),
('BK-002', 'Bumi Manusia', 'Pramoedya Ananta Toer', 'Hasta Mitra', 1980),
('BK-003', 'Filosofi Teras', 'Henry Manampiring', 'Kompas', 2018);