<br><br><br>
<div class="container">
	<h3>Form Barang Keluar</h3>
	<div class="card bg-ligh">
	  <div class="card-body">
			<?php foreach ($ubah_data as $key => $row): ?>			
        	<form method="POST" action="<?php echo site_url('shuttle2/barang_keluar/barang_keluar_edit/'.$row->id_transaksi)?>">
			<div class="form-row">
			    <div class="form-group col-md-3">
				    <label>Kode Transaksi</label>
				    <input type="text" class="form-control" name="id_transaksi" value="<?php echo $row->id_transaksi?>" autofocus autocomplete="off">
			    </div>
			    <div class="form-group col-md-3">
				    <label>Tanggal</label>
				    <input type="date" class="form-control" name="tgl_keluar"  autocomplete="off" value="<?php echo $row->tgl_keluar?>">
			    </div>
			    <div class="form-group col-md-3">
				    <label>Barang</label>
<!-- 				    <input type="text" class="form-control" name="id_barang" autofocus autocomplete="off"> -->
 				    <select class="form-control" name="id_barang" onchange="getText(this)" >
					    <option value="">-- Pilih Barang --</option>
						<option selected value="<?php echo $row->id_barang?>"><?php echo $row->id_barang?> - <?php echo $row->nama_barang?></option>
						<option></option>
						<?php foreach ($get_jns->result_array() as $i) { ?>
							<option value="<?php echo $i['id_barang'];?>"><?php echo $i['id_barang'];?> - <?php echo $i['nama_barang'];?></option>
						<?php } ?>
					</select>
			    </div>
			</div>
			<div class="form-row">	
			    <div class="form-group col-md-3">
				    <label>Barang keluar</label>
				    <input type="text" class="form-control" name="stok_keluar" id="sm" onkeyup="sum();"autofocus autocomplete="off" value="<?php echo $row->stok_keluar?>">
			    </div>
			    <div class="form-group col-md-3">
				    <label>Harga</label>
				    <input type="text" class="form-control" name="harga" id="h" onkeyup="sum();" value="<?php echo $row->harga?>" autocomplete="off" >
			    </div>
			    <div class="form-group col-md-3">
				    <label>Total Harga</label>
				    <input type="text" class="form-control" name="total_harga_keluar" id="thm" autofocus autocomplete="off" value="<?php echo $row->total_harga_keluar?>">
			    </div>
			    <div class="form-group col-md-3">
				    <label>Penanggung Jawab</label>
				    <input type="text" class="form-control" name="penanggung_jawab"  autocomplete="off" value="<?php echo $row->penanggung_jawab?>">
			    <div class="form-group col-md-4" hidden="">
				    <label>Bagian</label>
				    <input type="text" class="form-control" name="id_bagian" value="Shtl2" autocomplete="off" value="<?php echo $row->id_bagian?>" >
			    </div>
			</div>
			<br>
			  <button type="submit" class="btn btn-primary">Simpan</button>
			  <a href="<?php echo site_url('shuttle2/barang_keluar/view_barang_keluar');?>" class="btn btn-secondary" onclick="return confirm('Yakin Cancel ?')">Cancel</a>
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