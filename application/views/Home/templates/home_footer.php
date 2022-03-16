
<footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
      
      <!-- General JS Scripts -->
      <script src="<?= base_url('assets/sweet-allert/sweetalert2.min.js')  ?>"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
      <script src="<?= base_url('assets/js/stisla.js')  ?>"></script>
      

  <!-- JS Libraies -->

  <!-- Template JS File -->

  <script src="<?= base_url('assets/js/scripts.js')  ?>"></script>
  <script src="<?= base_url('assets/js/custom.js')  ?>"></script>

  <script>
    let flash = $('#flash').data('flash');
    if(flash){
      Swal.fire({
        icon: 'success',
        title: 'success',
        text: flash
      })
    }

    $('.hapus').on('click',function(e){
      e.preventDefault();
      let link = $(this).attr('href'); 
      Swal.fire({
      title: 'Apakah anda yakin',
      text: "Data akan di hapus!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#00a65a',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
          window.location = link;
        }
      })
    })
  </script>
  <script>
    $(document).ready(function(){
      loadkabupaten()
      loadkecamatan()
      
    });
    function loadkabupaten(){
      $('#id_provinsi').change(function(){
        let getprovinsi = $('#id_provinsi').val();
        
          
          $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "<?= base_url() ?>/home/getdatakabupaten",
            data : {provinsi : getprovinsi},
            success: function(data){
              let html = "";
              for(let i= 0; i < data.length; i++){
                html += `<option value="${data[i].id}"> ${data[i].kabupaten_kota}</option>`
              }
              $('#id_kabupaten').html(html);
              $('#id_kabupaten').show();

            }
          })

        })
      }
      function loadkecamatan(){
      $('#id_kabupaten').change(function(){
        let getkabupaten = $('#id_kabupaten').val();
        
          
          $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "<?= base_url() ?>/home/getdatakecamatan",
            data : {kabupaten : getkabupaten},
            success: function(data){
              let html = "";
              for(let i= 0; i < data.length; i++){
                html += `<option value="${data[i].id}"> ${data[i].kecamatan}</option>`
              }
              $('#id_kecamatan').html(html);
              $('#id_kecamatan').show();

            }
          })

        })
      }
  </script>
  <!-- Page Specific JS File -->
</body>
</html>