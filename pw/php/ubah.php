<!-- 
    NAMA : Agam Ramdhan Kamil Atmaja
    NPM : 203040098
    Kelas : C
    Github : https://github.com/dzayeate
    MataKuliah : Praktikum Web
 -->

<?php

require 'functions.php';

$id_buku = $_GET['id'];
$book = query("SELECT * FROM buku WHERE id_buku =$id_buku")[0];

if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
            alert('Data Change Success');
            document.location.href = '../index.php';
        </script>";
    } else {
        echo "<script>
                alert('Data Change Fail');
                document.location.href = '../index.php';
            </script>";
    }
}



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
    <!--Import style.css-->
    <link rel="stylesheet" href="../css/style.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <h3 class="center">Change Buku</h3>

    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" id="id_buku" name="id_buku" value="<?= $book['id_buku']; ?>">
            <div class="input-field">
                <input type="text" name="judul_buku" id="judul_buku" class="validate" required value="<?= $book['judul_buku']; ?>">
                <label for="judul_buku">judul_buku</label>
            </div>
            <div class="input-field">
                <input type="text" name="penerbit" id="penerbit" class="validate" required value="<?= $book['penerbit']; ?>">
                <label for="penerbit">Penerbit</label>
            </div>
            <div class="input-field">
                <input type="text" name="pengarang" id="pengarang" class="validate" required value="<?= $book['pengarang']; ?>">
                <label for="pengarang">Pengarang</label>
            </div>
            <div class="file-field input-field">
                <input type="hidden" name="gambar_lama" value="<?= $book['gambar'] ?>">
                <div class="btn">
                    <span>Choose Picture</span>
                    <input type="file" name="gambar" id="gambar" class="gambar" onchange="previewImage()">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" name="gambar" id="gambar" value="<?= $book['gambar']; ?>">
                </div>
                <img src="../assets/img/" <?= $book['gambar'] ?>" style="display: block;" width="120px" class="img-preview">
            </div>
            <button type="submit" name="ubah" class="waves-effect waves-light btn blue lighten-3">Change Data</button>
            <a href="../index.php" class="waves-effect waves-light btn blue lighten-3"><i class="material-icons left">arrow_back</i>Back</a>


        </form>



    </div>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script src="javascript/scriptphoto.js"></script>
</body>

</html>