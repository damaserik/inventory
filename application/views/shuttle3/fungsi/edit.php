<br><br><br>
<div class="container">
	<h3>Form Fungsi</h3>
	<div class="card bg-ligh">
	  <div class="card-body">
			<?php foreach ($ubah_data as $key => $row): ?>			
        	<form method="POST" action="<?php echo site_url('shuttle3/fungsi/fungsi_edit/'.$row->id_fungsi)?>">
			<div class="form-row">
			    <div class="form-group col-md-4" required="" >
				    <label>ID</label>
				    <input type="text" class="form-control" name="id_fungsi" required=""autocomplete="off" value="<?php echo $row->id_fungsi?>" readonly="">
			    </div>
				</div>
			<div class="form-row">
			    <div class="form-group col-md-4">
				    <label>Fungsi</label>
					<input type="text" class="form-control" name="fungsi" onkeyup="this.value = this.value.toUpperCase()" required="" autofocus autocomplete="off"  value="<?php echo $row->fungsi?>">
					</select>
			    </div>	
			    <div class="form-group col-md-4" hidden="">
				    <label>Bagian</label>
				    <input type="text" class="form-control" name="id_bagian" value="Shtl2" autocomplete="off" >
			    </div>    		    
			</div>

			<br>
			  <button type="submit" class="btn btn-primary">Simpan</button>
			  <a href="<?php echo site_url('shuttle3/fungsi/view_fungsi');?>" class="btn btn-secondary" onclick="return confirm('Yakin Cancel ?')">Cancel</a>
			</form>
			<?php endforeach ?>
		</div>
	</div>
</div>
<br>
<script type="text/javascript">
	function getText(element) {
	  var textHolder = element.options[element.selectedIndex].text
	  document.getElementById("efungsi").value = textHolder;
	  }
</script>