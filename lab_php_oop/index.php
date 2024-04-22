<?php
session_start();


include_once "database.php";  
include_once "form.php";     


$mod = isset($_GET['mod']) ? $_GET['mod'] : 'home';


switch ($mod) {
    case 'view':
        include 'view_data.php';  
        break;
    case 'mobil':
        include 'mobil.php'; 
        break;
    case 'form':
        include 'form_input.php'; 
        break;
    default:
        echo "<h1>Modularisasi Form</h1>";
        echo "<p>Choose an option:</p>";
        echo "<ul>";
        echo "<li><a href='?mod=mobil'>Mobil</a></li>";
        echo "<li><a href='?mod=form'>Form Input</a></li>";
        echo "<li><a href='?mod=view'>View Data</a></li>"; 
        echo "</ul>";
        break;
}
