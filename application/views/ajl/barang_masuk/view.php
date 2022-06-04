<br><br><br><br>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-sm-9">
      <h3>Barang Masuk</h3>
    </div>
    <div class="col-md-2 col-sm-3">
      <a href="<?php echo site_url('ajl/barang_masuk/tambah_barang_masuk');?>"><button type="button" class="btn btn-dark btn-block">Tambah</button></a>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-12">
      <table id="myTable" class="table table-sm table-bordered" style="width:100%">
          <thead class="thead-dark">
              <tr>
                  <th>ID Transaksi</th>
                  <th>Tanggal</th>
                  <th>Nama Barang</th>
                  <th>Stok Masuk</th>
                  <th>Harga</th>
                  <th>Total Harga</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($isi as $row) { ?>         
              <tr>
                  <td><?php echo $row->id_transaksi?></td>
                  <td><?php echo $row->tgl_masuk?></td>
                  <td><?php echo $row->nama_barang?></td>
                  <td><?php echo $row->stok_masuk?></td>
                  <td><?php echo $row->harga?></td>
                  <td><?php echo $row->total_harga_masuk?></td>
                  <td><a href="<?php echo site_url('ajl/barang_masuk/edit_barang_masuk/'.$row->id_transaksi)?>" class="btn btn-outline-secondary btn-sm">Ubah</a>
                      <a href="<?php echo site_url('ajl/barang_masuk/barang_masuk_hapus/'.$row->id_transaksi)?>"><button type="button" class="btn btn-outline-danger btn-sm" onclick="return confirm('Konfirmasi Hapus Data ?')">Hapus</button></a></td>
              </tr>
              <?php } ?>
      </table>
    </div>
  </div>
</div>
<br><br><br><br>

