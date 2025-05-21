
<?php
function cleanAlphabet($text) {
    return preg_replace('/[^A-Za-z]/', '', strtoupper($text));
}

function vigenereEncryptText($plaintext, $key) {
    $plaintext = cleanAlphabet($plaintext);
    $key = strtoupper($key);
    $keyLength = strlen($key);
    $cipher = '';

    for ($i = 0, $j = 0; $i < strlen($plaintext); $i++) {
        $p = ord($plaintext[$i]) - 65;
        $k = ord($key[$j % $keyLength]) - 65;
        $c = ($p + $k) % 26;
        $cipher .= chr($c + 65);
        $j++;
    }
    return $cipher;
}

function vigenereDecryptText($ciphertext, $key) {
    $ciphertext = cleanAlphabet($ciphertext);
    $key = strtoupper($key);
    $keyLength = strlen($key);
    $plain = '';

    for ($i = 0, $j = 0; $i < strlen($ciphertext); $i++) {
        $c = ord($ciphertext[$i]) - 65;
        $k = ord($key[$j % $keyLength]) - 65;
        $p = ($c - $k + 26) % 26;
        $plain .= chr($p + 65);
        $j++;
    }
    return $plain;
}

function vigenereEncryptBinary($data, $key) {
    $keyLength = strlen($key);
    $output = '';
    for ($i = 0; $i < strlen($data); $i++) {
        $k = ord($key[$i % $keyLength]);
        $output .= chr(ord($data[$i]) ^ $k);
    }
    return $output;
}
?>
