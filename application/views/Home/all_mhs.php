<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Daftar Semua Mahasiswa</h1>
                </div>
                <div class="row ">
                    <?php foreach($mhs as $m) : ?>
                        <div class="col-6">
                        <div class="card ml-4" style="width: 45rem;" >
                                <img src="<?= base_url(). "gambar/". $m['gambar'];  ?>"  class="img-thumbnail  m-5" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?= $m["nama"] ?></h5>
                                <hr>
                                <table class="mb-3" >
                                <tr>
                                    <th class="h5 ">NIM</th>
                                    <td></td>
                                    <td>:</td>
                                    <td class="h6"><?= $m["nim"] ?></td>
                                </tr>
                                <tr>
                                    <th class="h5 ">Jurusan</th>
                                    <td></td>
                                    <td>:</td>
                                    <td class="h6"><?= $m["jurusan"] ?></td>
                                </tr>
                                <tr>
                                    <th class="h5 ">Alamat</th>
                                    <td></td>
                                    <td>:</td>
                                    <td class="h6"><?= "$m[provinsi] , $m[kabupaten_kota] , $m[kecamatan]" ?></td>
                                </tr>
                                <tr>
                                    <th class="h5 ">Tanggal Lahir</th>
                                    <td></td>
                                    <td>:</td>
                                    <td class="h6"><?= $m["tanggal_lahir"] ?></td>
                                </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div> 
                    
                </div>
            </section>
        </div>
    </div>
</div>
</div>