<?php
$conn = mysqli_connect('localhost', 'root', '', 'mik3_db_akademik');
if (isset($_POST['submit'])) {
   $id = $_REQUEST['id'];
   $nim = $_REQUEST['nim'];
   $nama_lengkap = $_REQUEST['nama_lengkap'];
   $jk = $_REQUEST['jk'];
   $jurusan = $_REQUEST['jurusan'];

   $query = $conn->query("UPDATE mhs SET nim='$nim', nama= '$nama_lengkap', jk='$jk', jurusan='$jurusan' WHERE id = '$id'");

   if ($query) {
      header("location:index.php?alert=1");
   } else {
      header("location:index.php?alert=0");
   }
} else {
   header("location:index.php");
}
