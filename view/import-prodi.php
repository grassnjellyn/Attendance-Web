<?php
function my_autoloader($class) {
    include 'util/ConnectionUtil.php';
    include 'view/prodi-view.php';
}
spl_autoload_register('my_autoloader');

if(isset($_POST['importSubmit'])){

    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){

        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){

            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

            // Skip the first line
            fgetcsv($csvFile);

            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){

                $link = new PDO('mysql:host=localhost;dbname=attendancedb', 'root', '');

                // Get row data
                $id_prodi = $line[0];
                $nama_prodi = $line[1];
                $tingkatan_prodi = $line[2];
                $link->query("INSERT INTO prodi (id_prodi, nama_prodi, tingkatan_prodi) VALUES ('".$id_prodi."', '".$nama_prodi."', '".$tingkatan_prodi."')");

            }

            // Close opened CSV file
            fclose($csvFile);

            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}
// Redirect to the listing page
header("Location: ../index.php?webmenu=import-prodi");