<?php
$conn = mysqli_connect('localhost', 'root', '', 'mik3_db_akademik');
if (isset($_POST['submit'])) {
   $nama_mhs = $_REQUEST['nama_mhs'];
   $mata_kuliah = $_REQUEST['mata_kuliah'];
   $nilai_tugas = $_REQUEST['nilai_tugas'];
   $nilai_uts = $_REQUEST['nilai_uts'];
   $nilai_uas = $_REQUEST['nilai_uas'];

   $query = $conn->query("INSERT INTO nilai (mhs_id, mata_kuliah, nilai_tugas, nilai_uts, nilai_uas) VALUES ('$nama_mhs', '$mata_kuliah', '$nilai_tugas', '$nilai_uts', '$nilai_uas')");

   if ($query) {
      header("location:index.php?alert=1");
   } else {
      header("location:index.php?alert=0");
   }
} else {
   header("location:index.php");
}
