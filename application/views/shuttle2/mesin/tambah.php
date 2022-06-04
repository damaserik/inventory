<br><br><br>
<div class="container">
	<h3>Form Mesin</h3>
	<div class="card bg-light">
	  <div class="card-body">		
        	<form method="POST" action="<?php echo site_url('shuttle2/mesin/mesin_tambah/')?>">
			<div class="form-row">
			    <div class="form-group col-md-4" required="">
				    <label>Mesin</label>
				    <input type="text" class="form-control" name="id_mesin" onkeyup="this.value = this.value.toUpperCase()" required=""autofocus autocomplete="off">
			    </div>
			</div>
			<div class="form-row">
			    <div class="form-group col-md-4" required="">
				    <label>Zona</label>
				    <input type="text" class="form-control" name="zona" required=""autocomplete="off" >
			    </div>
			    <div class="form-group col-md-4" hidden="">
				    <label>Bagian</label>
				    <input type="text" class="form-control" name="id_bagian" value="Shtl2" autocomplete="off" >
			    </div>
			</div>
			<br>
			  <button type="submit" class="btn btn-primary">Simpan</button>
			  <a href="<?php echo site_url('shuttle2/mesin/view_mesin');?>" class="btn btn-secondary" onclick="return confirm('Yakin Cancel ?')">Cancel</a>
			</form>
		</div>
	</div>
</div>
<br>
<script type="text/javascript">
	function getText(element) {
	  var textHolder = element.options[element.selectedIndex].text
	  document.getElementById("tmesin").value = textHolder;
	  }
</script>