<!-- Main content -->
<section class="content">
    <!-- left column -->
    <div class="col-md-13">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Input Form Semester</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST">
                <div class="card-body">
                    <!-- <div class="form-group">
                        <label for="labelProgramStudi">Program Studi</label>
                        <select class="form-control select2" style="width: 100%;" name="programStudi" id="idProgramStudi">
                            <?php
                    /**@var $item Semester*/
                    // foreach($prodi as $item) {
                    //     echo '<option>'.$item->getNamaProdi().'</option>';
                    // }
                    // ?>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label for="labelNamaTahunSemester">Nama Tahun Semester</label>
                        <input type="text" id="idNamaTahunSemester" name="namaTahunSemester" class="form-control" required>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" name="btnAddSemester" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</section>