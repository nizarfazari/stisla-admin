

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8 ">
            <!-- <div class="login-brand">
              <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div> -->

            <div class="card card-primary">
              <div class="card-header d-flex justify-content-center"><h4>Login</h4></div>

              <div class="card-body">
               
                <form method="POST" action=" <?= base_url('login/login') ?>" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control <?= form_error('username') ? 'is-invalid' :  '' ?>" name="username" tabindex="1" required autofocus>
                    <?= form_error('username') ?>
                  </div>
                  
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control <?= form_error('password') ? 'is-invalid' :  '' ?>" name="password" tabindex="1" required autofocus>
                    <?= form_error('password') ?>
                  </div>
                  
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Tidak mempunyai akun <a href="<?= base_url('register')  ?>">Register</a>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

