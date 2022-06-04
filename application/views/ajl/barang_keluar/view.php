<br><br><br><br>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-sm-9">
      <h3>Barang Keluar</h3>
    </div>
    <div class="col-md-2 col-sm-3">
      <a href="<?php echo site_url('ajl/barang_keluar/tambah_barang_keluar');?>"><button type="button" class="btn btn-dark btn-block">Tambah</button></a>
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
                  <th>Stok keluar</th>
                  <th>Total Harga</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($isi as $row) { ?>         
              <tr>
                  <td><?php echo $row->id_transaksi?></td>
                  <td><?php echo $row->tgl_keluar?></td>
                  <td><?php echo $row->nama_barang?></td>
                  <td><?php echo $row->stok_keluar?></td>
                  <td><?php echo $row->total_harga_keluar?></td>
                  <td><!-- <a href="<?php echo site_url('ajl/barang_keluar/edit_barang_keluar/'.$row->id_transaksi)?>" class="btn btn-outline-secondary btn-sm">Ubah</a> -->
                      <a href="<?php echo site_url('ajl/barang_keluar/hapus_brngkeluar/'.$row->id_transaksi)?>"><button type="button" class="btn btn-outline-danger btn-sm" onclick="return confirm('Konfirmasi Hapus Data ?')">Hapus</button></a></td>
              </tr>
              <?php } ?>
      </table>
    </div>
  </div>
</div>
<br><br><br><br>

