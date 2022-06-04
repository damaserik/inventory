<br><br><br>
<div class="container">
	<h3>Form Bagian</h3>
	<div class="card bg-light">
	  <div class="card-body">		
        	<form method="POST" action="<?php echo site_url('shuttle2/bagian/bagian_tambah/')?>">
			<div class="form-row">
			    <div class="form-group col-md-4">
				    <label>Kode Bagian</label>
				    <input type="text" class="form-control" name="id_bagian" autofocus autocomplete="off">
			    </div>
			    <div class="form-group col-md-4">
				    <label>Nama Bagian</label>
				    <input type="text" class="form-control" name="nama_bagian"  autocomplete="off">
			    </div>
			</div>
			<br>
			  <button type="submit" class="btn btn-primary">Simpan</button>
			  <a href="<?php echo site_url('shuttle2/bagian/view_bagian');?>" class="btn btn-secondary" onclick="return confirm('Yakin Cancel ?')">Cancel</a>
			</form>
		</div>
	</div>
</div>
<br>
<script type="text/javascript">
	function getText(element) {
	  var textHolder = element.options[element.selectedIndex].text
	  document.getElementById("tbagian").value = textHolder;
	  }
</script>