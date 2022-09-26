<?php
//koneksi
require 'function.php';

$buku = query("SELECT * FROM buku");

//ketika tombol cari di klik
if (isset($_POST['cari'])) {
  $buku = cari($_POST['keyword']);
}


?>

<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar buku</title>
</head>

<body>

  <div class="container">
    <h2>Daftar buku</h2>
    <form action="" method="POST">
      <input type="text" name="keyword" size="30" placeholder="Masukkan Keywoard Pencarian.." autocomplete="off" autofocus>
      <button type="submit" name="cari" class="btn teal darken-1">Cari!</button>
    </form>
    <br>
    <table class="centered">
      <thead>
        <tr>
          <th>No</th>
          <th>Gambar</th>
          <th>Judul buku</th>
          <th>Penulis</th>
          <th>Penerbit</th>
          <th>Tahun Terbit</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <?php $i = 1;
      foreach ($buku as $b) : ?>
        <tbody>

          <tr>

            <td><?= $i++; ?></td>
            <td> <img src="img/<?= $b["gambar"] ?>" width="100"></td>
            <td><?= $b["judul_buku"]  ?></td>
            <td><?= $b["penulis"]  ?></td>
            <td><?= $b["penerbit"]  ?></td>
            <td><?= $b["tahun_terbit"]  ?></td>
            <td>
              <a href="ubah.php?id=<?= $b['id_buku'] ?>" class="waves-effect waves-light btn pink lighten-1 center"><i class="material-icons left">create</i>Change</a>
              <a href="hapus.php?id=<?= $b['id_buku'] ?>" onclick="return confirm('Delete the data?')" class="waves-effect waves-light btn indigo lighten-2"><i class="material-icons left">delete</i>Delete</a>

            </td>
          </tr>

        </tbody>


      <?php endforeach; ?>
    </table>

    <div class="button center">
      <a href="tambah.php" class="waves-effect waves-light btn indigo darken-3 "><i class="material-icons left">add</i>Add data</a>
    </div>
  </div>

  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>