<br><br><br><br>
<h5>Laporan Stok</h5>
<!-- <b style="font-size: 13px;"><?php echo indonesian_date($bulan)?> - <?php echo indonesian_date($tahun)?></b><p></p>  -->
<!-- <table class="table table-sm table-bordered" border="1" style="font-size: 12px; background-color: white;"> -->
<table id="myTable" class="table table-sm table-bordered" style="width:100%">
    <thead class="thead-dark">
	<tr>
		<th>ID BARANG</th>
		<th>NAMA BARANG</th>		
		<th>NB MASUK</th>
		<th>HARGA NB MASUK</th>
		<th>NB PAKAI</th>
		<th>HARGA NB PAKAI</th>
		<th>NB SISA</th>
		<th>HARGA NB SISA</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($isi as $row) { ?>		
	<tr>
		<td><?php echo $row->id_barang;?></td>
		<td><?php echo $row->nama_barang;?></td>
		<td><?php echo $row->NB_masuk;?></td>
		<td><?php echo number_format($row->Harga_NB_masuk,0,",",".")?></td>
		<td><?php echo $row->NB_pakai;?></td>
		<td><?php echo number_format($row->Harga_NB_pakai,0,",",".")?></td>
		<td><?php echo $row->sisa;?></td>
		<td><?php echo number_format($row->Harga_NB_sisa,0,",",".")?></td>
	</tr>
	<?php } ?>
	</tbody>
</table>
