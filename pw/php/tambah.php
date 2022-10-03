<?php



require './functions.php';

if (isset($_POST['add'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
            alert('Data Upload Success');
            document.location.href = '../index.php';
        </script>";
    } else {
        echo "<script>
                alert('Data Upload Fail');
                document.location.href = 'tambah.php';
            </script>";
    }
}



?>


<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>



    <h3 class="center">Add data</h3>

    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="input-field">
                <input type="text" name="judul_buku" id="judul_buku" class="validate" required>
                <label for="judul_buku">Judul Buku</label>
            </div>
            <div class="input-field">
                <input type="text" name="penulis" id="penulis" class="validate" required>
                <label for="penulis">Penulis</label>
            </div>
            <div class="input-field">
                <input type="text" name="penerbit" id="penerbit" class="validate" required>
                <label for="penerbit">Penerbit</label>
            </div>
            <div class="input-field">
                <input type="text" name="tahun_terbit" id="tahun_terbit" class="validate" required>
                <label for="tahun_terbit">Tahun Terbit</label>
            </div>
            <div class="file-field input-field">
                <div class="btn">
                    <span>Choose Picture</span>
                    <input type="file" name="gambar" id="gambar" class="gambar" onchange="previewImage()">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" name="gambar" id="gambar" onchange="previewImage()">
                </div>
                <img src="img/nophoto.png" style="display: block;" width="120px" class="img-preview">
            </div>
            <button type="submit" name="add" class="waves-effect waves-light btn deep-purple darken-3">Submit Data</button>
            <a href="index.php" class="waves-effect waves-light btn deep-purple darken-3"><i class="material-icons left">arrow_back</i>Back</a>


        </form>



    </div>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="../js/materialize.min.js"></script>
</body>


</html>