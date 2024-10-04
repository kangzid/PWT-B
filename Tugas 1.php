<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Profil Berwarna-warni</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(45deg, #f3ec78, #af4261);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }
        li:hover {
            transform: translateX(10px);
        }
        strong {
            display: inline-block;
            width: 100px;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Membuat array dengan data string dan integer
        $data = [
            "Nama" => "Zalfyan",
            "Umur" => 25,
            "Pekerjaan" => "Programmer",
            "Pengalaman" => 5
        ];

        // Array warna untuk label
        $colors = ['#FF6B6B', '#4ECDC4', '#45B7D1', '#FFA07A'];

        // Menampilkan array menggunakan loop
        echo "<h2>Data Profil</h2>";
        echo "<ul>";
        $i = 0;
        foreach ($data as $key => $value) {
            $color = $colors[$i % count($colors)];
            echo "<li><strong style='background-color: $color;'>$key:</strong> $value</li>";
            $i++;
        }
        echo "</ul>";
        ?>
    </div>
</body>
</html>
