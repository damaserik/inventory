<br><br><br>
<div class="container">
	<h3>Form Kagrup</h3>
	<div class="card bg-light">
	  <div class="card-body">		
        	<form method="POST" action="<?php echo site_url('shuttle3/kagrup/kagrup_tambah/')?>">
			<div class="form-row">
			    <div class="form-group col-md-4" required="">
				    <label>ID Kagrup</label>
				    <input type="text" class="form-control" name="id_kagrup" onkeyup="this.value = this.value.toUpperCase()" required="" autofocus autocomplete="off">
			    </div>
			    <div class="form-group col-md-4" required="">
				    <label>Nama</label>
				    <input type="text" class="form-control" name="nama_kagrup" onkeyup="this.value = this.value.toUpperCase()" required="" autocomplete="off" >
			    </div>
			    <div class="form-group col-md-4" hidden="">
				    <label>Bagian</label>
				    <input type="text" class="form-control" name="id_bagian" value="Shtl3" autocomplete="off" >
			    </div>
			</div>
			<br>
			  <button type="submit" class="btn btn-primary">Simpan</button>
			  <a href="<?php echo site_url('shuttle3/kagrup/view_kagrup');?>" class="btn btn-secondary" onclick="return confirm('Yakin Cancel ?')">Cancel</a>
			</form>
		</div>
	</div>
</div>
<br>
<script type="text/javascript">
	function getText(element) {
	  var textHolder = element.options[element.selectedIndex].text
	  document.getElementById("tkagrup").value = textHolder;
	  }
</script>