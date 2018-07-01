<?php
    session_start();
    $dest = array();
    $dest['destination'] = 'http://ovs-core.zaidimarvels.co.ke/index.php';
    echo json_encode($dest);
    session_destroy();
?>
