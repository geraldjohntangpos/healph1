<?php
    include 'connection.php';

    $sql = "SELECT * FROM healer WHERE STATUS = 'ACTIVE' ORDER BY RATE DESC LIMIT 5";

    $retrieve = $conn->query($sql)->fetchAll();


    echo json_encode($retrieve);
    exit(0);
?>
