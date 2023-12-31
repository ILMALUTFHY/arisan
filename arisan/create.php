<?php


session_start();


if(isset($_POST['submit'])){


   require '../config.php';
   $arisan = $db->arisan;


   $hasil = $arisan->insertOne([
       '_id' => $_POST['_id'],
       'nama_ars' => $_POST['nama_ars'],
       'jumlah_psrt' => $_POST['jumlah_psrt'],
       'total_strn' => $_POST['total_strn'],
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
         <strong>ID Arisan:</strong>
         <input type="text" name="_id" required="" class="form-control" placeholder="ID Arisan">
      </div>
      <div class="form-group">
         <strong>Nama Arisan:</strong>
         <select name="nama_ars" class="form-control" required="">
            <option selected>-- Pilih --</option>
            <option value="Harian">Harian</option>
            <option value="Mingguan">Mingguan</option>
            <option value="Bulanan">Bulanan</option>
            <option value="Tahunan">Tahunan</option>
         </select>
      </div>
      <div class="form-group">
         <strong>Jumlah Peserta:</strong>
         <textarea class="form-control" name="jumlah_psrt" placeholder="Jumlah Peserta"></textarea>
      </div>
      <div class="form-group">
         <strong>Total Setoran:</strong>
         <textarea class="form-control" name="total_strn" placeholder="Total Setoran"></textarea>
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-primary mt-3">Tambah</button>
          <a href="index.php" class="btn btn-danger mt-3">Kembali</a>
      </div>
   </form>
</div>
</body>
</html>