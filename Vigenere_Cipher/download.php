
<?php
$file = basename($_GET['file']);
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header("Content-Disposition: attachment; filename=$file");
    readfile($file);
    exit;
}
?>
