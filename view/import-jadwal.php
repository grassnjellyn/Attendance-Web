<?php
function my_autoloader($class) {
    include 'util/ConnectionUtil.php';
    include 'view/jadwal-view.php';
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
                $kelas_jadwal = $line[0];
                $hari_jadwal = $line[1];
                $waktu_mulai_jadwal = $line[2];
                $matkul_kode_mk = $line[3];
                $dosen_nik = $line[4];
                $semester_id_semester = $line[5];
                $ruangan_id_ruangan = $line[6];
                $tipe_jadwal = $line[7];

                $link->query("INSERT INTO jadwal (kelas_jadwal, hari_jadwal, waktu_mulai_jadwal, 
                matkul_kode_mk, dosen_nik, semester_id_semester, ruangan_id_ruangan, tipe_jadwal) 
                VALUES ('".$kelas_jadwal."', '".$hari_jadwal."', '".$waktu_mulai_jadwal."', 
                '".$matkul_kode_mk."', '".$dosen_nik."', '".$semester_id_semester."', '".$ruangan_id_ruangan."', '".$tipe_jadwal."')");
                
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
header("Location: ../index.php?webmenu=import-jadwal");