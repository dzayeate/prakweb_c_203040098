<body class="container bg-dark">

  <div class="bg-light p-5 rounded">
    <div class="row">
      <div class="col-6">
        <h3>Daftar Mahasiswa</h3>
        <?php foreach ($data['mhs'] as $mhs) : ?>
          <ul class="list-group text-dark">
            <li class="list-group-item list-group-item d-flex justify-content-between align-items-start">
              <?= $mhs['nama']; ?>
              <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge text-bg-dark float-right">Detail</a>
            </li>
          </ul>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</body>