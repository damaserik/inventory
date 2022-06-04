<br><br><br>
<div class="container">
	<h3>Form Bagian</h3>
	<div class="card bg-ligh">
	  <div class="card-body">
			<?php foreach ($ubah_data as $key => $row): ?>			
        	<form method="POST" action="<?php echo site_url('shuttle2/bagian/bagian_edit/'.$row->id_bagian)?>">
			<div class="form-row">
			    <div class="form-group col-md-4">
				    <label>Kode Bagian</label>
				    <input type="text" class="form-control" name="id_bagian" autofocus autocomplete="off" value="<?php echo $row->id_bagian?>">
			    </div>
			    <div class="form-group col-md-4">
				    <label>Nama Bagian</label>
				    <input type="text" class="form-control" name="nama_bagian"  autocomplete="off" value="<?php echo $row->nama_bagian?>">
			    </div>
			</div>
			<br>
			  <button type="submit" class="btn btn-primary">Simpan</button>
			  <a href="<?php echo site_url('shuttle2/bagian/view_bagian');?>" class="btn btn-secondary" onclick="return confirm('Yakin Cancel ?')">Cancel</a>
			</form>
			<?php endforeach ?>
		</div>
	</div>
</div>
<br>
<script type="text/javascript">
	function getText(element) {
	  var textHolder = element.options[element.selectedIndex].text
	  document.getElementById("ebagian").value = textHolder;
	  }
</script>