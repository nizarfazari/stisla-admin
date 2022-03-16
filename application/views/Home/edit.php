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
            <form method="POST" action="<?= base_url("home/edit_simpan") ?>" enctype="multipart/form-data">
             <div class="card-body ">
             <input type="hidden" name="id" value="<?= $mhs['id_mhs']; ?>">
                    <label>Nama Mahasiswa</label>
                    <div class="form-group">
                      <input type="text" required class="form-control" name="namaMhs" value="<?= $mhs["nama"]; ?> ">
                      <?= form_error('namaMhs') ?>
                    </div>
                    <label>Nim</label>
                    <div class="form-group">
                      <input type="text" class="form-control" name="nim" value="<?= $mhs["nim"]; ?> " required>
                      <?= form_error('nim') ?>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-5">
                        <label for="id_provinsi1">Provinsi</label>
                        <select name="provinsi" id="id_provinsi" class="form-control" >
                        <option value="<?= $mhs["id_provinsi"]; ?>" selected><?= $mhs["provinsi"]; ?></option>
                          <?php foreach($dataprov as $pro) : ?>
                            <option value="<?= $pro->id ?>"><?= $pro->provinsi ?></option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="id_kabupaten">Kabupaten</label>
                        <select name="kabupaten" id="id_kabupaten" class="form-control" >
                          <option value="<?= $mhs["id_kabkot"]; ?>" selected><?= $mhs["kabupaten_kota"]; ?></option>
                        </select>
                        <?= form_error('kabupaten') ?>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputZip">Kecamatan</label>
                        <select name="kecamatan" id="id_kecamatan" class="form-control">
                        <option value="<?= $mhs["id_kecamatan"]; ?>" selected><?= $mhs["kecamatan"]; ?></option>
                        </select>
                        <?= form_error('kecamatan') ?>
                      </div>
                    </div>
                    <label>Tanggal Lahir</label>
                    <div class="form-group">
                      <input type="date" class="form-control" name="tglLahir" value="<?= $mhs["tanggal_lahir"]; ?>">
                      <?= form_error('tglLahir') ?>
                    </div>
                    <label>Jurusan</label>
                    <div class="form-group">
                      <select class="form-control" name="jurusan">
                      <option value="<?= $mhs["id_jurusan"]; ?>" selected><?= $mhs["jurusan"]; ?></option>
                      <?php foreach($datajurusan as $j) : ?>
                        <option value="<?= $j->id_jurusan ?>"><?= $j->jurusan ?></option>
                      <?php endforeach; ?>
                      </select>
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

