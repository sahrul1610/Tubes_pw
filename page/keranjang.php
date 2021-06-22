<?php
if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
	echo "<script>alert('Data Keranjang Tidak Ada');</script>";
	echo "<script>location='?page=dashboard';</script>";
}
?>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<i class="fa fa-shopping-cart"></i> Keranjang Belanja |
				<a href="?page=home">Lanjutkan Belanja</a>
			</div>
			<div class="card-body">
				<table class="table">
					<thead class="thead-dark">
						<tr>
							<th scope="col" class="text-center">No.</th>
							<th scope="col">Judul Buku</th>
							<th scope="col" class="text-center">Harga</th>
							<th scope="col" class="text-center">QTY</th>
							<th scope="col" class="text-center">Total</th>
							<th scope="col" class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 0; ?>
						<?php $totalbelanja = 0; ?>
						<?php foreach ($_SESSION["keranjang"] as $id_buku => $jumlah): ?>
							<?php
							$ambil = $con_object->query("SELECT * FROM buku WHERE id_buku = '$id_buku'");
							$pecah = $ambil->fetch_assoc();

							$subharga = $pecah["harga"] * $jumlah;
							?>
							<tr>
								<td style="text-align: center;"><?php echo ++$no; ?>.</td>
								<td><?php echo $pecah['judul']; ?></td>
								<td style="text-align: center;">Rp. <?php echo number_format($pecah['harga']); ?></td>
								<td style="text-align: center;">
									<?php echo $jumlah; ?>
								</td>
								<td style="text-align: center;">Rp. <?php echo number_format($subharga); ?></td>
								<td style="text-align: center;">
									<a onclick="return confirm('Yakin ? Anda Ingin Menghapus ?')" href="?page=hapus_keranjang&id_buku=<?php echo $id_buku; ?>" class="btn btn-danger btn-sm">
										<i class="fa fa-trash-o"></i> Hapus
									</a>
								</td>
							</tr>
							<?php $totalbelanja+=$subharga; ?>
						<?php endforeach ?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="6" class="text-center">
								<b>Total Belanja : Rp. <?php echo number_format($totalbelanja); ?></b>
							</td>
						</tr>
					</tfoot>
				</table>
				<a href="?page=checkout" class="btn btn-danger">Checkout</a>
			</div>
		</div>
	</div>
</div>