<br><br><br><br>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-sm-9">
            <h4>Laporan Pemakaian</h4>
          </div>
        </div>
              <div class="row">
                <div class="col-md-12" style="font-size: 13px;">
                  <div class="row">
                      <div class="row" style="padding: 0px 0px 0px 33px;">
                      <form class="form-inline" method="POST" action="<?php echo site_url('shuttle3/laporan/laporan_pemakaian_cetak');?>" target="_blank">
                        <div class="form-group">                
                                <label>Zona</label>&ensp;
                                <select id="zona1" name="zona" class="form-control" style="font-size: 13px;">
                                    <option value="">Semua</option>
                                    <option value="Zona 1">Zona 1</option>
                                    <option value="Zona 2">Zona 2</option>
                                    <option value="Zona 3">Zona 3</option>
                                    <option value="Zona 4">Zona 4</option>
                                </select>
                        </div>&ensp;
                        <div class="form-group">
                                <label for="expirationmonth">Bulan</label>&ensp;
                                <select id="bulan" name="bulan" class="form-control" style="font-size: 13px;">
                                    <option value="01">01 - Januari</option>
                                    <option value="02">02 - Februari</option>
                                    <option value="03">03 - Maret</option>
                                    <option value="04">04 - April</option>
                                    <option value="05">05 - Mei</option>
                                    <option value="06">06 - Juni</option>
                                    <option value="07">07 - Juli</option>
                                    <option value="08">08 - Agustus</option>
                                    <option value="09">09 - September</option>
                                    <option value="10">10 - Oktober</option>
                                    <option value="11">11 - November</option>
                                    <option value="12">12 - Desember</option>     
                                </select>
                        </div>&ensp;
                        <div class="form-group">                
                                <label for="expirationyear">Tahun</label>&ensp;
                                <select id="tahun" name="tahun"  class="form-control" style="font-size: 13px;">
                                    <?php for ( $i = 2019; $i <= 2032; $i ++) { ?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php }?>
                                </select>
                        </div>
                           &ensp;<button class="btn btn-outline-primary" type="submit" style="font-size: 13px;"name="action">cetak</button>
                               <div class="form-group" style="padding: 0px 0px 0px 8px;">            
                                    <button class="btn btn-outline-danger" type="reset" style="font-size: 13px;"onclick="return confirm('Konfirmasi Clear Form ?')">reset</button>&ensp;&ensp;
                               </div>
                        </div>                        
                      </form>

                      <!-- view laporan  -->
                      <form class="form-inline" method="POST" action="<?php echo site_url('shuttle3/laporan/laporan_view_pemakaian');?>" target="_blank">
                        <div class="form-group" hidden="">                
                                <label>Zona</label>&ensp;
                                <select id="zona2" name="zona" class="form-control" style="font-size: 13px;">
                                    <option value="">Semua</option>
                                    <option value="Zona 1">Zona 1</option>
                                    <option value="Zona 2">Zona 2</option>
                                    <option value="Zona 3">Zona 3</option>
                                    <option value="Zona 4">Zona 4</option>
                                </select>
                        </div>&ensp;
                        <div class="form-group" hidden="">
                                <label for="expirationmonth">Bulan</label>&ensp;
                                <select id="bulan2" name="bulan" class="form-control" style="font-size: 13px;">
                                    <option value="01">01 - Januari</option>
                                    <option value="02">02 - Februari</option>
                                    <option value="03">03 - Maret</option>
                                    <option value="04">04 - April</option>
                                    <option value="05">05 - Mei</option>
                                    <option value="06">06 - Juni</option>
                                    <option value="07">07 - Juli</option>
                                    <option value="08">08 - Agustus</option>
                                    <option value="09">09 - September</option>
                                    <option value="10">10 - Oktober</option>
                                    <option value="11">11 - November</option>
                                    <option value="12">12 - Desember</option>     
                                </select>
                        </div>&ensp;
                        <div class="form-group" hidden="">                
                              <label for="expirationyear">Tahun</label>&ensp;
                              <select id="tahun2" name="tahun"  class="form-control" style="font-size: 13px;">
                                    <?php for ( $i = 2019; $i <= 2032; $i ++) { ?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php }?>
                              </select>
                        </div>                        
                        <div class="form-group">
                          <button class="btn btn-outline-success" type="submit" style="font-size: 13px;"name="action">view</button>&ensp;
                        </div>
                      </form>
                      </div>          
                      <!-- END view-->

                  </div>
                </div>
              </div>
