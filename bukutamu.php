<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $komentar = $_POST["komentar"];

    // Validasi sederhana
    if (empty($nama) || empty($email) || empty($komentar)) {
        $error = "Semua field harus diisi!";
    } else {
        // Baca data JSON yang sudah ada
        $file = 'buku_tamu.json';
        $current_data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

        // Tambahkan data baru ke array
        $current_data[] = [
            'nama' => $nama,
            'email' => $email,
            'komentar' => $komentar
        ];

        // Simpan kembali ke file JSON
        file_put_contents($file, json_encode($current_data, JSON_PRETTY_PRINT));

        $success = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://4kwallpapers.com/images/walls/thumbs_3t/10724.png') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        
        .glow-card {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.8); 
            border: 25px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 20px rgba(0, 128, 255, 0.6), 0 0 30px rgba(0, 128, 255, 0.5);
            transition: box-shadow 0.3s ease-in-out;
        }

        .glow-card:hover {
            box-shadow: 0 0 30px rgba(0, 128, 255, 0.9), 0 0 40px rgba(0, 128, 255, 0.7);
        }

        
        .glow-text {
            transition: text-shadow 0.3s ease-in-out;
        }

        .glow-text:hover {
            text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 20px #00f, 0 0 30px #00f;
            transform: translateY(-2px);
        }
    </style>
</head>
<body class="bg-white min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-2xl overflow-hidden glow-card">
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6 text-white">
                <h2 class="text-4xl font-bold text-center glow-text">Buku Tamu</h2>
            </div>
            <div class="p-6">
                <form method="POST" action="bukutamu.php" class="space-y-6">
                    <div>
                        <label for="nama" class="block text-lg font-medium text-gray-700">Nama</label>
                        <input type="text" name="nama" id="nama" required class="mt-1 block w-full rounded-md border-2 border-blue-400 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-3 bg-blue-100">
                    </div>
                    <div>
                        <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" required class="mt-1 block w-full rounded-md border-2 border-blue-400 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-3 bg-blue-100">
                    </div>
                    <div>
                        <label for="komentar" class="block text-lg font-medium text-gray-700">Komentar</label>
                        <textarea name="komentar" id="komentar" required class="mt-1 block w-full rounded-md border-2 border-blue-400 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-3 bg-blue-100"></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-4 rounded transition duration-300 w-full text-lg">
                        Kirim
                    </button>
                    <a href="dashboard.php" class="flex items-center justify-center bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-3 px-4 rounded transition duration-300 mt-4 w-full text-lg">
                        <i class="fas fa-home mr-2"></i> Kembali ke Dashboard
                    </a>
                </form>
                <?php if (isset($error)) : ?>
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '<?php echo $error; ?>'
                        });
                    </script>
                <?php endif; ?>
                <?php if (isset($success)) : ?>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Data Tersimpan!',
                            text: 'Data berhasil disimpan ke file JSON!',
                            showConfirmButton: false,
                            timer: 3000
                        }).then(function() {
                            window.location.href = 'dashboard.php';
                        });
                    </script>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
