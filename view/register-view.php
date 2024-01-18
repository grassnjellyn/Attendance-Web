<div class="register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="../../index2.html"><b>Attendance</b>WEB</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new user</p>

                <form method="post" onSubmit="return validate();">
                    <div class="input-group mb-3">
                        <input type="text" id="idNikDosen" placeholder="NIK" name="nikDosen" class="form-control" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <!-- <span class="fas fa-user"></span> -->
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" id="idEmailDosen" placeholder="Email" name="emailDosen" class="form-control" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <!-- <span class="fas fa-envelope"></span> -->
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" id="idNamaDosen" placeholder="Nama Dosen" name="namaDosen" class="form-control" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <!-- <span class="fas fa-lock"></span> -->
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="idPasswordDosen" placeholder="Password" name="passwordDosen" class="form-control" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="confirm_password" placeholder="Confirm Password" name="passwordDosen" class="form-control" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="idRole" value="2" name="role" class="form-control" required>
            <!-- <div class="input-group mb-3">
                        <select class="form-control select2" style="width: 70%;" name="role" id="idRole">
                            <?php
                            /**@var $item Role*/
                            // foreach ($role as $item) {
                            //     echo '<option>' . $item->getIdRole() . ' - ' . $item->getName() . '</option>';
                            // }
                            // 
                            ?>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div> -->
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                        <label for="agreeTerms">
                            I agree to the <a href="#">terms</a>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" name="btnAddDosen" class="btn btn-primary btn-block">Register</button>

                </div>
                <!-- /.col -->
            </div>
            </form>

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i>
                    Sign up using Facebook
                </a>
                <!-- <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i>
                    Sign up using Google+
                </a> -->
            </div>

            <a href="index.php" class="text-center">I already have an account</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->
</div>

<script>
    function validate() {
        var a = document.getElementById("idPasswordDosen").value;
        var b = document.getElementById("confirm_password").value;
        if (a != b) {
            alert("Passwords does not match");
            return false;
        }
    }
</script>