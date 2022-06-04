<?php
date_default_timezone_set("Asia/Bangkok");
?>
<br><br><br>
<div class="container">
	<h3>Form Transaksi Masuk</h3>
	<div class="card bg-light">
	  <div class="card-body">		
        	<form method="POST" action="<?php echo site_url('shuttle3/barang_masuk/barang_masuk_tambah/')?>">
			<div class="form-row">
			    <div class="form-group col-md-4">
				    <label>Kode Transaksi</label>
				    <!-- <input type="text" class="form-control" name="id_transaksi" autofocus autocomplete="off"> -->
				    <input type="text" name="id_transaksi" value="<?php echo $kode ?>" hidden>
                    <input type="text" disabled class="form-control" value="<?php echo $kode?>">
			    </div>
			    <div class="form-group col-md-4">
				    <label>Tanggal</label>
				    <input type="date" class="form-control" name="tgl_masuk"  autocomplete="off" value="<?php echo date('Y-m-d')?>">
			    </div>
			    <div class="form-group col-md-4">
				    <label>Barang</label>
				    <input class="form-control" list="bar" type="text" name="id_barang" placeholder="--Pilih Barang--" autocomplete="off"required>
					<datalist id="bar">
                      <?php foreach ($get_jns->result_array() as $x ) {?>
                        <option value="<?php echo $x['id_barang']; ?>"><?php echo $x['nama_barang'];?></option>
                      <?php } ?>
                    </datalist>
			    </div>
			</div>
			<div class="form-row">	
			    <div class="form-group col-md-3">
				    <label>Barang Masuk</label>
				    <input type="text" class="form-control" name="stok_masuk" id="sm" onkeyup="sum();"autofocus autocomplete="off">
			    </div>
			    <div class="form-group col-md-3">
				    <label>Harga</label>
				    <input type="text" class="form-control" name="harga" id="h" onkeyup="sum();" autocomplete="off">
			    </div>
			    <div class="form-group col-md-3">
				    <label>Total Harga</label>
				    <input type="text" class="form-control" name="total_harga_masuk" id="thm" autofocus autocomplete="off" readonly="">
			    </div>
			    <div class="form-group col-md-3">
				    <label>Penanggung Jawab</label>
				    <input type="text" class="form-control" name="penanggung_jawab"  autocomplete="off">
			    <div class="form-group col-md-4" hidden="">
				    <label>Bagian</label>
				    <input type="text" class="form-control" name="id_bagian" value="Shtl3" autocomplete="off" >
			    </div>
			</div>
			<br>
			  <button type="submit" class="btn btn-primary">Simpan</button>
			  <a href="<?php echo site_url('shuttle3/barang_masuk/view_barang_masuk');?>" class="btn btn-secondary" onclick="return confirm('Yakin Cancel ?')">Cancel</a>
			</form>
		</div>
	</div>
</div>
<br>
<script type="text/javascript">
	function getText(element) {
	  var textHolder = element.options[element.selectedIndex].text
	  document.getElementById("tmasuk").value = textHolder;
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