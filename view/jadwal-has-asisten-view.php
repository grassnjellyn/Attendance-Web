<!-- Main content -->
<section class="content">
    <!-- left column -->
    <div class="col-md-13">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Filter By Date</h3>
            </div>
            <form role="form" method="POST">
                <div class="card-body">
                    <div>
                        <div class="form-group">
                            <label for="labelTanggalFrom">From</label>
                            <input type="date" id="idFrom" name="from" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
                        </div>
                        <div class="form-group">
                            <label for="labelTanggalTo">To</label>
                            <input type="date" id="idTo" name="to" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" name="btnFilter" class="btn btn-primary">Filter</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</section>

<div class="card">
    <div class="card-header border-0">
        <h3 class="card-title">Jadwal Has Asisten</h3>
        <div class="card-tools">
            <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-download"></i>
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
                    <th>Semester</th>
                    <th>Dosen</th>
                    <th>Matkul</th>
                    <th>Tipe</th>
                    <th>Asisten</th>
                    <th>Pertemuan</th>
                    <th>Tanggal</th>
                    <th>Jumlah Jam</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($jadwalHasAsisten as $item) {
                    echo '<tr>';
                    echo '<td>' . $item->getJadwal()->getKelasJadwal() . '</td>';
                    echo '<td>' . $item->getJadwal()->getSemester()->getNamaTahunSemester() . '</td>';
                    echo '<td>' . $item->getJadwal()->getDosen()->getNamaDosen() . '</td>';
                    echo '<td>' . $item->getJadwal()->getMatkul()->getNamaMk() . '</td>';
                    echo '<td>' . $item->getJadwal()->getTipeJadwal() . '</td>';
                    echo '<td>' . $item->getAsisten()->getNamaMahasiswa() . '</td>';
                    echo '<td>' . $item->getPertemuan() . '</td>';
                    echo '<td>' . $item->getTanggal() . '</td>';
                    echo '<td>' . $item->getJumlahJam() . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="card">
    <div class="card-header border-0">
        <h3 class="card-title">Rekapitulasi Jumlah Jam</h3>
        <div class="card-tools">
            <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-download"></i>
            </a>
            <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-bars"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NRP</th>
                    <th>Nama Asisten</th>
                    <th>Jumlah Jam</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                foreach ($asisten as $item1) {
                    $no += 1;
                    echo '<tr>';
                    echo '<td>' . $no . '</td>';
                    echo '<td>' . $item1->getNrp() . '</td>';
                    echo '<td>' . $item1->getNamaMahasiswa() . '</td>';
                    $total = 0;
                    foreach ($jadwalHasAsisten as $item2) {
                        if ($item2->getAsisten()->getNrp() == $item1->getNrp()) {
                            $total += $item2->getJumlahJam();
                        }
                    }
                    echo '<td>' . $total . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>