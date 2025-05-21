
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vigenère Cipher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 40px;
        }
        textarea {
            resize: vertical;
        }
        footer {
            margin-top: 40px;
            padding: 20px 0;
            background-color: #e9ecef;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">🔐 Vigenère Cipher Standard (26 huruf alfabet) </h1>

        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Enkripsi</div>
            <div class="card-body">
                <form action="encrypt.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Masukkan Teks:</label>
                        <textarea class="form-control" name="plaintext" rows="4" placeholder="Ketikkan teks di sini..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Atau Pilih File:</label>
                        <input class="form-control" type="file" name="plainfile">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Masukkan Kunci:</label>
                        <input class="form-control" type="text" name="key" required>
                    </div>
                    <button class="btn btn-primary" type="submit">🔐 Enkripsi</button>
                </form>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-success text-white">Dekripsi</div>
            <div class="card-body">
                <form action="decrypt.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Masukkan Cipherteks (Base64):</label>
                        <textarea class="form-control" name="ciphertext" rows="4" placeholder="Tempelkan base64 cipher di sini..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Atau Pilih File:</label>
                        <input class="form-control" type="file" name="cipherfile">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Masukkan Kunci:</label>
                        <input class="form-control" type="text" name="key" required>
                    </div>
                    <button class="btn btn-success" type="submit">🔓 Dekripsi</button>
                </form>
            </div>
        </div>
    </div>

    
</body>
</html>
