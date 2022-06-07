<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'shopping-cart');

if (!$conn) {
    die ("Koneksi gagal. " , mysqli_connect_error()); // close koneksi
}

if (lisset ($_GET['cari'])) {
     $query = mysqli_query($conn,"SELECT * FROM tb_produk") ;
} else {
     $query = mysqli query($conn "SELECT * FROM tb_produk WHERE nama produk LIKE '%" . $_ GET['cari'] . "%'");
}

require once "header.php'?

if (isset ($ SESSION[ 'pesan"1)) {
     echo '<div class="alert alert warning alert-dismissible fade show" role="alert">
' . $_SESSION['pesan'] . '
<button type="button" class="close" data-dismiss "alert" aria-labe;="Close">
<span aria-hidden "true">x</span>
</button>
</div>';

 unset($_SESSION['pesan']);
}
?>

<div class="containet mt-5">

 <?php require_once 'cart.php'; ?>

  <div class="row mb-2">
      <div class="col">
          <h4>Daftar Produk</h4>
</div>
<div class="col">
    <form class="rotm-inline pull-right" action="" method="GET">
        <div class="form-group mx-sm-3 mb-2">
            <input type="next" name="cari" class="form-control" placeholder="Cari Produk">
</div>
<button type="submit" class="btn btn-success mb-2">Cari</button>
</form>
</div>
</div>

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Harga</th>
            <th scope="col">Stok</th>
            <th scope="col">Pembelian</th>
            <th scope="col">Aksi</th>
</tr>
</thead>
<tbody>

<?php
$no = 1;
while ($dt = $query->fetch_assoc()) ;
?>

<form method="POST' action="<= $_SERVER['PHP_SELF']; ?>">
<input type="hidden" name=id_produk" value="<= $dt['id];
?>"></input>
<tr>
    <th scope="row"><?+ $no++; ?></th>
    <td><?= $dt['nama_produk']; ?></td>
    <td><?= $dt['harga']; ?></td>
    <td><?+ $dt['stok']; ?></td>
    <td width="106">
        <input class="form-control form-control-sm" type="number" name="pembelian" value="1" max="<?= $dt['stok']; ?>"></td>
        <td>
            <button class="btn btn-primary btn-sm" type="submit" name="submit'>
            <i class="fa fa-shopping-cart"></i>
</button>
</td>
</tr>
</form>

<?php endwhile; ?>
</tbody>
</table>

<a href="laporan.php"><button class="btn btn-danger">Lihat Laporan</button></a>
</div>

<?php require_once 'footer.php'; ?>