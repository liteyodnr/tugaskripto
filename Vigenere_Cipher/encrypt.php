
<?php
include 'utils.php';

$key = $_POST['key'];
$result = '';
$filename = '';
$base64 = '';

echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Hasil Enkripsi</title>";
echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'>";
echo "</head><body><div class='container mt-5'>";
echo "<h2>🔐 Hasil Enkripsi</h2>";

if (!empty($_FILES['plainfile']['tmp_name'])) {
    $data = file_get_contents($_FILES['plainfile']['tmp_name']);
    $result = vigenereEncryptBinary($data, $key);
    $base64 = base64_encode($result);
    $filename = pathinfo($_FILES['plainfile']['name'], PATHINFO_FILENAME) . '.dat';
} else if (!empty($_POST['plaintext'])) {
    $plain = $_POST['plaintext'];
    $result = vigenereEncryptText($plain, $key);
    $base64 = base64_encode($result);
    $filename = 'cipher_text.dat';
} else {
    die("<div class='alert alert-danger'>Tidak ada input!</div>");
}

file_put_contents("encrypted.dat", $result);

echo "<div class='mb-3'><label class='form-label'>Cipherteks (Base64, huruf kecil):</label>
<textarea class='form-control' rows='6'>" . strtolower($base64) . "</textarea></div>";
echo "<a class='btn btn-primary' href='download.php?file=encrypted.dat'>💾 Unduh File Cipher</a>";
echo "<br><br><a href='index.php' class='btn btn-secondary'>⬅️ Kembali</a></div></body></html>";
?>
