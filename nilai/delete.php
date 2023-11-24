<?php
$conn = mysqli_connect('localhost', 'root', '', 'mik3_db_akademik');
if (isset($_GET['id'])) {
   $id = $_GET['id'];

   $query = $conn->query("DELETE FROM nilai WHERE id_nilai = '$id'");

   if ($query) {
      echo "<script>
         alert('Data berhasil dihapus!'); 
         window.location.href='index.php';
      </script>";
   } else {
      echo "<script>
         alert('Data gagal dihapus!'); 
         window.location.href='index.php';
      </script>";
   }
} else {
   header("location:index.php");
}
