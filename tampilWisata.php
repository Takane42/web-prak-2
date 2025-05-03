<?php

function curl($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

$send = curl("http://localhost/rekayasaweb/praktikum2/getWisata.php");

echo "<h1>Data Wisata</h1>
    <table border='1' cellpadding='10' cellspacing='0'>
    <tr>
    <th>KOTA</th>
    <th>LANDMARK</th>
    <th>TARIF</th>
    </tr>";

$data = json_decode($send, true);

foreach ($data as $row) {
    echo "<tr>
        <td>" . $row['kota'] . "</td>
        <td>" . $row['landmark'] . "</td>
        <td>" . $row['tarif'] . "</td>
        </tr>";
}
?>