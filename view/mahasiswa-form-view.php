<!-- Main content -->
<section class="content">
    <!-- left column -->
    <div class="col-md-13">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Input Form Mahasiswa</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="labelNrp">NRP</label>
                        <input type="text" id="idNrp" name="nrp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="labelNamaMahasiswa">Nama Mahasiswa</label>
                        <input type="text" id="idNamaMahasiswa" name="namaMahasiswa" class="form-control" required>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" name="btnAddMahasiswa" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</section>