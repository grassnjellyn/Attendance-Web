<style>
    .btn {
        width: 80px;
        text-align: center;
        margin: 5px;
    }
</style>
<div class="card">
    <div class="card-header border-0">
        <h3 class="card-title">Attendance</h3>
        <div class="card-tools">
            <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-download"></i>
            </a>
            <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-bars"></i>
            </a>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-striped table-valign-middle">
            <thead>
            <tr>
                <th>Pertemuan Ke</th>
                <th>Tanggal</th>
                <th>Waktu Mulai</th>
                <th>Jumlah Mahasiswa</th>
                <th>Materi</th>
                <th>Keterangan</th>
                <th>Dibantu Asisten</th>
                <th>Bukti</th>
                <th>Kelas</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($detail as $details) {
                if ($details->getJadwal()->getDosen()->getNik() == $_SESSION['web_nik']) {
                    echo '<tr>';
                    echo '<th>' . $details->getPertemuanKe() . '</th>';
                    echo '<th>' . $details->getTanggal() . '</th>';
                    echo '<th>' . $details->getWaktuMulai() . '</th>';
                    echo '<th>' . $details->getJumlahMahasiswa() . '</th>';
                    echo '<th>' . $details->getMateri() . '</th>';
                    echo '<th>' . $details->getKeterangan() . '</th>';
                    echo '<th>' . $details->getDibantuAsisten() . '</th>';
                    // echo '<th>' . $details->getBukti() . '</th>';
                    if ($details->getBukti() == null || $details->getBukti() == ' ') {
                        echo '<th><img src="uploads/default_photo.svg" alt="photo" style="max-width: 60px"></td>';
                    } else {
                        echo '<th><img src="uploads/' . $details->getBukti() . '" alt="photo" style="max-width: 60px"></td>';
                    }
                    echo '<th>' . $details->getJadwal()->getKelasJadwal() . '</th>';
                    echo '<td> 
                    <button onclick="editDetail(\'' . $details->getPertemuanKe() . '\')" class="btn btn-success">Edit</button>
                    <button onclick="deleteDetail(\'' . $details->getPertemuanKe() . '\', \'' . $details->getJadwal()->getKelasJadwal() . '\', \'' . $details->getJadwal()->getSemester()->getIdSemester() . '\', \'' . $details->getJadwal()->getDosen()->getNik() . '\', \'' . $details->getJadwal()->getMatkul()->getKodeMk() . '\', \'' . $details->getJadwal()->getTipeJadwal() . '\')" class="btn btn-danger">Delete</button></td>';
                    echo '</tr>';
                }
            }

            ?>
            </tbody>
        </table>
    </div>
</div>
<!-- /.card -->
<script>
    function editDetail(pertemuan, kelas, semester, dosen, matkul, tipe) {
        window.location = "index.php?webmenu=edgenProdi&eidProdi=" + id;
    }

    function deleteDetail(pertemuan, kelas, semester, dosen, matkul, tipe) {
        const confirmation = window.confirm("Are you sure want to delete this data?");
        if (confirmation) {
            window.location = "index.php?webmenu=detail&delcomDetail=1&dpDetail=" + pertemuan + "&dkDetail=" + kelas + "&dsDetail=" + semester + "&ddDetail=" + dosen + "&dmDetail=" + matkul + "&dtDetail=" + tipe;
        }
    }
</script>