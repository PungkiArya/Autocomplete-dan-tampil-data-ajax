<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP &amp; MySQLi</title>

    <!-- Bootstrap -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">

    </script>

    <nav class="navbar navbar-dark bg-primary">
      <a class="navbar-brand" href="index.php" style="color: #fff;">
      Starbhak Soft
      </a>
    </nav>

    <div class="container">
      <h2 align="center" style="margin: 30px;">CRUD Ajax No Loading</h2>

      <form class="form-data" id="form-data" method="post">
        <div class="row">
          <div class="col-sm-3">
            <div class="form-group">
              <label>Nama Siswa</label>
              <input type="hidden" name="id" id="id">
              <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" required="true">

              <p class="text-danger" id="err_nama_siswa"></p>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label>Jurusan</label>
              <select name="jurusan" id="jurusan" class="form-control" required="true">
                <option value=""></option>
                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                <option value="Teknik Komputer Dan Jaringan">Teknik Komputer Dan Jaringan</option>
                <option value="Multimedia">Multimedia</option>
                <option value="Broadcasting">Broadcasting</option>
                <option value="Teknik Elektronika Industri">Teknik Elektronika Industri</option>
              </select>
              <p class="text-danger" id="err_jurusan"></p>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label>Tanggal Masuk</label>
              <input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control" required="true">
              <p class="text-danger" id="err_tgl_masuk"></p>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label>Jenis Kelamin</label><br>
              <input type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="Laki-Laki" required="true"> Laki-Laki
              <input type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="Perempuan"> Perempuan
            </div>
            <p class="text-danger" id="err_jenis_kelamin"></p>
          </div>
        </div>

        <div class="form-group">
          <label>Alamat</label>
          <textarea name="alamat" id="alamat" class="form-control" required="true"></textarea>
          <p class="text-danger" id="err_alamat"></p>
        </div>

        <div class="form-group">
          <button type="button" name="simpan" id="simpan" class="btn btn-primary">
            <i class="fa fa-save"></i> Simpan
          </button>
        </div>
      </form>
      <hr>

      <div class="data"></div>

    </div>

    <div class="text-center">&copy; <?php echo date('Y'); ?> Copyright
      <a href="https://starbhak.com/"></a>
    </div>


<script type="text/javascript">
  $(document).ready(function(){
    $('.data').load("data.php");
    $("#simpan").click(function(){
      var data = $('.form-data').serialize();
      var jenis_kelamin1 = document.getElementById("jenis_kelamin1").value;
      var jenis_kelamin2 = document.getElementById("jenis_kelamin2").value;
      var nama_siswa = document.getElementById("nama_siswa").value;
      var tgl_masuk = document.getElementById("tgl_masuk").value;
      var alamat = document.getElementById("alamat").value;
      var jurusan = document.getElementById("jurusan").value;

      if (nama_siswa=="") {
        document.getElementById("err_nama_siswa").innerHTML = "Nama Siswa Harus Diisi";
      } else {
        document.getElementById("err_nama_siswa").innerHTML = "";
      }
      if (alamat=="") {
        document.getElementById("err_alamat").innerHTML = "Alamat Siswa Harus Diisi";
      }else {
        document.getElementById("err_alamat").innerHTML = "";
      }
      if (jurusan=="") {
        document.getElementById("err_jurusan").innerHTML = "Jurusan Siswa Harus Diisi";
      }else {
        document.getElementById("err_jurusan").innerHTML = "";
      }
      if (tgl_masuk="") {
        document.getElementById("err_tgl_masuk").innerHTML = "Tanggal Masuk Siswa Harus Diisi";
      }else {
        document.getElementById("err_tgl_masuk").innerHTML = "";
      }
      if (document.getElementById("jenis_kelamin1").checked==false && document.getElementById("jenis_kelamin2").checked==false) {
        document.getElementById("err_jenis_kelamin").innerHTML = "Jenis Kelamin Siswa Harus Dipilih";
      }else {
        document.getElementById("err_jenis_kelamin").innerHTML = "";
      }

      if (nama_siswa!="" && tgl_masuk!="" && alamat!="" && jurusan!="" && (document.getElementById("jenis_kelamin1").checked==true || document.getElementById("jenis_kelamin2").checked==true))
      {
        $.ajax({
            type: 'POST',
            url: "form_action.php",
            data: data,
            success: function() {
                $('.data').load("data.php");
                document.getElementById("id").value = "";
                document.getElementById("form-data").reset();
            }, error: function(response){
              console.log(response.responseText);
            }
          });
      }
  });
});
</script>
</body>
