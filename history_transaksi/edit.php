<?php


session_start();


require '../config.php';


if (isset($_GET['id'])) {
   $collection = $db->history_transaksi;
   $history_transaksi = $collection->findOne(['_id' => $_GET['id']]);
}


if(isset($_POST['submit'])){


   $collection->updateOne(
       ['_id' => $_GET['id']],
       ['$set' => ['anggota_id' => $_POST['anggota_id'], 'alamat' => $_POST['alamat'], 'tanggal' => $_POST['tanggal']]
   ]);


   $_SESSION['success'] = "Data berhasil di edit";
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
         <strong>Kode Transaksi:</strong>
         <input type="text" value="<?php echo $_GET['id']; ?>" class="form-control" readonly>
      </div>
      <div class="form-group">
         <strong>ID anggota:</strong>
         <input type="text" name="anggota_id" value="<?php echo $history_transaksi->anggota_id; ?>" required="" class="form-control" placeholder="ID Anggota">
      </div>
       <div class="form-group">
         <strong>Tanggal:</strong>
         <input type="date" name="tanggal" value="<?php echo $history_transaksi->tanggal; ?>" required="" class="form-control" placeholder="Tanggal Transaksi">
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-primary mt-3">Edit</button>
          <a href="index.php" class="btn btn-danger mt-3">Kembali</a>
      </div>
   </form>
</div>


</body>
</html>