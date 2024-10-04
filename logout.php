<?php
session_start();
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #DCDCDC, #00CED1, #6BCB77, #4D96FF, #9B59B6);
            background-size: 400% 400%;
            animation: gradientAnimation 10s ease infinite;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .loading-container {
            text-align: center;
            color: white;
        }

        .loading-bar {
            width: 100%;
            height: 10px;
            background-color: transparent;
            border: 2px dashed white;
            border-radius: 5px;
            overflow: hidden;
            position: relative;
        }

        .loading-progress {
            height: 100%;
            width: 0;
            background-color: #FFD700;
            transition: width 3s;
            position: absolute;
            left: 0;
            top: 0;
        }

        .cute-character {
            font-size: 3rem;
            animation: bounce 1s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-20px);
            }
            60% {
                transform: translateY(-10px);
            }
        }

        .cute-text {
            color: #FFD700;
            font-weight: bold;
            font-size: 1.5rem;
            margin-top: 10px;
        }
    </style>
    <script>
        function redirect() {
            window.location.href = 'index.php';
        }

        function startLoading() {
            const progressBar = document.querySelector('.loading-progress');
            progressBar.style.width = '100%';
            setTimeout(redirect, 3000);
        }

        window.onload = startLoading;
    </script>
</head>
<body>
    <div class="loading-container">
        <div class="cute-character">😊</div>
        <h2 class="text-xl font-bold mb-4">Sedang Logout...</h2>
        <p class="cute-text">Tunggu sebentar, kami sedang mengemas semua kenangan!</p>
        <p>Anda akan diarahkan ke halaman utama dalam 3 detik.</p>
        <div class="loading-bar mt-4">
            <div class="loading-progress"></div>
        </div>
    </div>
</body>
</html>
