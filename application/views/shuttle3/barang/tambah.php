<br><br><br>
<div class="container">
	<h3>Form Barang</h3>
	<div class="card bg-light">
	  <div class="card-body">		
        	<form method="POST" action="<?php echo site_url('shuttle3/barang/barang_tambah/')?>">
			<div class="form-row">
			    <div class="form-group col-md-4">
				    <label>Kode Barang</label>
				    <input type="text" class="form-control" name="id_barang" onkeyup="this.value = this.value.toUpperCase()" required=""autofocus autocomplete="off">
			    </div>
			    <div class="form-group col-md-4">
				    <label>Nama Barang</label>
				    <input type="text" class="form-control" name="nama_barang" onkeyup="this.value = this.value.toUpperCase()" required="" autocomplete="off">
			    </div>
			</div>
			<div class="form-row">	
			    <div class="form-group col-md-4">
				    <label>Jenis</label>
				    <select class="form-control" name="id_jenis" onchange="getText(this)">
						<option selected>-- Jenis --</option>
						<option></option>
						<?php foreach ($get_jens->result_array() as $i) { ?>
							<option value="<?php echo $i['id_jenis'];?>"><?php echo $i['id_jenis'];?> - <?php echo $i['jenis'];?></option>
						<?php } ?>
					</select>
			    </div>

			    <div class="form-group col-md-4">
				    <label>Fungsi</label>
				    <select class="form-control" name="id_fungsi" onchange="getText(this)">
						<option selected>-- Fungsi --</option>
						<option></option>
						<?php foreach ($get_fung->result_array() as $i) { ?>
							<option value="<?php echo $i['id_fungsi'];?>"><?php echo $i['id_fungsi'];?> - <?php echo $i['fungsi'];?></option>
						<?php } ?>
					</select>
			    </div>
			    <div class="form-group col-md-4" hidden="">
				    <label>Bagian</label>
				    <input type="text" class="form-control" name="id_bagian" value="Shtl3" autocomplete="off" >
			    </div>
			</div>
			<br>
			  <button type="submit" class="btn btn-primary">Simpan</button>
			  <a href="<?php echo site_url('shuttle3/barang/view_barang');?>" class="btn btn-secondary" onclick="return confirm('Yakin Cancel ?')">Cancel</a>
			</form>
		</div>
	</div>
</div>
<br>
<script type="text/javascript">
	function getText(element) {
	  var textHolder = element.options[element.selectedIndex].text
	  document.getElementById("tbarang").value = textHolder;
	  }
</script>