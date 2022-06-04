<br><br><br>
<div class="container">
	<h3>Form Barang Masuk</h3>
	<div class="card bg-ligh">
	  <div class="card-body">
			<?php foreach ($ubah_data as $key => $row): ?>			
        	<form method="POST" action="<?php echo site_url('ajl/barang_masuk/barang_masuk_edit/'.$row->id_transaksi)?>">
			<div class="form-row">
			    <div class="form-group col-md-3">
				    <label>Kode Transaksi</label>
				    <input type="text" class="form-control" name="id_transaksi" value="<?php echo $row->id_transaksi?>" readonly>
			    </div>
			    <div class="form-group col-md-3">
				    <label>Tanggal</label>
				    <input type="date" class="form-control" name="tgl_masuk"  autocomplete="off" value="<?php echo $row->tgl_masuk?>" autofocus>
			    </div>
			    <div class="form-group col-md-3">
				    <label>Barang</label>
				    <input class="form-control" type="text" name="id_barang" value="<?php echo $row->id_barang?>" autocomplete="off" required readonly>
			    </div>
			</div>
			<div class="form-row">	
			    <div class="form-group col-md-3">
				    <label>Barang Masuk</label>
				    <input type="text" class="form-control" name="stok_masuk" id="sm" onkeyup="sum();"autofocus autocomplete="off" value="<?php echo $row->stok_masuk?>">
			    </div>
			    <div class="form-group col-md-3">
				    <label>Harga</label>
				    <input type="text" class="form-control" name="harga" id="h" onkeyup="sum();" value="<?php echo $row->harga?>" autocomplete="off" >
			    </div>
			    <div class="form-group col-md-3">
				    <label>Total Harga</label>
				    <input type="text" class="form-control" name="total_harga_masuk" id="thm" autofocus autocomplete="off" value="<?php echo $row->total_harga_masuk?>">
			    </div>
			    <div class="form-group col-md-3">
				    <label>Penanggung Jawab</label>
				    <input type="text" class="form-control" name="penanggung_jawab"  autocomplete="off" value="<?php echo $row->penanggung_jawab?>">
			    <div class="form-group col-md-4" hidden="">
				    <label>Bagian</label>
				    <input type="text" class="form-control" name="id_bagian" value="Ajl" autocomplete="off" value="<?php echo $row->id_bagian?>" >
			    </div>
			</div>
			<br>
			  <button type="submit" class="btn btn-primary">Simpan</button>
			  <a href="<?php echo site_url('ajl/barang_masuk/view_barang_masuk');?>" class="btn btn-secondary" onclick="return confirm('Yakin Cancel ?')">Cancel</a>
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

	 function sum() {
            var hrg = document.getElementById('h').value;
            var stm = document.getElementById('sm').value;
            var result = parseFloat(hrg) * parseFloat(stm);
            if (!isNaN(result)) {
              document.getElementById('thm').value = result;
            }
      }
</script>