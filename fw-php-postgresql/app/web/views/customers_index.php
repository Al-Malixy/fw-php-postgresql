<?php
$result = pg_fetch_all($data['pegawai']);

//print("<pre>" . print_r($result, true) . "</pre>");

echo "<ul>";
foreach ($result as $row) {
    echo "<li>Order ID: " . $row['order_id'] . ", Name: " . $row['name'] . ", Price: " . $row['price'] . ", Quantity: " . $row['quantity'] . "</li>";
}
echo "</ul>";
