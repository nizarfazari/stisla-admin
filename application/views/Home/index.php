<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      
      
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="div" id="flash" data-flash="<?= $this->session->flashdata('success'); ?>">

          </div>
          <div class="section-header">
            <h1>Daftar Table Mahasiswa</h1>
          </div>
          <div class="section-body">
            <a href="<?= base_url('home/tambah') ?>" class="btn btn-success"><i class="fas fa-plus-square"></i> Tambah Mahasiswa</a>
          </div>
          <div class="row mt-3">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Simple Table</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>NIM</th>
                          <th>Jurusan</th>
                          <th>Alamat</th>
                          <th>Tanggal Lahir</th>
                          <th>Actions</th>
                        </tr>
                        <?php 
                        $no = 0;
                        foreach($getmhs as $mhs ) : $no++?>
                        <tr>
                          <td><?= $no  ?></td>
                          <td><?= $mhs["nama"] ?></td>
                          <td><?= $mhs["nim"] ?></td>
                          <td><?= $mhs["jurusan"] ?></td>
                          <td><?= "$mhs[provinsi] , $mhs[kabupaten_kota] , $mhs[kecamatan]" ?></td>
                          <td><?= $mhs["tanggal_lahir"] ?></td>
                          <td>
                            <a href="<?= base_url('home/info/'.$mhs['id_mhs']) ?>" class="btn btn-primary"><i class="fas fa-info-circle"></i> Info</a>
                            <a href="<?= base_url('home/edit/'.$mhs['id_mhs']) ?>" class="btn btn-warning"><i class="far fa-edit"></i> Ubah</a>
                            <a href="<?= base_url('home/hapus/'.$mhs['id_mhs']) ?>"  class="btn btn-danger hapus"><i class="fas fa-trash-alt"></i> Hapus</a>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>

            </div>
            <div class="row">
        </section>
      </div>
      
    </div>
  </div>