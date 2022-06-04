<br><br><br><br>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-sm-9">
      <h3>Barang</h3>
    </div>
    <div class="col-md-2 col-sm-3">
      <a href="<?php echo site_url('shuttle3/barang/tambah_barang');?>"><button type="button" class="btn btn-dark btn-block">Tambah</button></a>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-12">
      <table id="myTable" class="table table-sm table-bordered" style="width:100%">
          <thead class="thead-dark">
              <tr>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Jenis</th>
                  <th>Fungsi</th>
                  <th width="15%">Aksi</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($isi as $row) { ?>         
              <tr>
                  <td><?php echo $row->id_barang?></td>
                  <td><?php echo $row->nama_barang?></td>
                  <td><?php echo $row->jenis?></td>
                  <td><?php echo $row->fungsi?></td>
                  <td><a href="<?php echo site_url('shuttle3/barang/edit_barang/'.$row->id_barang)?>" class="btn btn-outline-secondary btn-sm">Ubah</a>
                      <a href="<?php echo site_url('shuttle3/barang/barang_hapus/'.$row->id_barang)?>"><button type="button" class="btn btn-outline-danger btn-sm" onclick="return confirm('Konfirmasi Hapus Data ?')">Hapus</button></a></td>
              </tr>
              <?php } ?>
      </table>
    </div>
  </div>
</div>
<br><br><br><br>

