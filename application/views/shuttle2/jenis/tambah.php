<br><br><br>
<div class="container">
	<h3>Form Jenis</h3>
	<div class="card bg-light">
	  <div class="card-body">		
        	<form method="POST" action="<?php echo site_url('shuttle2/jenis/jenis_tambah/')?>">
<!-- 			<div class="form-row">
			    <div class="form-group col-md-4" required="">
				    <label>ID</label>
				    <input type="text" class="form-control" name="id_jenis" autofocus autocomplete="off" hidden="">
			    </div>
			</div>
 -->			<div class="form-row">	
			    <div class="form-group col-md-4" required="">
				    <label>Jenis</label>
 					<input type="text" class="form-control" name="jenis" onkeyup="this.value = this.value.toUpperCase()" required="" autofocus autocomplete="off">
			    </div>
			    <div class="form-group col-md-4" hidden="">
				    <label>Bagian</label>
				    <input type="text" class="form-control" name="id_bagian" onkeyup="this.value = this.value.toUpperCase()" required="" value="Shtl2" autocomplete="off" >
			    </div>
			</div>
			<br>
			  <button type="submit" class="btn btn-primary">Simpan</button>
			  <a href="<?php echo site_url('shuttle2/jenis/view_jenis');?>" class="btn btn-secondary" onclick="return confirm('Yakin Cancel ?')">Cancel</a>
			</form>
		</div>
	</div>
</div>
<br>
<script type="text/javascript">
	function getText(element) {
	  var textHolder = element.options[element.selectedIndex].text
	  document.getElementById("tjenis").value = textHolder;
	  }
</script>