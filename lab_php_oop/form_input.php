<?php
include_once "database.php";
include_once "form.php";

$db = new Database();
$form = new Form("", "Input Form");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['txtnim'], $_POST['txtnama'], $_POST['txtalamat'])) {
    $nim = $_POST['txtnim'];
    $nama = $_POST['txtnama'];
    $alamat = $_POST['txtalamat'];

    // Insert data into database
    $success = $db->insert('mahasiswa', [
        'nim' => $nim,
        'nama' => $nama,
        'alamat' => $alamat
    ]);

    // Provide user feedback and redirect
    if ($success) {
        echo "<script>alert('Data Tersimpan'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error saving data');</script>";
    }
}

echo "<html><head><title>Mahasiswa</title></head><body>";
echo "<h3>Silahkan isi form berikut ini :</h3>";
$form->addField("txtnim", "Nim");
$form->addField("txtnama", "Nama");
$form->addField("txtalamat", "Alamat");
$form->displayForm();
echo "</body></html>";

