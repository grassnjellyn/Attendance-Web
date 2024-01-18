<!-- Main content -->
<section class="content">
    <!-- left column -->
    <div class="col-md-13">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Input Form Dosen</h3>
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
                            // 
                            ?>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label for="labelNikDosen">NIK</label>
                        <input type="text" id="idNikDosen" name="nikDosen" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="labelEmailDosen">Email Dosen</label>
                        <input type="text" id="idEmailDosen" name="emailDosen" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="labelNamaDosen">Nama Dosen</label>
                        <input type="text" id="idNamaDosen" name="namaDosen" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="labelRole">Role</label>
                        <select multiple="multiple" class="form-control select2" style="width: 100%;" name="role" id="idRole">
                            <?php
                            /**@var $item Role*/
                            foreach ($role as $item) {
                                echo '<option>' . $item->getIdRole() . ' - ' . $item->getName() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" name="btnAddDosen" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</section>
<script>
    $('#idRole').select2({
        closeOnSelect: false
    });
</script>