<div class="row">
	<?php $query = $con_object->query("SELECT * FROM buku") ?>
	<?php foreach ($query as $data) : ?>
	<div class="col-md-4 mb-4">
		<div class="card">
			<img class="card-img-top" src="admin/pages/produk/gambar/<?php echo $data['gambar'] ?>" alt="Card image cap" style="width: 100%; height: 300px;">
			<div class="card-body">
				<h5 class="card-title"><?php echo $data['judul'] ?></h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				<a href="#" class="btn btn-primary"><i class="fa fa-search"></i> Detail</a>
				<a href="?page=beli&id_buku=<?php echo $data['id_buku'] ?>" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Beli</a>
			</div>
		</div>
	</div>
	<?php endforeach ?>
</div>

