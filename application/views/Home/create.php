<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      
      
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="card" id="sample-login">
            <div class="card-header">
              <h3>Create Produk</h3>
            </div>
            <form method="POST" action="<?= base_url("home/tambah_simpan") ?>" enctype="multipart/form-data">
             <div class="card-body ">
                    <label>Nama Mahasiswa</label>
                    <div class="form-group <?= form_error('namaMhs') ? 'is-invalid' :  '' ?>">
                      <input type="text" class="form-control" name="namaMhs">
                      <?= form_error('namaMhs') ?>
                    </div>
                    <label>Nim</label>
                    <div class="form-group">
                      <input type="text" class="form-control" name="nim">
                      <?= form_error('nim') ?>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-5">
                        <label for="id_provinsi1">Provinsi</label>
                        <select name="provinsi" id="id_provinsi" class="form-control" >
                          <?php foreach($dataprov as $pro) : ?>
                            <option value="<?= $pro->id ?>"><?= $pro->provinsi ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('provinsi') ?>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="id_kabupaten">Kabupaten</label>
                        <select name="kabupaten" id="id_kabupaten" class="form-control" >
                        </select>
                        <?= form_error('kabupaten') ?>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputZip">Kecamatan</label>
                        <select name="kecamatan" id="id_kecamatan" class="form-control">
                        </select>
                        <?= form_error('kecamatan') ?>
                      </div>
                    </div>
                    <label>Tanggal Lahir</label>
                    <div class="form-group">
                      <input type="date" class="form-control" name="tglLahir">
                      <?= form_error('namaMhs') ?>
                    </div>
                    <label>Jurusan</label>
                    <div class="form-group">
                      <select class="form-control" name="jurusan">
                      <?php foreach($datajurusan as $j) : ?>
                        <option value="<?= $j->id_jurusan ?>"><?= $j->jurusan ?></option>
                      <?php endforeach; ?>
                      </select>
                      <?= form_error('jurusan') ?>
                    </div>
                    <label>Foto 4x3</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="gambar">
                      <label class="custom-file-label" for="customFile">Masukan gambar</label>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button class="btn btn-primary">Submit</button>
                  </div>
                </form>
            </div>
        </section>
      </div>
      
    </div>
  </div>

 