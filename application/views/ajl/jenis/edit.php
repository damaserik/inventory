<br><br><br>
<div class="container">
	<h3>Form Jenis</h3>
	<div class="card bg-ligh">
	  <div class="card-body">
			<?php foreach ($ubah_data as $key => $row): ?>			
        	<form method="POST" action="<?php echo site_url('ajl/jenis/jenis_edit/'.$row->id_jenis)?>">
			<div class="form-row">
			    <div class="form-group col-md-4" required="" >
				    <label>ID</label>
				    <input type="text" class="form-control" name="id_jenis" autocomplete="off" value="<?php echo $row->id_jenis?>" readonly="">
			    </div>
				</div>
			<div class="form-row">
			    <div class="form-group col-md-4">
				    <label>Jenis</label>
					<input type="text" class="form-control" name="jenis" onkeyup="this.value = this.value.toUpperCase()" required="" autofocus autocomplete="off"  value="<?php echo $row->jenis?>">
					</select>
			    </div>	
			    <div class="form-group col-md-4" hidden="">
				    <label>Bagian</label>
				    <input type="text" class="form-control" name="id_bagian" value="Ajl" autocomplete="off" >
			    </div>    		    
			</div>

			<br>
			  <button type="submit" class="btn btn-primary">Simpan</button>
			  <a href="<?php echo site_url('ajl/jenis/view_jenis');?>" class="btn btn-secondary" onclick="return confirm('Yakin Cancel ?')">Cancel</a>
			</form>
			<?php endforeach ?>
		</div>
	</div>
</div>
<br>
<script type="text/javascript">
	function getText(element) {
	  var textHolder = element.options[element.selectedIndex].text
	  document.getElementById("ejenis").value = textHolder;
	  }
</script>