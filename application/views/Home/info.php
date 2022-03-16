<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Detail dari Mahasiswa : <?= $mhs["nama"] ?> </h1>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="card" style="width: 45rem;">
                    <div class="chocolat-parent ml-5 mt-5 mr-5">
                      <a href="<?= base_url(). "gambar/". $mhs['gambar'];  ?>" class="chocolat-image" title="Just an example">
                          <img alt="image" src="<?= base_url(). "gambar/". $mhs['gambar'];  ?>" class="img-thumbnail">
                      </a>
                    </div>
                        <div class="card-body">
                            <h5 class="card-title text-center h2 text-dark"><?= $mhs["nama"] ?></h5>
                            <hr>
                            <div class="tabel d-flex justify-content-center">
                            <table class="mb-3"  style="width: 40rem;" >
                                <tr>
                                    <th class="h5 ">NIM</th>
                                    <td></td>
                                    <td>:</td>
                                    <td class="h6"><?= $mhs["nim"] ?></td>
                                </tr>
                                <tr>
                                    <th class="h5 ">Jurusan</th>
                                    <td></td>
                                    <td>:</td>
                                    <td class="h6"><?= $mhs["jurusan"] ?></td>
                                </tr>
                                <tr>
                                    <th class="h5 ">Alamat</th>
                                    <td></td>
                                    <td>:</td>
                                    <td class="h6"><?= "$mhs[provinsi] , $mhs[kabupaten_kota] , $mhs[kecamatan]" ?></td>
                                </tr>
                                <tr>
                                    <th class="h5 ">Tanggal Lahir</th>
                                    <td></td>
                                    <td>:</td>
                                    <td class="h6"><?= $mhs["tanggal_lahir"] ?></td>
                                </tr>
                            </table>
                            </div>
                        </div>
                    </div>
                </div> 
                    
                </div>
            </section>
        </div>
    </div>
</div>
</div>