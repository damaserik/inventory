<br><br><br><br>
<h5>Laporan Pemakaian</h5>
<!-- <b style="font-size: 13px;"><?php echo indonesian_date($bulan)?> - <?php echo indonesian_date($tahun)?></b><p></p>  -->
<!-- <table class="table table-sm table-bordered" border="1" style="font-size: 12px; background-color: white;"> -->
 <table id="myTable" class="table table-sm table-bordered" style="width:100%">
    <thead class="thead-dark">
	<tr>
		<th>ZONA</th>
		<th>MTC</th>
		<th>MC</th>
		<th>TANGGAL KELUAR</th>
		<th>NAMA BARANG</th>
		<th>JUMLAH PAKAI</th>
		<th>BIAYA</th>
	</tr>
	</thead>
	<tbody>
	<?php 
		// $tot_masuk=0;
		// $tot_pakai=0;
		// $tot_sisa=0;
				foreach ($isi as $row) { ?>		
				<tr>
					<td><?php echo $row->zona;?></td>
					<td width="18%"><?php echo $row->mtc;?></td>
					<td width="10%"><?php echo $row->mc;?></td>
					<td><?php echo $row->tanggal;?></td>
					<td width="27%"><?php echo $row->nama_barang;?></td>
					<td align="right" width="12%"><?php echo $row->jumlah_pakai;?></td>
					<td align="right"><?php echo number_format($row->biaya,0,",",".");?></td>
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