<hr>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-sm-9">
            <h4>Laporan Biaya Montir</h4>
          </div>
        </div>
              <div class="row">
                <div class="col-md-12" style="font-size: 13px;">
                  <div class="row">
                      <div class="row" style="padding: 0px 0px 0px 33px;">
                      <form class="form-inline" method="POST" action="<?php echo site_url('shuttle3/laporan/laporan_biaya_montir_cetak');?>" target="_blank">
                        <div class="form-group">                
                                <label>Zona</label>&ensp;
                                <select id="zona3" name="zona" class="form-control" style="font-size: 13px;">
                                    <option value="Zona">Semua</option>
                                    <option value="Zona 1">Zona 1</option>
                                    <option value="Zona 2">Zona 2</option>
                                    <option value="Zona 3">Zona 3</option>
                                    <option value="Zona 4">Zona 4</option>
                                </select>
                        </div>&ensp;
                        <div class="form-group">
                                <label for="expirationmonth">Bulan</label>&ensp;
                                <select id="bulan3" name="bulan" class="form-control" style="font-size: 13px;">
                                    <option value="01">01 - Januari</option>
                                    <option value="02">02 - Februari</option>
                                    <option value="03">03 - Maret</option>
                                    <option value="04">04 - April</option>
                                    <option value="05">05 - Mei</option>
                                    <option value="06">06 - Juni</option>
                                    <option value="07">07 - Juli</option>
                                    <option value="08">08 - Agustus</option>
                                    <option value="09">09 - September</option>
                                    <option value="10">10 - Oktober</option>
                                    <option value="11">11 - November</option>
                                    <option value="12">12 - Desember</option>     
                                </select>
                        </div>&ensp;
                        <div class="form-group">                
                                <label for="expirationyear">Tahun</label>&ensp;
                                <select id="tahun3" name="tahun"  class="form-control" style="font-size: 13px;">
                                    <?php for ( $i = 2019; $i <= 2032; $i ++) { ?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php }?>
                                </select>
                        </div>
                           &ensp;<button class="btn btn-outline-primary" type="submit" style="font-size: 13px;"name="action">cetak</button>
                               <div class="form-group" style="padding: 0px 0px 0px 8px;">            
                                    <button class="btn btn-outline-danger" type="reset" style="font-size: 13px;"onclick="return confirm('Konfirmasi Clear Form ?')">reset</button>&ensp;&ensp;
                               </div>
                        </div>                        
                      </form>

                      <!-- view laporan  -->
                      <form class="form-inline" method="POST" action="<?php echo site_url('shuttle3/laporan/laporan_view_biaya_montir');?>" target="_blank">
                        <div class="form-group" hidden="">                
                                <label>Zona</label>&ensp;
                                <select id="zona4" name="zona" class="form-control" style="font-size: 13px;">
                                    <option value="Zona">Semua</option>
                                    <option value="Zona 1">Zona 1</option>
                                    <option value="Zona 2">Zona 2</option>
                                    <option value="Zona 3">Zona 3</option>
                                    <option value="Zona 4">Zona 4</option>
                                </select>
                        </div>&ensp;
                        <div class="form-group" hidden="">
                                <label for="expirationmonth">Bulan</label>&ensp;
                                <select id="bulan4" name="bulan" class="form-control" style="font-size: 13px;">
                                    <option value="01">01 - Januari</option>
                                    <option value="02">02 - Februari</option>
                                    <option value="03">03 - Maret</option>
                                    <option value="04">04 - April</option>
                                    <option value="05">05 - Mei</option>
                                    <option value="06">06 - Juni</option>
                                    <option value="07">07 - Juli</option>
                                    <option value="08">08 - Agustus</option>
                                    <option value="09">09 - September</option>
                                    <option value="10">10 - Oktober</option>
                                    <option value="11">11 - November</option>
                                    <option value="12">12 - Desember</option>     
                                </select>
                        </div>&ensp;
                        <div class="form-group" hidden="">                
                              <label for="expirationyear">Tahun</label>&ensp;
                              <select id="tahun4" name="tahun"  class="form-control" style="font-size: 13px;">
                                    <?php for ( $i = 2019; $i <= 2032; $i ++) { ?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php }?>
                              </select>
                        </div>                        
                        <div class="form-group">
                          <button class="btn btn-outline-success" type="submit" style="font-size: 13px;"name="action">view</button>&ensp;
                        </div>
                      </form>
                      </div>          
                      <!-- END view-->

                  </div>
                </div>
              </div>
<hr>
</div>
      <!-- end of biaya pemakaian -->
<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script>
  $('#bulan').change(function(){ 
       // ambil nilai
       var ss = $(this).find('option:selected').attr('value');
       $('#bulan2').val(ss);
  });
  $('#tahun').change(function(){ 
       // ambil nilai
       var ss = $(this).find('option:selected').attr('value');
       $('#tahun2').val(ss);
  });
    $('#bulan3').change(function(){ 
       // ambil nilai
       var ss = $(this).find('option:selected').attr('value');
       $('#bulan4').val(ss);
  });
  $('#tahun3').change(function(){ 
       // ambil nilai
       var ss = $(this).find('option:selected').attr('value');
       $('#tahun4').val(ss);
  });  
  $('#zona1').change(function(){ 
       // ambil nilai
       var ss = $(this).find('option:selected').attr('value');
       $('#zona2').val(ss);
  });  
  $('#zona3').change(function(){ 
       // ambil nilai
       var ss = $(this).find('option:selected').attr('value');
       $('#zona4').val(ss);
  });
</script>