<?php


session_start();


if(isset($_POST['submit'])){


   require '../config.php';
   $history_transaksi = $db->history_transaksi;


   $hasil = $history_transaksi->insertOne([
      '_id' => $_POST['_id'],
       'anggota_id' => $_POST['anggota_id'],
       'tanggal' => $_POST['tanggal'],
       
   ]);


   $_SESSION['success'] = "Data berhasil di tambah";
   header("Location: index.php");
}


?>


<!DOCTYPE html>
<html>
<head>
   <title>Aplikasi AnMart</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>


<div class="container mt-3">
   <form method="POST">
      <div class="form-group">
         <strong>Id Transaksi:</strong>
         <input type="text" name="_id" required="" class="form-control" placeholder="Id Transaksi">
      </div>
      <div class="form-group">
         <strong>ID Anggota:</strong>
         <input type="text" name="anggota_id" required="" class="form-control" placeholder="ID Anggota">
      </div>
      <div class="form-group">
         <strong>Tanggal Transaksi:</strong>
         <input type="text" name="tanggal" required="" class="form-control" placeholder="Tanggal Transaksi">
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-primary mt-3">Tambah</button>
          <a href="index.php" class="btn btn-danger mt-3">Kembali</a>
      </div>
   </form>
</div>


</body>
</html>