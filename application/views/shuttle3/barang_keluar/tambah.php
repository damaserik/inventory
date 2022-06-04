<?php
date_default_timezone_set("Asia/Bangkok");
?>
<br><br><br>
<div class="container">
	<h3>Form Transaksi Keluar</h3>
	<div class="card bg-light">
	  <div class="card-body">		
        	<form method="POST" action="<?php echo site_url('shuttle3/barang_keluar/barang_keluar_tambah/')?>">
			<div class="form-row">
			    <div class="form-group col-md-4">
				    <label>Kode Transaksi</label>
				    <!-- <input type="text" class="form-control" name="id_transaksi" autofocus > -->
				    <input type="text" name="id_transaksi" value="<?php echo $kode ?>" hidden>
                    <input type="text" disabled class="form-control" value="<?php echo $kode?>">
			    </div>
			    <div class="form-group col-md-4">
				    <label>Tanggal</label>
				    <input type="date" class="form-control" name="tgl_keluar" value="<?php echo date('Y-m-d')?>">
			    </div>
			    <div class="form-group col-md-4">
				    <label>Barang</label>
				    <input id="autocomplete" class="autocomplete form-control" name="nama_barang" type="text" placeholder="" required="">
			    </div>			    
			</div>
			<div class="form-row">	
				<div class="form-group col-md-4">
				    <label>ID Barang</label>
				    <input name="id_barang" id="a" class="autocomplete form-control" type="text" readonly="">
			    </div>
				<div class="form-group col-md-4">
				    <label>Stok Tersedia</label>
				    <input name="stok" id="b" class="autocomplete form-control" type="text" readonly="">
			    </div>
			    <div class="form-group col-md-4">
				    <label>Barang Keluar</label>
				    <input type="text" class="form-control" name="stok_keluar" >
			    </div>
			    <div class="form-group col-md-4">
				    <label>Harga</label>
				    <input name="harga" id="c" class="autocomplete form-control" type="text" readonly="">
			    </div>
			    <div class="form-group col-md-4" hidden="">
				    <label>Total Harga</label>
				    <input type="text" class="form-control" name="total_harga_keluar" readonly="">
			    </div>
			    <div class="form-group col-md-4">
				    <label>Id Trans Msk</label>
				    <input name="id_trans_msk" id="d" class="autocomplete form-control" type="text" readonly="">
			    </div>
			</div>
			<hr>

			<div class="form-row" >
			    <div class="form-group col-md-4">
				    <label>Mesin</label>
				    <select class="form-control" name="id_mesin" onchange="getText(this)">
						<option selected>-- Pilih Mesin --</option>
						<option></option>
						<?php foreach ($get_msn->result_array() as $i) { ?>
							<option value="<?php echo $i['id_mesin'];?>"><?php echo $i['id_mesin'];?> - <?php echo $i['zona'];?></option>
						<?php } ?>
					</select>
			    </div>
			    <div class="form-group col-md-4">
				    <label>Kagrup</label>				    
				    <select class="form-control" name="id_kagrup" onchange="getText(this)">
						<option selected>-- Pilih Kagrup --</option>
						<option></option>
						<?php foreach ($get_kg->result_array() as $i) { ?>
							<option value="<?php echo $i['id_kagrup'];?>"><?php echo $i['id_kagrup'];?> - <?php echo $i['nama_kagrup'];?></option>
						<?php } ?>
					</select>
			    </div>
				<div class="form-group col-md-4">
				    <label>Mtc</label>				    
				    <select class="form-control" name="id_mtc" onchange="getText(this)">
						<option selected>-- Pilih Mtc --</option>
						<option></option>
						<?php foreach ($get_mt->result_array() as $i) { ?>
							<option value="<?php echo $i['id_mtc'];?>"><?php echo $i['id_mtc'];?> - <?php echo $i['nama_mtc'];?></option>
						<?php } ?>
					</select>
			    </div>
			    <div class="form-group col-md-4" hidden="">
				    <label>Bagian</label>
				    <input type="text" class="form-control" name="id_bagian" value="Shtl3"  >
			    </div>
			</div>
			<br>
			  <button type="submit" class="btn btn-primary">Simpan</button>
			  <a href="<?php echo site_url('shuttle3/barang_keluar/view_barang_keluar');?>" class="btn btn-secondary" onclick="return confirm('Yakin Cancel ?')">Cancel</a>
			</form>
		</div>
	</div>
</div>
<br>
<script type="text/javascript">
	function getText(element) {
	  var textHolder = element.options[element.selectedIndex].text
	  document.getElementById("tkeluar").value = textHolder;
	  }


</script>