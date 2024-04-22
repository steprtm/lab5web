<?php
// Include the Database class, assuming it's not already autoloaded
require_once 'database.php';
$db = new Database();

// Fetch data from the database
$results = $db->query("SELECT * FROM mahasiswa");  // Replace 'mahasiswa' with your actual table name

// Check if we got results
if ($results && $results->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>NIM</th><th>Nama</th><th>Alamat</th></tr>";

    while ($row = $results->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['nim']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
        echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No data found";
}
?>
