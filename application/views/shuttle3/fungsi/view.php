<br><br><br><br>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-sm-9">
      <h3>Fungsi</h3>
    </div>
    <div class="col-md-2 col-sm-3">
      <a href="<?php echo site_url('shuttle3/fungsi/tambah_fungsi');?>"><button type="button" class="btn btn-dark btn-block">Tambah</button></a>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-12">
      <table id="myTable" class="table table-sm table-bordered" style="width:100%">
          <thead class="thead-dark">
              <tr>
                  <th>ID</th>
                  <th>Fungsi</th>
                  <th width="15%">Aksi</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($isi as $row) { ?>         
              <tr>
                  <td><?php echo $row->id_fungsi?></td>
                  <td><?php echo $row->fungsi?></td>
                  <td><a href="<?php echo site_url('shuttle3/fungsi/edit_fungsi/'.$row->id_fungsi)?>" class="btn btn-outline-secondary btn-sm">Ubah</a>
                      <a href="<?php echo site_url('shuttle3/fungsi/fungsi_hapus/'.$row->id_fungsi)?>"><button type="button" class="btn btn-outline-danger btn-sm" onclick="return confirm('Konfirmasi Hapus Data ?')">Hapus</button></a></td>
              </tr>
              <?php } ?>
      </table>
    </div>
  </div>
</div>
<br><br><br><br>

