<?php
function my_autoloader($class) {
    include 'util/ConnectionUtil.php';
    include 'view/matkul-view.php';
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
                $kode_mk = $line[0];
                $nama_mk = $line[1];
                $prodi_id_prodi = $line[2];
                $jumlah_sks = $line[3];

                // Check whether member already exists in the database with the same nik
//                $prevQuery = "SELECT nik FROM dosen WHERE nik = '".$line[0]."'";
//                $prevResult = $link->query($prevQuery);

                $link->query("INSERT INTO matkul (kode_mk, nama_mk, prodi_id_prodi, jumlah_sks) VALUES ('".$kode_mk."', '".$nama_mk."', '".$prodi_id_prodi."', '".$jumlah_sks."')");

//                if($prevResult->num_rows > 0){
//                    // Update member data in the database
//                    $link->query("UPDATE dosen SET nama_dosen = '".$nama_dosen."', email = '".$email."', role_id_role = $role_id_role WHERE nik = '".$nik."'");
//                }else{
//                    // Insert member data in the database
//                    $link->query("INSERT INTO dosen (nik, nama_dosen, email, role_id_role) VALUES ('".$nik."', '".$nama_dosen."', '".$email."', '".$role_id_role."')");
//                }
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
header("Location: ../index.php?webmenu=import-matkul");