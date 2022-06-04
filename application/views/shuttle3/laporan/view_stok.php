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
		<th>NB PAKAI</th>
		<th>NB SISA</th>
	</tr>
	</thead>
	<tbody>
	<?php 
		// $tot_masuk=0;
		// $tot_pakai=0;
		// $tot_sisa=0;
				foreach ($isi as $row) { ?>		
				<tr>
					<td><?php echo $row->id_barang;?></td>
					<td><?php echo $row->nama_barang;?></td>
					<td><?php echo $row->NB_masuk;?></td>
					<td><?php echo $row->NB_pakai;?></td>
					<td><?php echo $row->sisa;?></td>
				</tr>
				<?php 
				// $tot_masuk+=$row->NB_masuk;
				// $tot_pakai+=$row->NB_pakai;
				// $tot_sisa+=$row->sisa;
	} ?>

<!-- 				<tr style="font-weight: bold">
					<td colspan="2">Jumlah</td> 
					<td><?php echo $tot_masuk;?></td>
					<td><?php echo $tot_pakai;?></td>
					<td><?php echo $tot_sisa;?></td>
				</tr> -->
	</tbody>
</table>
