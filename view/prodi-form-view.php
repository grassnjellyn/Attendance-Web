<!-- Main content -->
<section class="content">
    <!-- left column -->
    <div class="col-md-13">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Input Form Program Studi</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST">
                <div class="card-body">
                    <!-- <div class="form-group">
                        <label for="labelProgramStudi">Program Studi</label>
                        <select class="form-control select2" style="width: 100%;" name="programStudi" id="idProgramStudi">
                            <?php
                    /**@var $item Prodi*/
                    // foreach($prodi as $item) {
                    //     echo '<option>'.$item->getNamaProdi().'</option>';
                    // }
                    // ?>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label for="labelIdProdi">ID Prodi</label>
                        <input type="text" id="idProdiId" name="idProdi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="labelNamaProdi">Nama Prodi</label>
                        <input type="text" id="idNamaProdi" name="namaProdi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="labelTingkatanProdi">Tingkatan Prodi</label>
                        <input type="text" id="idTingkatanProdi" name="tingkatanProdi" class="form-control" required>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" name="btnAddProdi" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</section>