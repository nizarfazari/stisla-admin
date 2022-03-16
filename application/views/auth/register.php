<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <!-- <div class="login-brand">
              <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div> -->

            <div class="card card-primary">
              <div class="card-header d-flex justify-content-center"><h4>Register</h4></div>
              <div class="card-body">
                <form method="POST" action="<?= base_url("register/registration_simpan") ?>">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control <?= form_error('username') ? 'is-invalid' :  '' ?>" name="username">
                    <?= form_error('username') ?>
                  </div>
                  
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control <?= form_error('password') ? 'is-invalid' :  '' ?>" name="password">
                    <?= form_error('password') ?>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Jika sudah mempunyai akun <a href="<?= base_url('login')  ?>">Login</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
