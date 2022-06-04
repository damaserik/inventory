<br><br><br>
<div class="container">
	<h3>Form Barang</h3>
	<div class="card bg-light">
	  <div class="card-body">		
        	<form method="POST" action="<?php echo site_url('ajl/barang/barang_tambah/')?>">
			<div class="form-row">
			    <div class="form-group col-md-4">
				    <label>Kode Barang</label>
				    <input type="text" class="form-control" name="id_barang" onkeyup="this.value = this.value.toUpperCase()"autofocus autocomplete="off" required="">
			    </div>
			    <div class="form-group col-md-4">
				    <label>Nama Barang</label>
				    <input type="text" class="form-control" name="nama_barang" onkeyup="this.value = this.value.toUpperCase()"autocomplete="off" required="">
			    </div>			    
			    <div class="form-group col-md-4">
				    <label>Jenis</label>
				    <select class="form-control" name="id_jenis" onchange="getText(this)">
						<option selected>-- Jenis --</option>
						<option></option>
						<?php $s = 0; foreach ($get_jens->result_array() as $i) { $s++; ?>
							<option value="<?php echo $i['id_jenis'];?>"><?php echo $s;?> - <?php echo $i['jenis'];?></option>
						<?php } ?>
					</select>
			    </div>
			</div>
			<div class="form-row">	


			    <div class="form-group col-md-4">
				    <label>Fungsi</label>
				    <select class="form-control" name="id_fungsi" onchange="getText(this)">
						<option selected>-- Fungsi --</option>
						<option></option>
						<?php $s = 0; foreach ($get_fung->result_array() as $i) { $s++;?>
							<option value="<?php echo $i['id_fungsi'];?>"><?php echo $s;?> - <?php echo $i['fungsi'];?></option>
						<?php } ?>
					</select>
			    </div>
			    <div class="form-group col-md-4" hidden="">
				    <label>Bagian</label>
				    <input type="text" class="form-control" name="id_bagian" value="Ajl" autocomplete="off" >
			    </div>
			    <div class="form-group col-md-4">
				    <label>Status Barang</label>
				    <select name="status_barang" class="form-control">
	                    <option value="AJL">AJL</option>
	                    <option value="Barang Tehnik">Barang Tehnik</option>
	                    <option value="Pelumas">Pelumas</option>
	                    <option value="Rapier">Rapier</option>
                    </select>
			    </div>
			</div>
			<br>
			  <button type="submit" class="btn btn-primary">Simpan</button>
			  <a href="<?php echo site_url('ajl/barang/view_barang');?>" class="btn btn-secondary" onclick="return confirm('Yakin Cancel ?')">Cancel</a>
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