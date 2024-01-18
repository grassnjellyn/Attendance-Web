<!-- Main content -->
<section class="content">
    <!-- left column -->
    <div class="col-md-13">
        <!-- general form elements -->
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Update Form Prodi</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="labelIdProdi">ID Prodi</label>
                        <input type="text" id="idProdiId" name="idProdi" class="form-control" required
                        value="<?php echo $prodi->getIdProdi(); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="labelNamaProdi">Nama Prodi</label>
                        <input type="text" id="idNamaProdi" value="<?php echo $prodi->getNamaProdi(); ?>" name="namaProdi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="labelTingkatanProdi">Tingkatan Prodi</label>
                        <input type="text" id="idTingkatanProdi" value="<?php echo $prodi->getTingkatanProdi(); ?>" name="tingkatanProdi" class="form-control" required>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</section>