<br><br><br>
<div class="container">
	<h3>Form Mtc</h3>
	<div class="card bg-ligh">
	  <div class="card-body">
			<?php foreach ($ubah_data as $key => $row): ?>			
        	<form method="POST" action="<?php echo site_url('ajl/mtc/mtc_edit/'.$row->id_mtc)?>">
			<div class="form-row">
			    <div class="form-group col-md-4" required="">
				    <label>ID Mtc</label>
				    <input type="text" class="form-control" name="id_mtc" autofocus autocomplete="off" value="<?php echo $row->id_mtc?>">
			    </div>
			    <div class="form-group col-md-4" required="">
				    <label>Nama</label>
				    <input type="text" class="form-control" name="nama_mtc" onkeyup="this.value = this.value.toUpperCase()" required="" autocomplete="off" value="<?php echo $row->nama_mtc?>">
			    </div>
			    <div class="form-group col-md-4" hidden="">
				    <label>Bagian</label>
				    <input type="text" class="form-control" name="id_bagian" value="Ajl" autocomplete="off" >
			    </div>
			</div>

			<br>
			  <button type="submit" class="btn btn-primary">Simpan</button>
			  <a href="<?php echo site_url('ajl/mtc/view_mtc');?>" class="btn btn-secondary" onclick="return confirm('Yakin Cancel ?')">Cancel</a>
			</form>
			<?php endforeach ?>
		</div>
	</div>
</div>
<br>
<script type="text/javascript">
	function getText(element) {
	  var textHolder = element.options[element.selectedIndex].text
	  document.getElementById("emtc").value = textHolder;
	  }
</script>