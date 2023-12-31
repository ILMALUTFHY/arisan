<?php
   session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <title>Aplikasi Arisan Online</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<!-- <div class="container"> -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-warnig">
  <div class="container ">
    <a class="navbar-brand" href="#">Arisan Online</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Anggota</a>
        <a class="nav-link" href = "../arisan/index.php">Arisan</a>
        <a class="nav-link" href="../history_transaksi/index.php">Transaksi</a>
      </div>
    </div>
  </div>
</nav>
<!-- </div> -->

<div class="container mt-3">
<h2>Data Anggota</h2>


<a href="create.php" class="btn btn-primary mb-2 mt-1">Tambah</a>


<?php


   if(isset($_SESSION['success'])){
      echo "<div class='alert alert-primary'>".$_SESSION['success']."</div>";
   }


?>


<table class="table table-striped table-hover">
   <tr>
      <th>Id</th>
      <th>Nama Anggota</th>
      <th>Alamat</th>
      <th>No Telepon</th>
      <th>Action</th>
   </tr>
   <?php


      require '../config.php';

      $anggota = $db->anggota->find([]);

      foreach($anggota as $b) {
         echo "<tr>";
         echo "<td>".$b->_id."</td>";
         echo "<td>".$b->nama."</td>";
         echo "<td>".$b->alamat."</td>";
         echo "<td>".$b->no_telepon."</td>";
         echo "<td>";
         echo "<a href='edit.php?id=".$b->_id."' class='btn btn-primary'>Edit</a>";
         echo "<a href='delete.php?id=".$b->_id."' class='btn btn-danger'>Hapus</a>";
         echo "</td>";
         echo "</tr>";
      };


   ?>
</table>
</div>
</body>
</html>