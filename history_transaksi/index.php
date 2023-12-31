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
<nav class="navbar navbar-expand-lg navbar-dark bg-warning">
  <div class="container ">
    <a class="navbar-brand" href="#">Arisan Online</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="../anggota/index.php">Anggota</a>
        <a class="nav-link" href = "../arisan/index.php">Arisan</a>
        <a class="nav-link active" aria-current="page" href="index.php">Transaksi</a>
      </div>
    </div>
  </div>
</nav>
<!-- </div> -->

<div class="container mt-3">
<h2>Data Transaksi</h2>


<a href="create.php" class="btn btn-primary mb-2 mt-1">Tambah</a>


<?php


   if(isset($_SESSION['success'])){
      echo "<div class='alert alert-primary'>".$_SESSION['success']."</div>";
   }


?>

<div class="table-responsive">
   <table class="table table-striped table-hover">
      <tr>
            <th>Kode Transaksi</th>
            <th>Nama Anggota</th>
            <th>Alamat Anggota</th>
            <th>No Telepon</th>
            <th>Tanggal Transaksi</th>
            <th>Total Setoran</th>
            <th>Nama Arisan</th>
            <th>Action</th>
      </tr>
      <?php
         require '../config.php';
            $aggregate = [
                [
                    '$lookup' => [
                        'from' => 'anggota',
                        'localField' => 'anggota_id',
                        'foreignField' => '_id',
                        'as' => 'data'
                    ]
                ],
                [
                  '$lookup' => [
                      'from' => 'arisan',
                      'localField' => 'arisan_id',
                      'foreignField' => '_id',
                      'as' => 'arisan'
                  ]
                ],
            
                ['$unwind' => '$data'],
                ['$unwind' => '$arisan'],
                    
              ];
            $history_transaksi = $db->history_transaksi->aggregate($aggregate);

            foreach($history_transaksi as $tr) {
               echo "<tr>";
               
               echo "<td>".$tr->data->_id."</td>";
               echo "<td>".$tr->data->nama."</td>";
               echo "<td>".$tr->data->alamat."</td>";
               echo "<td>".$tr->data->no_telepon."</td>";
               echo "<td>".$tr->tanggal."</td>";
               echo "<td>".$tr->arisan->total_strn."</td>";
               echo "<td>".$tr->arisan->nama_ars."</td>";
               echo "<td>";
               echo "<a href='edit.php?id=".$tr->_id."' class='btn btn-primary'>Edit</a>";
               echo "<a href='delete.php?id=".$tr->_id."' class='btn btn-danger'>Hapus</a>";
               echo "</td>";
               echo "</tr>";
            };
      ?>
   </table>
</div>
</div>
</body>
</html>