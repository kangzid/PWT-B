<?php
// Baca data dari file JSON
$file = 'buku_tamu.json';
$current_data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

// Fungsi untuk menghapus data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $index = $_POST['delete'];

    if (isset($current_data[$index])) {
        unset($current_data[$index]);
        file_put_contents($file, json_encode(array_values($current_data), JSON_PRETTY_PRINT));
        $deleteSuccess = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Buku Tamu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Include jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <style>
        /* Title and Glowing Card */
        body {
            background: url('https://4kwallpapers.com/images/walls/thumbs_3t/10724.png') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .glow-card {
    backdrop-filter: blur(15px);
    background: rgba(255, 255, 255, 0.1);
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.18);
    box-shadow: 0 0 20px rgba(0, 128, 255, 0.6), 0 0 30px rgba(0, 128, 255, 0.5);
    transition: box-shadow 0.3s ease-in-out;
    max-width: 600px;
    padding: 20px;
}

        .glow-card:hover {
            box-shadow: 0 0 30px rgba(0, 128, 255, 0.9), 0 0 40px rgba(0, 128, 255, 0.7);
        }
        
        .title-glow {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            color: #fff;
            text-shadow: 0 0 10px #00bfff, 0 0 20px #00bfff, 0 0 30px #00bfff, 0 0 40px #00bfff;
            animation: flash 2s infinite, textWave 1s ease-in-out infinite;
        }
        
        @keyframes flash {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        @keyframes textWave {
            0%, 100% { transform: translateX(0); }
            50% { transform: translateX(5px); }
        }
        
        .table-large {
            width: 100%;
            font-size: 1.1rem;
        }
        
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1000; 
            left: 0; 
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgba(0,0,0,0.4); 
        }
        
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
        }
        
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        
        @media (max-width: 768px) {
            .title-glow {
                font-size: 1.5rem;
            }
        
            .glow-card {
                max-width: 90%;
                padding: 15px;
            }
        
            .table-large {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="w-full max-w-full mx-auto p-8 rounded-lg shadow-lg glow-card">
            <!-- Title Section -->
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6 text-white">
                <h1 class="title-glow">Daftar Buku Tamu</h1>
            </div>

            <!-- Table Section -->
            <div class="p-6">
                <?php if (!empty($current_data)) : ?>
                    <div class="overflow-x-auto">
                        <table class="table-large bg-white" id="buku-tamu-table">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Komentar</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <?php foreach ($current_data as $index => $tamu) : ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($tamu['nama']); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($tamu['email']); ?></td>
                                        <td class="px-6 py-4"><?php echo htmlspecialchars($tamu['komentar']); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <form method="POST" class="inline">
                                                <input type="hidden" name="delete" value="<?php echo $index; ?>">
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded transition duration-300">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else : ?>
                    <p class="text-center">Belum ada data buku tamu.</p>
                <?php endif; ?>

                <!-- Buttons Section -->
                <div class="mt-4 flex justify-start space-x-4">
                    <!-- Home Button with Icon -->
                    <a href="dashboard.php" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full transition duration-300">
                        <i class="fas fa-home"></i>
                    </a>

                    <!-- Preview Button -->
                    <button id="previewBtn" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-full transition duration-300">
                        <i class="fas fa-eye"></i> Preview PDF
                    </button>
                </div>
            </div>

            <!-- Footer Section -->
            <div class="bg-gray-100 p-4 text-center text-gray-600 text-sm">
                Sistem Informasi Buku Tamu
            </div>
        </div>
    </div>

    <!-- Modal for PDF Preview -->
    <div id="previewModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <iframe id="pdfPreview" style="width:100%;height:500px;"></iframe>
            <div class="mt-4 text-center">
                <button id="downloadBtn" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full transition duration-300">
                    <i class="fas fa-download"></i> Download PDF
                </button>
            </div>
        </div>
    </div>

    <?php if (isset($deleteSuccess)) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Data Berhasil Dihapus!',
                text: 'Data buku tamu berhasil dihapus.',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    <?php endif; ?>

    <script>
        // Function to preview and download PDF
        document.getElementById('previewBtn').addEventListener('click', function () {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            
            // Add table content to PDF
            let table = document.getElementById("buku-tamu-table");
            let rows = table.rows;
            let pdfContent = [];
            
            for (let i = 1; i < rows.length; i++) { // Skip header row
                let rowData = [];
                for (let j = 0; j < rows[i].cells.length - 1; j++) { // Skip the action column
                    rowData.push(rows[i].cells[j].innerText);
                }
                pdfContent.push(rowData);
            }

            // Custom Styling and Content
            doc.setFontSize(18);
            doc.text("Daftar Buku Tamu", 14, 20);
            doc.setFontSize(12);
            doc.setTextColor(99);

            doc.autoTable({
                head: [['Nama', 'Email', 'Komentar']],
                body: pdfContent,
                theme: 'striped'
            });

            // Show PDF in the preview modal
            const pdfBlob = doc.output('blob');
            const previewUrl = URL.createObjectURL(pdfBlob);
            document.getElementById('pdfPreview').src = previewUrl;

            // Show modal
            const modal = document.getElementById('previewModal');
            modal.style.display = "block";

            // Close modal
            document.querySelector('.close').onclick = function() {
                modal.style.display = "none";
            }

            // Download PDF when clicked
            document.getElementById('downloadBtn').addEventListener('click', function () {
                doc.save("buku_tamu.pdf");
            });
        });
    </script>

    <!-- Include AutoTable for jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
</body>
</html>