<?php


session_start();


require '../config.php';


if (isset($_GET['id'])) {
   $collection = $db->arisan;
   $arisan = $collection->findOne(['_id' => $_GET['id']]);
}


if(isset($_POST['submit'])){


   $collection->updateOne(
       ['_id' => $_GET['id']],
       ['$set' => ['nama_ars' => $_POST['nama_ars'], 'jumlah_psrt' => $_POST['jumlah_psrt'], 'total_strn' => $_POST['total_strn']]
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
         <strong>ID Arisan:</strong>
         <input type="text" value="<?php echo $_GET['id']; ?>" class="form-control" readonly>
      </div>
      <div class="form-group">
         <strong>Nama Arisan:</strong>
         <select name="nama_ars" class="form-control" required="">
            <option value="Harian" <?php if($arisan->nama_ars === "Harian"){echo "selected";}?>>Harian</option>
            <option value="Mingguan" <?php if($arisan->nama_ars === "Mingguan"){echo "selected";}?>>Mingguan</option>
            <option value="Bulanan" <?php if($arisan->nama_ars === "Bulanan"){echo "selected";}?>>Bulanan</option>
            <option value="Tahunan" <?php if($arisan->nama_ars === "Tahunan"){echo "selected";}?>>Tahunan</option>
         </select>
      </div>
      <div class="form-group">
         <strong>Jumlah Peserta:</strong>
         <input type="text" name="jumlah_psrt" value="<?php echo $arisan->jumlah_psrt; ?>" required="" class="form-control" placeholder="Jumlah Arisan">
      </div>
      <div class="form-group">
         <strong>Total Setoran:</strong>
         <textarea class="form-control" name="total_strn" placeholder="Total Setoran"><?php echo $arisan->total_strn; ?></textarea>
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-primary mt-3">Edit</button>
          <a href="index.php" class="btn btn-danger mt-3">Kembali</a>
      </div>
   </form>
</div>


</body>
</html>