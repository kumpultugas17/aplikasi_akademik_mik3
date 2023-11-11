<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Apps Akademik - Home</title>
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
                  <a class="nav-link" href="../nilai/index.php">Nilai</a>
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
            <div class="alert alert-primary py-2">DATA MAHASISWA</div>
            <div class="card">
               <div class="card-body">
                  <a href="tambah.php" class="btn btn-sm btn-primary mb-2 float-end">Tambah Data</a>
                  <table class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th>NO</th>
                           <th>NIM</th>
                           <th>NAMA</th>
                           <th>JK</th>
                           <th>JURUSAN</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        $conn = mysqli_connect('localhost', 'root', '', 'mik3_db_akademik');
                        $no = 1;
                        $query = $conn->query("SELECT * FROM mhs");
                        foreach ($query as $data) :
                        ?>
                           <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $data['nim'] ?></td>
                              <td><?= $data['nama'] ?></td>
                              <td><?= $data['jk'] ?></td>
                              <td><?= $data['jurusan'] ?></td>
                              <td>
                                 <a href="edit.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                 <a href="delete.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                              </td>
                           </tr>
                        <?php
                        endforeach
                        ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>

   <script src="../assets_bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>