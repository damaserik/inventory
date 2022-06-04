<br><br><br>
<div class="container">
	<h3>Form Barang</h3>
	<div class="card bg-ligh">
	  <div class="card-body">
			<?php foreach ($ubah_data as $key => $row): ?>			
        	<form method="POST" action="<?php echo site_url('ajl/barang/barang_edit/'.$row->id_barang)?>">
			<div class="form-row">
			    <div class="form-group col-md-4">
				    <label>Kode Barang</label>
				    <input type="text" class="form-control" name="id_barang" autofocus autocomplete="off" readonly="" value="<?php echo $row->id_barang?>">
			    </div>
			    <div class="form-group col-md-4">
				    <label>Nama Barang</label>
				    <input type="text" class="form-control" name="nama_barang"  onkeyup="this.value = this.value.toUpperCase()" required="" autocomplete="off" value="<?php echo $row->nama_barang?>">
			    </div> 
			    <div class="form-group col-md-4">
				    <label>Jenis</label>
 				    <select class="form-control" name="id_jenis" onchange="getText(this)" >
					    <option value="">-- Jenis --</option>
						<option selected value="<?php echo $row->id_jenis?>"><?php echo $row->jenis?></option>
						<option></option>
						<?php foreach ($get_jens->result_array() as $i) { ?>
							<option value="<?php echo $i['id_jenis'];?>"><?php echo $i['jenis'];?></option>
						<?php } ?>
					</select>
			    </div>
			</div>
			<div class="form-row">
			    
			    <div class="form-group col-md-4">
				    <label>Fungsi</label>
 				    <select class="form-control" name="id_fungsi" onchange="getText(this)" >
					    <option value="">-- Fungsi --</option>
						<option selected value="<?php echo $row->id_fungsi?>"><?php echo $row->fungsi?></option>
						<option></option>
						<?php foreach ($get_fung->result_array() as $x) { ?>
							<option value="<?php echo $x['id_fungsi'];?>"><?php echo $x['fungsi'];?></option>
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
	    				<option selected value="<?php echo $row->status_barang?>"><?php echo $row->status_barang?></option>
	                    <option></option>
	                    <option value="AJL">AJL</option>
	                    <option value="BARANG TEHNIK">BARANG TEHNIK</option>
	                    <option value="PELUMAS">PELUMAS</option>
	                    <option value="RAPIER">RAPIER</option>
                    </select>
			    </div>
			</div>

			<br>
			  <button type="submit" class="btn btn-primary">Simpan</button>
			  <a href="<?php echo site_url('ajl/barang/view_barang');?>" class="btn btn-secondary" onclick="return confirm('Yakin Cancel ?')">Cancel</a>
			</form>
			<?php endforeach ?>
		</div>
	</div>
</div>
<br>
<script type="text/javascript">
	function getText(element) {
	  var textHolder = element.options[element.selectedIndex].text
	  document.getElementById("ebarang").value = textHolder;
	  }
</script>