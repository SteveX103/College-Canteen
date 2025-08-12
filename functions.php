<?php
function insertMenu($conn,$foodName,$foodPrice,$foodDesc,$foodCat){
    $foodID = generateFoodID($conn);
    $qry="INSERT INTO food (foodID,foodName, foodPrice, foodDescription, foodCategory) VALUES ('$foodID','$foodName', '$foodPrice', '$foodDesc', '$foodCat')";
    if($conn->query($qry)){
        return true;
    } else {
        return "Error: " . $conn->error;
    };
}
function generateFoodID($conn){
    $sql = "SELECT foodID FROM food ORDER BY foodID DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($row = $result->fetch_assoc()) {
        $lastID = $row['foodID'];      // e.g., F007
        $num = intval(substr($lastID, 1)); // 7
        $newNum = $num + 1;
        return "F" . str_pad($newNum, 3, "0", STR_PAD_LEFT); // F008
    } else {
        return "F001";
    }
}

function getMenu($conn){
    $sql = "SELECT * FROM food 
            ORDER BY FIELD(foodCategory, 'Beverages', 'Snacks', 'Meal'), foodName";
    $result = $conn->query($sql);

    $menu = [];
    while ($row = $result->fetch_assoc()) {
        $category = $row['foodCategory'];
        $menu[$category][] = $row;
    }

    return $menu;
}
?>