<?php
include 'functions.php';
include 'conn.php';

$menu = getMenu($conn);

// Fixed category display order
$categories = ['Beverages', 'Snacks', 'Meal'];
?>

<h1>Our Menu</h1>

<?php foreach ($categories as $category): ?>
    <?php if (isset($menu[$category])): ?>
        <h2><?php echo htmlspecialchars($category); ?></h2>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>Food Name</th>
                <th>Price (₹)</th>
                <th>Description</th>
            </tr>
            <?php foreach ($menu[$category] as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['foodName']); ?></td>
                    <td><?php echo htmlspecialchars($item['foodPrice']); ?></td>
                    <td><?php echo htmlspecialchars($item['foodDescription']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
<?php endforeach; ?>
