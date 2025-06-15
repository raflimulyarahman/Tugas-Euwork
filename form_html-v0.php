<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas PHP - Form Input Produk</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            padding: 30px;
            text-align: center;
            color: white;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .content {
            padding: 40px;
        }

        .form-section {
            background: #f8f9ff;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            border-left: 5px solid #4facfe;
        }

        .form-section h3 {
            color: #333;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            outline: none;
            border-color: #4facfe;
            box-shadow: 0 0 0 3px rgba(79, 172, 254, 0.1);
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        .btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .result {
            background: #e8f5e8;
            border: 2px solid #4caf50;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }

        .result h4 {
            color: #2e7d32;
            margin-bottom: 15px;
            font-size: 1.3rem;
        }

        .result-item {
            margin-bottom: 10px;
            padding: 8px 0;
            border-bottom: 1px solid #c8e6c9;
        }

        .result-item:last-child {
            border-bottom: none;
        }

        .result-item strong {
            color: #1b5e20;
        }

        .error {
            background: #ffebee;
            border: 2px solid #f44336;
            color: #c62828;
            padding: 15px;
            border-radius: 8px;
            margin-top: 10px;
        }

        .code-section {
            background: #2d3748;
            color: #e2e8f0;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            font-family: 'Courier New', monospace;
            overflow-x: auto;
        }

        .code-section h4 {
            color: #4facfe;
            margin-bottom: 15px;
        }

        .php-tag {
            color: #f56565;
        }

        .variable {
            color: #68d391;
        }

        .string {
            color: #fbb6ce;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📝 Tugas PHP</h1>
            <p>Form Input Produk dengan Validasi Data</p>
        </div>

        <div class="content">
            <!-- Tugas 1: Dasar PHP -->
            <div class="form-section">
                <h3>🚀 Tugas 1: Dasar PHP</h3>
                <div class="code-section">
                    <h4>Contoh Deklarasi Variabel dan Operator:</h4>
                    <pre><code><span class="php-tag">&lt;?php</span>
<span class="variable">$nama_produk</span> = <span class="string">"Laptop Gaming"</span>;
<span class="variable">$harga</span> = 15000000;
<span class="variable">$stok</span> = 25;
<span class="variable">$diskon</span> = 0.1; // 10%

<span class="variable">$harga_setelah_diskon</span> = <span class="variable">$harga</span> - (<span class="variable">$harga</span> * <span class="variable">$diskon</span>);

<span class="php-tag">if</span> (<span class="variable">$stok</span> > 0) {
    echo <span class="string">"Produk tersedia"</span>;
} <span class="php-tag">else</span> {
    echo <span class="string">"Stok habis"</span>;
}
<span class="php-tag">?&gt;</span></code></pre>
                </div>

                <?php
                // Demonstrasi Tugas 1
                $nama_produk = "Laptop Gaming";
                $harga = 15000000;
                $stok = 25;
                $diskon = 0.1;

                $harga_setelah_diskon = $harga - ($harga * $diskon);

                echo "<div class='result'>";
                echo "<h4>📊 Hasil Eksekusi:</h4>";
                echo "<div class='result-item'><strong>Nama Produk:</strong> $nama_produk</div>";
                echo "<div class='result-item'><strong>Harga Asli:</strong> Rp " . number_format($harga, 0, ',', '.') . "</div>";
                echo "<div class='result-item'><strong>Diskon:</strong> " . ($diskon * 100) . "%</div>";
                echo "<div class='result-item'><strong>Harga Setelah Diskon:</strong> Rp " . number_format($harga_setelah_diskon, 0, ',', '.') . "</div>";
                
                if ($stok > 0) {
                    echo "<div class='result-item'><strong>Status:</strong> ✅ Produk tersedia ($stok unit)</div>";
                } else {
                    echo "<div class='result-item'><strong>Status:</strong> ❌ Stok habis</div>";
                }
                echo "</div>";
                ?>
            </div>

            <!-- Tugas 2: Form Input -->
            <div class="form-section">
                <h3>📝 Tugas 2: Form Input Produk</h3>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="nama">Nama Produk:</label>
                        <input type="text" id="nama" name="nama" placeholder="Masukkan nama produk" 
                               value="<?php echo isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga (Rp):</label>
                        <input type="number" id="harga" name="harga" placeholder="Masukkan harga produk"
                               value="<?php echo isset($_POST['harga']) ? $_POST['harga'] : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Produk:</label>
                        <textarea id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi produk"><?php echo isset($_POST['deskripsi']) ? htmlspecialchars($_POST['deskripsi']) : ''; ?></textarea>
                    </div>

                    <button type="submit" name="submit" class="btn">🚀 Proses Data</button>
                </form>
            </div>

            <!-- Tugas 3: Validasi dan Hasil -->
            <?php
            if (isset($_POST['submit'])) {
                $nama = trim($_POST['nama']);
                $harga = $_POST['harga'];
                $deskripsi = trim($_POST['deskripsi']);
                
                // Array untuk menyimpan error
                $errors = [];
                
                // Validasi nama produk
                if (empty($nama)) {
                    $errors[] = "Nama produk tidak boleh kosong";
                } elseif (strlen($nama) < 3) {
                    $errors[] = "Nama produk minimal 3 karakter";
                } elseif (strlen($nama) > 50) {
                    $errors[] = "Nama produk maksimal 50 karakter";
                }
                
                // Validasi harga
                if (empty($harga)) {
                    $errors[] = "Harga tidak boleh kosong";
                } elseif (!is_numeric($harga) || $harga <= 0) {
                    $errors[] = "Harga harus berupa angka positif";
                } elseif ($harga > 999999999) {
                    $errors[] = "Harga terlalu besar (maksimal Rp 999.999.999)";
                }
                
                // Validasi deskripsi
                if (empty($deskripsi)) {
                    $errors[] = "Deskripsi produk tidak boleh kosong";
                } elseif (strlen($deskripsi) < 10) {
                    $errors[] = "Deskripsi minimal 10 karakter";
                } elseif (strlen($deskripsi) > 500) {
                    $errors[] = "Deskripsi maksimal 500 karakter";
                }
                
                // Tampilkan hasil atau error
                if (!empty($errors)) {
                    echo "<div class='error'>";
                    echo "<h4>❌ Error Validasi:</h4>";
                    echo "<ul>";
                    foreach ($errors as $error) {
                        echo "<li>$error</li>";
                    }
                    echo "</ul>";
                    echo "</div>";
                } else {
                    // Data valid, tampilkan hasil
                    echo "<div class='result'>";
                    echo "<h4>✅ Data Produk Berhasil Diproses!</h4>";
                    echo "<div class='result-item'><strong>Nama Produk:</strong> " . htmlspecialchars($nama) . "</div>";
                    echo "<div class='result-item'><strong>Harga:</strong> Rp " . number_format($harga, 0, ',', '.') . "</div>";
                    echo "<div class='result-item'><strong>Deskripsi:</strong> " . htmlspecialchars($deskripsi) . "</div>";
                    echo "<div class='result-item'><strong>Waktu Input:</strong> " . date('d/m/Y H:i:s') . "</div>";
                    
                    // Tambahan: Kategori harga
                    if ($harga < 100000) {
                        $kategori = "Ekonomis";
                    } elseif ($harga < 1000000) {
                        $kategori = "Menengah";
                    } else {
                        $kategori = "Premium";
                    }
                    echo "<div class='result-item'><strong>Kategori Harga:</strong> $kategori</div>";
                    echo "</div>";
                }
            }
            ?>

            <!-- Penjelasan Kode -->
            <div class="form-section">
                <h3>💡 Tugas 3: Penjelasan Validasi</h3>
                <div class="code-section">
                    <h4>Contoh Validasi PHP:</h4>
                    <pre><code><span class="php-tag">&lt;?php</span>
<span class="php-tag">if</span> (empty(<span class="variable">$nama</span>)) {
    <span class="variable">$errors[]</span> = <span class="string">"Nama tidak boleh kosong"</span>;
} <span class="php-tag">elseif</span> (strlen(<span class="variable">$nama</span>) < 3) {
    <span class="variable">$errors[]</span> = <span class="string">"Nama minimal 3 karakter"</span>;
}

<span class="php-tag">if</span> (!is_numeric(<span class="variable">$harga</span>) || <span class="variable">$harga</span> <= 0) {
    <span class="variable">$errors[]</span> = <span class="string">"Harga harus angka positif"</span>;
}

<span class="php-tag">if</span> (empty(<span class="variable">$errors</span>)) {
    echo <span class="string">"Data valid!"</span>;
} <span class="php-tag">else</span> {
    <span class="php-tag">foreach</span> (<span class="variable">$errors</span> <span class="php-tag">as</span> <span class="variable">$error</span>) {
        echo <span class="variable">$error</span>;
    }
}
<span class="php-tag">?&gt;</span></code></pre>
                </div>
                
                <div style="margin-top: 20px; padding: 15px; background: #fff3cd; border: 1px solid #ffeaa7; border-radius: 8px;">
                    <h4 style="color: #856404;">📚 Ringkasan Tugas:</h4>
                    <ul style="margin-left: 20px; color: #856404;">
                        <li><strong>Tugas 1:</strong> Variabel, operator, dan if-else ✅</li>
                        <li><strong>Tugas 2:</strong> Form HTML dengan input nama, harga, deskripsi ✅</li>
                        <li><strong>Tugas 3:</strong> Validasi data sebelum diproses ✅</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>