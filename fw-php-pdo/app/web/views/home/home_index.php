<?php
$data_array = $data['pegawai']->fetchAll(PDO::FETCH_ASSOC);
echo "<ul>";
foreach ($data_array as $row) {
    //print("<pre>" . print_r($row, true) . "</pre>");
    echo "<li>NIY: " . $row['niy'] . ", Nama: " . $row['nama'] . ", Email: " . $row['email'] . "</li>";
}
echo "</ul>";
