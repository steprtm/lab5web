<?php
include "form.php"; // Make sure this path is correct

$form = new Form("submit.php", "Submit Form"); // Specify the action and the submit button text
$form->addField("txtnim", "Nim");  // Add a field with a label
$form->addField("txtnama", "Nama");  // Add another field
$form->addField("txtalamat", "Alamat");  // And another field

echo "<html><head><title>Test Form</title></head><body>";
$form->displayForm();
echo "</body></html>";
