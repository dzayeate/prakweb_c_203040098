<body class="container bg-dark">

  <div class="bg-light p-5 rounded">
    <div class="row">
      <div class="col-6">
        <h3>Daftar Mahasiswa</h3>
        <?php foreach ($data['mhs'] as $mhs) : ?>
          <ul class="list-group text-dark">
            <li>
              <?= $mhs['nama']; ?>
            </li>
            <li>
              <?= $mhs['nrp']; ?>
            </li>
            <li>
              <?= $mhs['email']; ?>
            </li>
            <li>
              <?= $mhs['jurusan']; ?>
            </li>
          </ul>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</body>