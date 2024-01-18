<style>
    .btn {
        width: 80px;
        text-align: center;
        margin: 5px;
    }
</style>
<?php
// Get status message
if (!empty($_GET['status'])) {
    switch ($_GET['status']) {
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Members data has been imported successfully.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}
?>

<!-- Display status message -->
<?php if (!empty($statusMsg)) { ?>
    <div class="col-xs-12">
        <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
    </div>
<?php } ?>

<div class="row">
    <!-- Import link -->
    <div class="col-12">
        <div class="float-right">
            <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i> Import</a>
        </div>
    </div>
    <!-- CSV file upload form -->
    <div class="col-md-12" id="importFrm" style="display: none;">
        <form action="view/import-jadwal.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" />
            <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
        </form>
    </div>
</div>
<br>

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Jadwal</h3>
                    <div class="card-tools">
                        <a href="./file/Jadwal.csv" download class="btn btn-tool btn-sm">
                            <i class="fas fa-download"> Download Template</i>
                        </a>
                        <a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Kelas</th>
                                <th>Hari</th>
                                <th>Waktu Mulai</th>
                                <th>Mata Kuliah</th>
                                <th>Dosen</th>
                                <th>Semester</th>
                                <th>Ruangan</th>
                                <th>Tipe</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($jadwal as $jadwals) {
                                if ($_SESSION['web_role'] == 1) {
                                    echo '<tr>';
                                    echo '<td>' . $jadwals->getKelasJadwal() . '</td>';
                                    echo '<td>' . $jadwals->getHariJadwal() . '</td>';
                                    echo '<td>' . $jadwals->getWaktuMulaiJadwal() . '</td>';
                                    echo '<td>' . $jadwals->getMatkul()->getNamaMk() . '</td>';
                                    echo '<td>' . $jadwals->getDosen()->getNamaDosen() . '</td>';
                                    echo '<td>' . $jadwals->getSemester()->getNamaTahunSemester() . '</td>';
                                    echo '<td>' . $jadwals->getRuangan()->getNamaRuangan() . '</td>';
                                    echo '<td>' . $jadwals->getTipeJadwal() . '</td>';
                                    echo '<td> 
                    <button onclick="editJadwal(\'' . $jadwals->getKelasJadwal() . '\')" class="btn btn-success">Edit</button>
                    <button onclick="deleteJadwal(\'' . $jadwals->getKelasJadwal() . '\', \'' . $jadwals->getMatkul()->getKodeMk() . '\', \'' . $jadwals->getDosen()->getNik() . '\', \'' . $jadwals->getSemester()->getIdSemester() . '\', \'' . $jadwals->getTipeJadwal() . '\')" class="btn btn-danger">Delete</button></td>';
                                    echo '</tr>';
                                } else {
                                    if ($jadwals->getDosen()->getNik() == $_SESSION['web_nik']) {
                                        echo '<tr>';
                                        echo '<td>' . $jadwals->getKelasJadwal() . '</td>';
                                        echo '<td>' . $jadwals->getHariJadwal() . '</td>';
                                        echo '<td>' . $jadwals->getWaktuMulaiJadwal() . '</td>';
                                        echo '<td>' . $jadwals->getMatkul()->getNamaMk() . '</td>';
                                        echo '<td>' . $jadwals->getDosen()->getNamaDosen() . '</td>';
                                        echo '<td>' . $jadwals->getSemester()->getNamaTahunSemester() . '</td>';
                                        echo '<td>' . $jadwals->getRuangan()->getNamaRuangan() . '</td>';
                                        echo '<td>' . $jadwals->getTipeJadwal() . '</td>';
                                        echo '</tr>';
                                    }
                                }
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function editJadwal(kelas, matkul, dosen, semester, tipe) {
        window.location = "index.php?webmenu=edgenProdi&eidProdi=" + id;
    }

    function deleteJadwal(kelas, matkul, dosen, semester, tipe) {
        const confirmation = window.confirm("Are you sure want to delete this data?");
        if (confirmation) {
            window.location = "index.php?webmenu=jadwal&delcomJadwal=1&dkJadwal=" + kelas + "&dmJadwal=" + matkul + "&ddJadwal=" + dosen + "&dsJadwal=" + semester + "&dtJadwal=" + tipe;
        }
    }
</script>
<script>
    // Show/hide CSV upload form
    function formToggle(ID) {
        var element = document.getElementById(ID);
        if (element.style.display === "none") {
            element.style.display = "block";
        } else {
            element.style.display = "none";
        }
    }
</script>