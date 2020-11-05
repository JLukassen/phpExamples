<?php
$openssl_crtfile='auth.combined.pem';
$openssl_cadir='./ca';

$x509_res = openssl_x509_read(file_get_contents($openssl_crtfile));
if(empty($x509_res)) {
        echo 'x509 cert could not be read'."\n";
}
$valid = openssl_x509_checkpurpose($x509_res,X509_PURPOSE_SSL_SERVER,array($openssl_cadir));
if ($valid === true) {
        echo 'Certificate is valid for use as SSL server'."\n";
} else {
        echo 'Certificate validation returned'.$valid."\n";
}
?>