<?php
$conn = mysqli_connect('localhost', 'root', '', 'mik3_db_akademik');
if (isset($_POST['submit'])) {
   $id_nilai = $_REQUEST['id_nilai'];
   $nama_mhs = $_REQUEST['nama_mhs'];
   $mata_kuliah = $_REQUEST['mata_kuliah'];
   $nilai_tugas = $_REQUEST['nilai_tugas'];
   $nilai_uts = $_REQUEST['nilai_uts'];
   $nilai_uas = $_REQUEST['nilai_uas'];

   $query = $conn->query("UPDATE nilai SET mhs_id = '$nama_mhs', mata_kuliah = '$mata_kuliah', nilai_tugas = '$nilai_tugas', nilai_uts = '$nilai_uts', nilai_uas = '$nilai_uas' WHERE id_nilai = '$id_nilai'");

   if ($query) {
      echo "<script>
         alert('Data berhasil diupdate!'); 
         window.location.href='index.php';
      </script>";
   } else {
      echo "<script>
         alert('Data gagal diupdate!'); 
         window.location.href='index.php';
      </script>";
   }
} else {
   header("location:index.php");
}
