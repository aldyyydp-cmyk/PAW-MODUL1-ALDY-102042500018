<?php
// Data produk disimpan menggunakan array PHP
$produk = [
    [
        "nama" => "Wooting 60HE+",
        "kategori" => "KEYBOARD",
        "harga" => 2800000,
        "stok" => 4,
        "gambar" => "https://i.ytimg.com/vi/MAJl103M9bI/maxresdefault.jpg"
    ],
    [
        "nama" => "Finalmouse Starlight Pro",
        "kategori" => "MOUSE",
        "harga" => 8500000,
        "stok" => 0,
        "gambar" => "https://i.rtings.com/assets/products/caJQ8rj7/finalmouse-starlight-pro-tenz-medium/design-medium.jpg?format=auto"
    ],
    [
        "nama" => "HyperX QuadCast 2",
        "kategori" => "MICROPHONE",
        "harga" => 2900000,
        "stok" => 10,
        "gambar" => "https://hyperx.com/cdn/shop/files/hyperx_quadcast_2_annotated_6_stunning_en.jpg?v=1787066305"
    ],
    [
        "nama" => "HyperX Cloud III Wireless",
        "kategori" => "HEADSET",
        "harga" => 900000,
        "stok" => 7,
        "gambar" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQ8DrKeg2BJp85fTM_W4pEAIae0p3zbPZwu2MGQMMJe4EKHVO4-HAb10FK&s=10"
    ],
    [
        "nama" => "OBSBOT TINY 3",
        "kategori" => "WEBCAM",
        "harga" => 3000000,
        "stok" => 5,
        "gambar" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRuHNbVVSyB-K_GrvE1mLQbckJXvQpYXVAP4k24IyNRPGdKjDj7KgOJoQhm&s=10"
    ],
    [
        "nama" => "ROG Swift OLED PG27AQWP-W",
        "kategori" => "MONITOR",
        "harga" => 25000000,
        "stok" => 8,
        "gambar" => "https://dlcdnwebimgs.asus.com/gain/C52011A4-0A34-460C-8D27-4D8BE1E1F276/w717/h525/fwebp"
    ]
];

$total_produk = count($produk);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo"><strong>Cia Store</strong></div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">About</a></li>
        </ul>
    </nav>

    <main>
        <!-- Hero Section -->
        <section class="hero">
            <p>CIA STORE</p>
            <h1>Simple Tech Store.</h1>
            <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
            <button class="btn-primary">Lihat Produk</button>
        </section>

        <!-- Bagian Informasi Produk & Katalog Header -->
        <section class="catalog-header">
            <div>
                <p class="subtitle">OUR PRODUCTS</p>
                <h2>Katalog Produk</h2>
            </div>
            <div class="total-produk">
                <p>Total Produk: <strong><?= $total_produk; ?></strong></p>
            </div>
        </section>

        <!-- Katalog Produk -->
        <section class="product-grid" id="products">
            <?php foreach ($produk as $item): ?>
                <?php
                    // Logika Status Stok
                    $is_tersedia = $item['stok'] > 0;
                    
                    // Logika Diskon Challenge 10%
                    $dapat_diskon = $item['harga'] >= 1000000;
                    $harga_tampil = $item['harga'];
                    $harga_diskon = 0;

                    if ($dapat_diskon) {
                        $harga_diskon = $item['harga'] - ($item['harga'] * 0.10);
                    }
                ?>
                <article class="product-card">
                    <!-- Menambahkan tag img untuk gambar produk -->
                    <img src="<?= $item['gambar']; ?>" alt="<?= $item['nama']; ?>" class="product-img">
                    
                    <div class="card-content">
                        <div class="card-header">
                            <span class="category">
                                <?= $item['kategori']; ?> 
                                <?= $dapat_diskon ? '<br><strong>DISKON 10%</strong>' : ''; ?>
                            </span>
                            <span class="status <?= $is_tersedia ? 'tersedia' : 'habis'; ?>">
                                <?= $is_tersedia ? 'Tersedia' : 'Stok Habis'; ?>
                            </span>
                        </div>
                        
                        <h3><?= $item['nama']; ?></h3>

                        <div class="price-container">
                            <?php if ($dapat_diskon): ?>
                                <p class="price original-price">Rp<?= number_format($item['harga'], 0, ',', '.'); ?></p>
                                <p class="price discounted">Rp<?= number_format($harga_diskon, 0, ',', '.'); ?></p>
                            <?php else: ?>
                                <p class="price">Rp<?= number_format($item['harga'], 0, ',', '.'); ?></p>
                            <?php endif; ?>
                        </div>

                        <p class="stock">Stok: <?= $item['stok']; ?></p>

                        <!-- Tombol beli hanya muncul jika stok tersedia -->
                        <?php if ($is_tersedia): ?>
                            <button class="buy-button">Beli Sekarang</button>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Cia Store. All rights reserved.</p>
    </footer>
</body>
</html>