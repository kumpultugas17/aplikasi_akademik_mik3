<?php
$conn = mysqli_connect('localhost', 'root', '', 'mik3_db_akademik');
if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $query = $conn->query("SELECT * FROM mhs WHERE id = '$id'");
   $result = mysqli_fetch_assoc($query);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Apps Akademik - Tambah</title>
   <link rel="stylesheet" href="../assets_bootstrap/css/bootstrap.min.css">
</head>

<body>
   <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow">
      <div class="container-fluid">
         <a class="navbar-brand" href="#">Apps</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.php">Mahasiswa</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Nilai</a>
               </li>
            </ul>
            <div class="d-flex">
               <a class="btn btn-sm btn-outline-light">Logout</a>
            </div>
         </div>
      </div>
   </nav>
   <div class="container">
      <div class="row mt-4">
         <div class="col-12">
            <div class="alert alert-primary py-2">TAMBAH MAHASISWA</div>
            <div class="card">
               <div class="card-body">
                  <form action="act_edit.php" method="post">
                     <input type="hidden" name="id" value="<?= $id ?>">
                     <div class="row mb-3">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                           <input type="text" name="nim" class="form-control" id="nim" value="<?= $result['nim'] ?>">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                           <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" value="<?= $result['nama'] ?>">
                        </div>
                     </div>
                     <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                        <div class="col-sm-10">
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="jk" id="laki" value="L" <?= $result['jk'] == "L" ? "checked" : "" ?>>
                              <label class="form-check-label" for="laki">
                                 Laki-laki
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="jk" id="perempuan" value="P" <?= $result['jk'] == "P" ? "checked" : "" ?>>
                              <label class="form-check-label" for="perempuan">
                                 Perempuan
                              </label>
                           </div>
                        </div>
                     </fieldset>
                     <div class="row mb-3">
                        <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                        <div class="col-sm-10">
                           <select name="jurusan" class="form-select" id="jurusan">
                              <option selected disabled>Pilih Jurusan</option>
                              <option value="MIK" <?= $result['jurusan'] == "MIK" ? "selected" : "" ?>>Manejemen Informatika Komputer</option>
                              <option value="AKP" <?= $result['jurusan'] == "AKP" ? "selected" : "" ?>>Akuntansi Komputer Perkantoran</option>
                              <option value="ADP" <?= $result['jurusan'] == "ADP" ? "selected" : "" ?>>Administrasi Perkantoran</option>
                           </select>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                           <button type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
                           <a href="index.php" class="btn btn-sm btn-secondary">Kembali</a>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>

   <script src="../assets_bootstrap/js/bootstrap.min.js"></script>
</body>

</html>