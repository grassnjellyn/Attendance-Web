
    <!-- <div class="form-group">
        <label for="dosenNIK">ID</label>
        <input type="text" class="form-control" id="dosenNIK" placeholder="Enter NIK" name="txtNIK" autofocus
               required>
    </div>
    <div class="form-group">
        <label for="passwordId">Password</label>
        <input type="password" class="form-control" id="passwordId" placeholder="Password" name="txtPassword" required>
    </div>
    <button type="submit" class="btn btn-primary" id="btnLogin" name="btnLogin">Submit</button> -->
<div class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index.html"><b>Attendance</b>WEB</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="dosenNIK" placeholder="Enter NIK" name="txtNIK" autofocus required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="passwordId" placeholder="Password" name="txtPassword" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <!-- <button type="submit" class="btn btn-primary btn-block">Sign In</button> -->
                            <button type="submit" class="btn btn-primary btn-block" id="btnLogin" name="btnLogin">Submit</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="index.php?webmenu=register" class="text-center">Register a new user</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
</div>