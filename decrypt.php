
<?php
include 'utils.php';

$key = $_POST['key'];
$base64 = '';

echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Hasil Dekripsi</title>";
echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'>";
echo "</head><body><div class='container mt-5'>";
echo "<h2>🔓 Hasil Dekripsi</h2>";

if (!empty($_FILES['cipherfile']['tmp_name'])) {
    $data = file_get_contents($_FILES['cipherfile']['tmp_name']);
    $base64 = base64_encode($data);
} else if (!empty($_POST['ciphertext'])) {
    $base64 = $_POST['ciphertext'];
} else {
    die("<div class='alert alert-danger'>Tidak ada input!</div>");
}

$data = base64_decode($base64);
if ($data === false) {
    die("<div class='alert alert-danger'>Base64 tidak valid!</div>");
}

$isAlphaOnly = preg_match('/^[A-Za-z]+$/', $data);

if ($isAlphaOnly) {
    $plaintext = vigenereDecryptText($data, $key);
    echo "<div class='mb-3'><label class='form-label'>Plainteks:</label><textarea class='form-control' rows='6'>" . htmlspecialchars($plaintext) . "</textarea></div>";
} else {
    $decrypted = vigenereEncryptBinary($data, $key);
    file_put_contents("decrypted_output.bin", $decrypted);
    echo "<div class='alert alert-success'>File berhasil didekripsi.</div>";
    echo "<a class='btn btn-success' href='download.php?file=decrypted_output.bin'>💾 Unduh File</a>";
}

echo "<br><br><a href='index.php' class='btn btn-secondary'>⬅️ Kembali</a></div></body></html>";
?>
