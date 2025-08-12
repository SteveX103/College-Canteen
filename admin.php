<?php
include 'conn.php';
include 'functions.php';
#Menu Creation
if (isset($_POST['btn'])) {
    $foodName = $_POST['foodname'];
    $foodPrice = $_POST['foodprice'];
    $foodDesc = $_POST['fooddesc'];
    $foodCat = $_POST['foodtype'];

    $result = insertMenu($conn, $foodName, $foodPrice, $foodDesc, $foodCat);
    
    if ($result === true) {
        header("Location: admin.html?status=success");
        exit();
    } else {
        echo "Error: " . $result;
    }
}

?>
