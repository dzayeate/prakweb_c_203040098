<!-- 
    NAMA : Agam Ramdhan Kamil Atmaja
    NPM : 203040098
    Kelas : C
    Github : https://github.com/dzayeate
    MataKuliah : Praktikum Web
 -->

<?php
//koneksi
require './php/functions.php';

//isi tabel
$buku = query('SELECT * FROM buku');

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
  <!--Import style.css-->
  <link rel="stylesheet" href="css/style.css">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>

  <div class="container">

    <h2 class="center">DAFTAR BUKU NOVEL</h2>
    <form action="" method="POST">
      <input type="text" name="keyword" size="30" placeholder="Masukkan Keywoard Pencarian.." autocomplete="off" autofocus>
      <button type="submit" name="cari" class="btn teal darken-1">Cari!</button>
    </form>
    <br>

    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Gambar</th>
          <th>judul_buku</th>
          <th>Pengarang</th>
          <th>Penerbit</th>
          <th>Tanggal Rilis</th>
          <th class="center">Opsi</th>
        </tr>
      </thead>
      <?php $i = 1;
      foreach ($buku as $book) : ?>
        <tbody>

          <tr>

            <td><?= $book["id_buku"]  ?></td>
            <td> <img src="/pw/assets/img/ <?= $book["gambar"] ?>" width="100"></td>
            <td><?= $book["judul_buku"]  ?></td>
            <td><?= $book["pengarang"]  ?></td>
            <td><?= $book["penerbit"]  ?></td>
            <td><?= $book["tahun_terbit"]  ?></td>
            <td>
              <a href="php/ubah.php?id=<?= $book['id_buku'] ?>" class="waves-effect waves-light btn pink lighten-1 center"><i class="material-icons left">create</i>Change</a>
              <a href="php/hapus.php?id=<?= $book['id_buku'] ?>" onclick="return confirm('Delete the data?')" class="waves-effect waves-light btn indigo lighten-2"><i class="material-icons left">delete</i>Delete</a>


            </td>
          </tr>

        </tbody>
      <?php endforeach; ?>
    </table>

    <div class="button center">
      <a href="php/tambah.php" class="waves-effect waves-light btn blue lighten-3 "><i class="material-icons left">add</i>Add data</a>
    </div>

  </div>



  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>