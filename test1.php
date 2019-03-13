<?php
$data = "Stuff you want encrypted";
$key = "Secret passphrase used to encrypt your data";
$cipher = "MCRYPT_SERPENT_256";
$mode = "MCRYPT_MODE_CBC";
function encrypt($data, $key, $cipher, $mode) {
// Encrypt data
return (string)
            base64_encode
                (
                mcrypt_encrypt
                    (
                    $cipher,
                    substr(md5($key),0,mcrypt_get_key_size($cipher, $mode)),
                    $data,
                    $mode,
                    substr(md5($key),0,mcrypt_get_block_size($cipher, $mode))
                    )
                );
}
function decrypt($data, $key, $cipher, $mode) {
// Decrypt data
    return (string)
            mcrypt_decrypt
                (
                $cipher,
                substr(md5($key),0,mcrypt_get_key_size($cipher, $mode)),
                base64_decode($data),
                $mode,
                substr(md5($key),0,mcrypt_get_block_size($cipher, $mode))
                );
}
?>
