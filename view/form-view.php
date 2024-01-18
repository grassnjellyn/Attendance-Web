<style>
    #photoId {
        display: none;
    }

    .custom-file-upload {
        display: block;
        width: 200px;
        height: 36px;
        line-height: 36px;
        background: #4CAF50;
        color: white;
        text-align: center;
        border-radius: 3px;
        margin: 0 auto;
    }

    .custom-file-upload:hover {
        background: #3e8e41;
        /* change the background color on hover */
    }
</style>

<!-- Main content -->
<section class="content">
    <!-- left column -->
    <div class="col-md-13">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Input Form Detail</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <!-- <div class="form-group">
                        <label for="labelProgramStudi">Program Studi</label>
                        <select class="form-control select2" style="width: 100%;" name="programStudi" id="idProgramStudi">
                            <?php
                            /**@var $item Prodi*/
                            // foreach($prodi as $item) {
                            //     echo '<option>'.$item->getNamaProdi().'</option>';
                            // }
                            // 
                            ?>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label for="labelJadwal">Jadwal</label>
                        <select class="form-control select2" style="width: 100%;" multiple="multiple" name="jadwal" id="idJadwal" onchange="changeVal()">
                            <?php
                            /**@var $item Jadwal*/
                            foreach ($jadwal as $item) {
                                if ($_SESSION['web_role'] == 1) {
                                    echo '<option>' . $item->getKelasJadwal() . " | " . $item->getSemester()->getIdSemester() . " (" . $item->getSemester()->getNamaTahunSemester() . ") | " . $item->getDosen()->getNik() . " (" . $item->getDosen()->getNamaDosen() . ") | " . $item->getMatkul()->getKodeMk() . " (" . $item->getMatkul()->getNamaMk() . ") | " . $item->getTipeJadwal() . '</option>';
                                } else {
                                    if ($item->getDosen()->getNik() == $_SESSION['web_nik']) {
                                        echo '<option>' . $item->getKelasJadwal() . " | " . $item->getSemester()->getIdSemester() . " | " . $item->getDosen()->getNik() . " | " . $item->getMatkul()->getKodeMk() . " | " . $item->getTipeJadwal() . '</option>';
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelKelas">Kelas</label>
                        <input type="text" class="form-control" id="idKelas" name="kelas" placeholder="" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="labelSemester">Semester</label>
                        <input type="text" class="form-control" id="idSemester" name="semester" placeholder="" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="labelDosen">Dosen</label>
                        <input type="text" class="form-control" id="idDosen" name="dosen" placeholder="" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="labelMataKuliah">Mata Kuliah</label>
                        <input type="text" class="form-control" id="idMataKuliah" name="mataKuliah" placeholder="" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="labelTipe">Tipe</label>
                        <input type="text" class="form-control" id="idTipe" name="tipe" placeholder="" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="labelPertemuan">Pertemuan Ke</label>
                        <select class="form-control select2" multiple="multiple" style="width: 100%;" name="pertemuan" id="idPertemuan">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelTanggal">Tanggal</label>
                        <input type="date" id="idTanggal" name="tanggal" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
                    </div>
                    <div class="form-group">
                        <label for="labelWaktuMulai">Waktu Mulai</label>
                        <input type="time" id="idWaktuMulai" name="waktuMulai" class="form-control datetimepicker-input" required>
                    </div>
                    <div class="form-group">
                        <label for="labelJumlahMahasiswa">Jumlah Mahasiswa</label>
                        <input type="number" id="idJumlahMahasiswa" name="jumlahMahasiswa" min="0" max="100" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="labelMateri">Materi Pokok Bahasan</label>
                        <input type="text" class="form-control" id="idMateri" name="materi" placeholder="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="labelCatatan">Catatan</label>
                        <textarea rows="4" cols="50" name="catatan" class="form-control"></textarea>
                    </div>

                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="asisten1" name="asisten1" value="Asisten1" onclick="myFunction()">
                    <label class="form-check-label" for="asisten1" for="asisten1"> Asisten 1 </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="noasisten1" name="asisten1" value="NoAsisten1" onclick="myFunction()">
                    <label class="form-check-label" for="noasisten1" for="asisten1"> Tanpa Asisten 1</label>
                    </div>

                    <div class="form-group">
                        <label for="labelNRPAsisten">NRP Asisten 1</label>
                        <select class="form-control select2" multiple="multiple" style="width: 100%;" name="asisten1opsi" id="idAsisten" disabled=TRUE>
                            <?php
                            /**@var $item Asisten*/
                            foreach ($asisten as $item) {
                                echo '<option>' . $item->getNrp() . " - " . $item->getNamaMahasiswa() . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="asisten2" name="asisten2" value="Asisten2" onclick="myFunction()">
                    <label class="form-check-label" for="asisten2" for="asisten2"> Asisten 2 </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="noasisten2" name="asisten2" value="NoAsisten2" onclick="myFunction()">
                    <label class="form-check-label" for="noasisten2" for="asisten2"> Tanpa Asisten 2</label>
                    </div>

                    <div class="form-group">
                        <label for="labelNRPAsisten">NRP Asisten 2</label>
                        <select class="form-control select2" multiple="multiple" style="width: 100%;" name="asisten2opsi" id="idAsisten2" disabled=TRUE>
                            <?php
                            /**@var $item Asisten*/
                            foreach ($asisten as $item) {
                                echo '<option>' . $item->getNrp() . " - " . $item->getNamaMahasiswa() . '</option>';
                            }
                            ?>
                        </select>
                    </div>


                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="asisten3" name="asisten3" value="Asisten3" onclick="myFunction()">
                    <label class="form-check-label" for="asisten3" for="asisten3"> Asisten 3 </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="noasisten3" name="asisten3" value="NoAsisten3" onclick="myFunction()">
                    <label class="form-check-label" for="noasisten3" for="asisten3"> Tanpa Asisten 3</label>
                    </div>

                    <div class="form-group">
                        <label for="labelNRPAsisten">NRP Asisten 3</label>
                        <select class="form-control select2" style="width: 100%;" multiple="multiple" name="asisten3opsi" id="idAsisten3" disabled=TRUE>
                            <?php
                            /**@var $item Asisten*/
                            foreach ($asisten as $item) {
                                echo '<option>' . $item->getNrp() . " - " . $item->getNamaMahasiswa() . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="labelJumlahJam">Jumlah Jam</label>
                        <input type="number" id="idJumlahJam" name="jumlahJam" min="0" max="500" class="form-control">
                    </div>
                    <!-- <div class="form-group">
                        <label for="labelBukti">Bukti Kehadiran</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <label class="custom-file-label" for="labelBukti">Choose file</label>
                                <input type="file" name="bukti" accept="image/png, image/jpeg" class="custom-file-input" id="labelBukti">
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                            </div>
                        </div>
                    </div>
                 -->
                    <div class="form-group">
                        <label for="photoId" class="form-label">Bukti Kehadiran</label>
                        <input type="file" name="bukti" id="photoId" class="form-control" accept="image/png, image/jpeg">
                        <label for="photoId" class="custom-file-upload">Choose file</label>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" name="btnAddDetail" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</section>
<script>
    function myFunction() {
        var checkBox1 = document.getElementById("asisten1");
        var checkBox2 = document.getElementById("noasisten1");

        var checkBox3 = document.getElementById("asisten2");
        var checkBox4 = document.getElementById("noasisten2");

        var checkBox5 = document.getElementById("asisten3");
        var checkBox6 = document.getElementById("noasisten3");

        if (checkBox1.checked == true) {
            document.getElementById("idAsisten").disabled = false;
        }
        if (checkBox2.checked == true) {
            document.getElementById("idAsisten").disabled = true;
        }

        if (checkBox3.checked == true) {
            document.getElementById("idAsisten2").disabled = false;
        }
        if (checkBox4.checked == true) {
            document.getElementById("idAsisten2").disabled = true;
        }

        if (checkBox5.checked == true) {
            document.getElementById("idAsisten3").disabled = false;
        }
        if (checkBox6.checked == true) {
            document.getElementById("idAsisten3").disabled = true;
        }
    }

    function changeVal() {
        var f = document.getElementById("idJadwal");
        var chosen = f.options[f.selectedIndex].value;
        var array = chosen.split(" | ");
        //var idRoSemester = chosen.substring(4, 5);
        //var roSemester = "<?php //echo fetchSemesterById(); 
                            ?>//";

        document.getElementById("idKelas").value = array[0];
        document.getElementById("idSemester").value = array[1].substring(3, array[1].length - 1);
        document.getElementById("idDosen").value = array[2].substring(7, array[2].length - 1);
        document.getElementById("idMataKuliah").value = array[3].substring(7, array[3].length - 1);
        document.getElementById("idTipe").value = array[4];
    }

    $('#idAsisten').select2({
        closeOnSelect: false
    });

    $('#idAsisten2').select2({
        closeOnSelect: false
    });

    $('#idAsisten3').select2({
        closeOnSelect: false
    });

    $('#idJadwal').select2({
        closeOnSelect: false
    });

    $('#idPertemuan').select2({
        closeOnSelect: false
    });
</script>