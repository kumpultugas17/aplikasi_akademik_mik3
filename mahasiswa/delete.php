<?php
$conn = mysqli_connect('localhost', 'root', '', 'mik3_db_akademik');
if (isset($_GET['id'])) {
   $id = $_GET['id'];

   $query = $conn->query("DELETE FROM mhs WHERE id = '$id'");

   if ($query) {
      header("location:index.php?alert=1");
   } else {
      header("location:index.php?alert=0");
   }
} else {
   header("location:index.php");
}
