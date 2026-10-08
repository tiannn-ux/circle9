<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
   <table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Jenis Gangguan IT</th>
      <th scope="col">Tingkat Prioritas</th>
      <th scope="col">Deskripsi Gangguan</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  
  <tbody>
    <?php
    include 'koneksi.php';

    $data = mysqli_query($koneksi, "SELECT * FROM gangguan");
    $no = 1;

    while ($baris = mysqli_fetch_array($data)) {
    ?>
      <tr>
        <th scope="row"><?php echo $no++; ?></th>
        <td><?php echo $baris['jenis_gangguan']; ?></td>
        <td><?php echo $baris['tingkat_prioritas']; ?></td>
        <td><?php echo $baris['deskripsi_gangguan']; ?></td>
        
        <td>
          <a href="hapus.php?id=<?php echo $baris['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
        </td> 
      </tr>
    <?php
    } 
    ?>
  </tbody>
</table>

</body>
</html>