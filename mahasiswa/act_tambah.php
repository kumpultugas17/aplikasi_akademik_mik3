<?php
$conn = mysqli_connect('localhost', 'root', '', 'mik3_db_akademik');
if (isset($_POST['submit'])) {
   $nim = $_REQUEST['nim'];
   $nama_lengkap = $_REQUEST['nama_lengkap'];
   $jk = $_REQUEST['jk'];
   $jurusan = $_REQUEST['jurusan'];

   $query = $conn->query("INSERT INTO mhs (nim, nama, jk, jurusan) VALUES ('$nim', '$nama_lengkap', '$jk', '$jurusan')");

   if ($query) {
      header("location:index.php?alert=1");
   } else {
      header("location:index.php?alert=0");
   }
} else {
   header("location:index.php");
}
