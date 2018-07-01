<?php
    session_start();
    $dest = array();
    $dest['destination'] = 'http://ovs-core.zaidimarvels.co.ke/';
    echo json_encode($dest);
    session_destroy();
?>
