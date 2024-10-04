<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:index.php?login_gagal");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://4kwallpapers.com/images/walls/thumbs_3t/10724.png') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* 3D Text Effect and Hover Wave Animation */
        .welcome-text {
            font-size: 4rem;
            font-weight: bold;
            text-align: center;
            color: #ffff;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3), 0px 0px 10px rgba(74, 144, 226, 0.7);
            transition: transform 0.5s ease-in-out;
        }
        
        .welcome-text:hover {
            animation: wave 1s infinite;
            transform: perspective(500px) rotateY(10deg);
        }

        @keyframes wave {
            0%, 100% { transform: translateX(0); }
            50% { transform: translateX(10px); }
        }

        /* Blur and Glowing Card Effect */
        .blur-card {
            backdrop-filter: blur(15px); /* Blur effect */
            background: rgba(255, 255, 255, 0.3); /* Adjusted for transparency */
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow: 0 0 20px rgba(0, 128, 255, 0.6), 0 0 30px rgba(0, 128, 255, 0.5);
            transition: box-shadow 0.3s ease-in-out;
        }

        /* Glowing effect on hover */
        .blur-card:hover {
            box-shadow: 0 0 30px rgba(0, 128, 255, 0.9), 0 0 40px rgba(0, 128, 255, 0.7);
        }

        /* Button Hover with Icon Effect */
        .btn-with-icon {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.25rem 2.5rem;
            background-color: #3490dc;
            color: white;
            font-size: 1.25rem;
            font-weight: bold;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-with-icon i {
            position: absolute;
            opacity: 0;
            font-size: 1.5rem;
            right: -40px;
            transition: opacity 0.3s ease, right 0.3s ease;
        }

        .btn-with-icon:hover i {
            opacity: 1;
            right: 10px;
        }

        /* Color variations */
        .btn-blue:hover {
            background-color: #0056b3;
        }

        .btn-green:hover {
            background-color: #2d8659;
        }

        .btn-red:hover {
            background-color: #cc0000;
        }

        /* Blinking Light Effect for Username */
        .glowing-text {
            font-weight: bold;
            color: #FFFF;
            text-shadow: 0 0 5px #4a90e2, 0 0 10px #4a90e2, 0 0 15px #4a90e2, 0 0 20px rgba(74, 144, 226, 0.6);
            animation: glow 1.5s infinite alternate;
        }

        @keyframes glow {
            from {
                text-shadow: 0 0 5px #4a90e2, 0 0 10px #4a90e2, 0 0 15px #4a90e2, 0 0 20px rgba(74, 144, 226, 0.6);
            }
            to {
                text-shadow: 0 0 10px #4a90e2, 0 0 20px #4a90e2, 0 0 30px #4a90e2, 0 0 40px rgba(74, 144, 226, 0.9);
            }
        }
    </style>
</head>
<body>

    <div class="w-full max-w-4xl mx-auto p-12 rounded-lg shadow-lg blur-card"> <!-- Removed bg-white class -->
        <!-- Header with 3D Text -->
        <div class="text-center mb-8">
            <h1 class="welcome-text">Welcome</h1>
        </div>

        <!-- Welcome Section with Blinking Username -->
        <h2 class="text-3xl font-semibold text-center mb-4 text-gray-800">
            Selamat datang, <span class="glowing-text"><?php echo $_SESSION["username"]; ?></span>!
        </h2>
        <p class="text-white-800 text-center mb-8">Anda berhasil login ke sistem. Silakan mengakses menu di bawah atau logout jika sudah selesai.</p>

        <!-- Button Section with Hover Shake Effect and Icons -->
        <div class="flex justify-center space-x-4">
            <a href="bukutamu.php" class="btn-with-icon btn-blue hover-shake text-lg">
                Isi Buku Tamu
                <i class="fas fa-book"></i> <!-- Icon for guestbook -->
            </a>
            <a href="lihat_buku_tamu.php" class="btn-with-icon btn-green hover-shake text-lg">
                Lihat Buku Tamu
                <i class="fas fa-eye"></i> <!-- Icon for viewing -->
            </a>
            <form method="post" action="logout.php">
                <button type="submit" class="btn-with-icon btn-red hover-shake text-lg">
                    Logout
                    <i class="fas fa-sign-out-alt"></i> <!-- Icon for logout -->
                </button>
            </form>
        </div>
    </div>

</body>
</html>
