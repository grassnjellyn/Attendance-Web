<!-- Main content -->
<section class="content">
    <!-- left column -->
    <div class="col-md-13">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Input Form Matkul</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST">
                <div class="card-body">
                    <!-- <div class="form-group">
                        <label for="labelProgramStudi">Program Studi</label>
                        <select class="form-control select2" style="width: 100%;" name="programStudi" id="idProgramStudi">
                            <?php
                    /**@var $item Dosen*/
                    // foreach($prodi as $item) {
                    //     echo '<option>'.$item->getNamaProdi().'</option>';
                    // }
                    // ?>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label for="labelKodeMatkul">Kode Matkul</label>
                        <input type="text" id="idkodeMatkul" name="kodeMatkul" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="labelNamaMatkul">Nama Matkul</label>
                        <input type="text" id="idNamaMatkul" name="namaMatkul" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="labelProdi">Prodi</label>
                        <select class="form-control select2" style="width: 100%;" name="prodi" id="idProdi">
                            <?php
                            /**@var $item*/
                            foreach ($prodi as $item) {
                                echo '<option>' . $item->getIdProdi() . ' - ' . $item->getNamaProdi() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelJumlahSks">Jumlah SKS</label>
                        <input type="text" id="idJumlahSks" name="jumlahSks" class="form-control" required>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" name="btnAddMatkul" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</section>
