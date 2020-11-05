<?php
// You can use isset or is_null for $_SERVER['FCGI_SERVER_VERSION']
function isFastCGI () {
    return !is_null($_SERVER['FCGI_SERVER_VERSION']);
}

?>
