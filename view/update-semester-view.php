<!-- Main content -->
<section class="content">
    <!-- left column -->
    <div class="col-md-13">
        <!-- general form elements -->
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Update Form Semester</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">

                    <div class="form-group">
                        <label for="labelIdSemester">ID Semester</label>
                        <input type="text" id="labelIdSemester" name="idSemester" required class="form-control" value="<?php echo $semester->getIdsemester(); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="labelNamaTahunSemester">Nama Tahun Semester</label>
                        <input type="text" id="idNamaTahunSemester" value="<?php echo $semester->getNamaTahunsemester(); ?>" name="namaTahunSemester" class="form-control" required>
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