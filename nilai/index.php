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
                  <a class="nav-link" href="../mahasiswa/index.php">Mahasiswa</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.php">Nilai</a>
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

                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary btn-sm float-end mb-3" data-bs-toggle="modal" data-bs-target="#tambah">
                     Tambah
                  </button>

                  <table class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th>NO</th>
                           <th>NIM</th>
                           <th>NAMA</th>
                           <th>MATA KULIAH</th>
                           <th>NILAI TUGAS</th>
                           <th>NILAI UTS</th>
                           <th>NILAI UAS</th>
                           <th>NILAI AKHIR</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        $conn = mysqli_connect('localhost', 'root', '', 'mik3_db_akademik');
                        $no = 1;
                        $query = $conn->query("SELECT * FROM nilai n INNER JOIN mhs m ON m.id = n.mhs_id ORDER BY id_nilai DESC");
                        foreach ($query as $data) :
                           $nilai_akhir = ($data['nilai_tugas'] * 0.2) + ($data['nilai_uts'] * 0.3) + ($data['nilai_uas'] * 0.5);
                        ?>
                           <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $data['nim'] ?></td>
                              <td><?= $data['nama'] ?></td>
                              <td><?= $data['mata_kuliah'] ?></td>
                              <td><?= $data['nilai_tugas'] ?></td>
                              <td><?= $data['nilai_uts'] ?></td>
                              <td><?= $data['nilai_uas'] ?></td>
                              <td><?= $nilai_akhir ?></td>
                              <td>
                                 <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $data['id_nilai'] ?>">Edit</button>
                                 <a href="delete.php?id=<?= $data['id_nilai'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin data akan dihapus?')">Hapus</a>
                              </td>
                           </tr>

                           <!-- Modal Edit -->
                           <div class="modal fade" id="edit<?= $data['id_nilai'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h1 class="modal-title fs-5" id="exampleModalLabel">EDIT DATA NILAI</h1>
                                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="act_edit.php" method="post">
                                       <input type="hidden" name="id_nilai" value="<?= $data['id_nilai'] ?>">
                                       <div class="modal-body">
                                          <div class="mb-2">
                                             <label for="nama_mhs" class="form-label">Nama Mahasiswa</label>
                                             <select name="nama_mhs" id="nama_mhs" class="form-select">
                                                <option disabled selected>Pilih Mahasiswa</option>
                                                <?php
                                                $query = $conn->query("SELECT * FROM mhs");
                                                foreach ($query as $mhs) :
                                                ?>
                                                   <option value="<?= $mhs['id'] ?>" <?= $mhs['id'] == $data['mhs_id'] ? 'selected' : '' ?>><?= $mhs['nama'] ?></option>
                                                <?php endforeach ?>
                                             </select>
                                          </div>
                                          <div class="mb-2">
                                             <label for="mata_kuliah" class="form-label">Mata Kuliah</label>
                                             <input type="text" id="mata_kuliah" name="mata_kuliah" class="form-control" value="<?= $data['mata_kuliah'] ?>">
                                          </div>
                                          <div class="mb-2">
                                             <label for="nilai_tugas" class="form-label">Nilai Tugas</label>
                                             <input type="number" id="nilai_tugas" name="nilai_tugas" class="form-control" value="<?= $data['nilai_tugas'] ?>">
                                          </div>
                                          <div class="mb-2">
                                             <label for="nilai_uts" class="form-label">Nilai UTS</label>
                                             <input type="number" id="nilai_uts" name="nilai_uts" class="form-control" value="<?= $data['nilai_uts'] ?>">
                                          </div>
                                          <div class="mb-2">
                                             <label for="nilai_uas" class="form-label">Nilai UAS</label>
                                             <input type="number" id="nilai_uas" name="nilai_uas" class="form-control" value="<?= $data['nilai_uas'] ?>">
                                          </div>
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>

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

<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">ADD DATA NILAI</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="act_tambah.php" method="post">
            <div class="modal-body">
               <div class="mb-2">
                  <label for="nama_mhs" class="form-label">Nama Mahasiswa</label>
                  <select name="nama_mhs" id="nama_mhs" class="form-select">
                     <option disabled selected>Pilih Mahasiswa</option>
                     <?php
                     $query = $conn->query("SELECT * FROM mhs");
                     foreach ($query as $mhs) :
                     ?>
                        <option value="<?= $mhs['id'] ?>"><?= $mhs['nama'] ?></option>
                     <?php endforeach ?>
                  </select>
               </div>
               <div class="mb-2">
                  <label for="mata_kuliah" class="form-label">Mata Kuliah</label>
                  <input type="text" id="mata_kuliah" name="mata_kuliah" class="form-control">
               </div>
               <div class="mb-2">
                  <label for="nilai_tugas" class="form-label">Nilai Tugas</label>
                  <input type="number" id="nilai_tugas" name="nilai_tugas" class="form-control">
               </div>
               <div class="mb-2">
                  <label for="nilai_uts" class="form-label">Nilai UTS</label>
                  <input type="number" id="nilai_uts" name="nilai_uts" class="form-control">
               </div>
               <div class="mb-2">
                  <label for="nilai_uas" class="form-label">Nilai UAS</label>
                  <input type="number" id="nilai_uas" name="nilai_uas" class="form-control">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>