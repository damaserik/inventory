<br><br><br><br>
<div class="container">
  <div class="form-inline">
            <div class="col-md-4">
                 <h4>Laporan Stok</h4>
            </div>
            <div class="col-md-1">
                 <form class="form-inline" method="POST" action="<?php echo site_url('ajl/laporan/laporan_stok_cetak');?>" target="_blank">
                 <button class="btn btn-outline-primary btn-sm" type="submit" style="font-size: 13px;"name="action">cetak</button>
            </div>
            <div class="col-md">
                 <a href="<?php echo site_url('ajl/laporan/laporan_view_stok');?>" class="btn btn-outline-success btn-sm" target="_blank">view</a>
            </div>
          </div>

<hr>
  <div class="form-inline">
    <div class="col-md-4">
            <h4>Laporan Stok + Harga</h4>
          </div>
            <div class="col-md-1">
                 <a href="<?php echo site_url('ajl/laporan/laporan_stok_harga_cetak');?>" class="btn btn-outline-primary btn-sm" target="_blank">cetak</a>
            </div>
            <div class="col-md">
                 <a href="<?php echo site_url('ajl/laporan/laporan_view_stok_harga');?>" class="btn btn-outline-success btn-sm" target="_blank">view</a>
            </div>
          </div>

<hr><br> 
</div>

