<!-- Main content -->
<section class="content">
    <!-- left column -->
    <div class="col-md-13">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Input Form Jadwal</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="labelKelas">Kelas</label>
                        <select class="form-control select2" multiple="multiple" style="width: 100%;" name="kelas" id="idKelas">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelHari">Hari</label>
                        <select class="form-control select2" multiple="multiple"  style="width: 100%;" name="hari" id="idHari">
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                            <option value="Minggu">Minggu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelWaktuMulai">Waktu Mulai</label>
                        <input type="time" id="idWaktuMulai" name="waktuMulai" class="form-control datetimepicker-input">
                    </div>
                    <div class="form-group">
                        <label for="labelMatkul">Matkul</label>
                        <select class="form-control select2" multiple="multiple" style="width: 100%;" name="matkul" id="idMatkul">
                            <?php
                            /**@var $item Matkul*/
                            foreach ($matkul as $item) {
                                echo '<option>' . $item->getKodeMk() . ' - ' . $item->getNamaMk() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelDosen">Dosen</label>
                        <select class="form-control select2" multiple="multiple" style="width: 100%;" name="dosen" id="idDosen">
                            <?php
                            /**@var $item Dosen*/
                            foreach ($dosen as $item) {
                                echo '<option>' . $item->getNik() . ' - ' . $item->getNamaDosen() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelSemester">Semester</label>
                        <select class="form-control select2" multiple="multiple" style="width: 100%;" name="semester" id="idSemester">
                            <?php
                            /**@var $item Semester*/
                            foreach ($semester as $item) {
                                echo '<option>' . $item->getIdSemester() . ' - ' . $item->getNamaTahunSemester() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelRuangan">Ruangan</label>
                        <select class="form-control select2" multiple="multiple" style="width: 100%;" name="ruangan" id="idRuangan">
                            <?php
                            /**@var $item Ruangan*/
                            foreach ($ruangan as $item) {
                                echo '<option>' . $item->getIdRuangan() . ' - ' . $item->getNamaRuangan() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelTipe">Tipe</label>
                        <select class="form-control select2" multiple="multiple" style="width: 100%;" name="tipe" id="idTipe">
                            <option value="-">-</option>
                            <option value="Teori">Teori</option>
                            <option value="Praktikum">Praktikum</option>
                        </select>
                    </div>
                    <!--                    <div class="form-group">-->
                    <!--                        <label for="labelJumlahAsisten">Jumlah Asisten</label>-->
                    <!--                        <input type="number" id="idJumlahAsisten" name="jumlahAsisten" min="0" max="100" class="form-control" required>-->
                    <!--                    </div>-->

                    <div class="card-footer">
                        <button type="submit" name="btnAddJadwal" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</section>
<script>
    $('#idKelas').select2({
        closeOnSelect: false
    });
    $('#idHari').select2({
        closeOnSelect: false
    });
    $('#idMatkul').select2({
        closeOnSelect: false
    });
    $('#idDosen').select2({
        closeOnSelect: false
    });
    $('#idSemester').select2({
        closeOnSelect: false
    });
    $('#idRuangan').select2({
        closeOnSelect: false
    });
    $('#idTipe').select2({
        closeOnSelect: false
    });
</script>