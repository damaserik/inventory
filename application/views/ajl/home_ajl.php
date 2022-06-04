<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Home Ajl</title>
	<!-- DataTablees -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/DataTables/datatables.min.css"/>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" type="text/css" >
    <script src="<?php echo base_url();?>assets/js/jquery-3.3.1.js"></script>
   <!-- 
   	<script type='text/javascript' src='<?php echo base_url();?>assets/js/jquery-2.1.4.min.js'></script> -->
    <script type='text/javascript' src='<?php echo base_url();?>assets/js/autocomplete/jquery.autocomplete.js'></script>
    <!-- Memanggil file .css untuk style saat data dicari dalam filed -->
    <link href='<?php echo base_url();?>assets/js/autocomplete/jquery.autocomplete.css' rel='stylesheet' />

    <script type='text/javascript'>
        var site = "<?php echo site_url();?>";
        $(function(){
            $('.autocomplete').autocomplete({
                serviceUrl: site+'/ajl/barang_masuk/search',
                onSelect: function (suggestion) {
                    $('#a').val(''+suggestion.id); 
                    $('#b').val(''+suggestion.sto); 
                    $('#c').val(''+suggestion.hrg);
                    $('#d').val(''+suggestion.id_trm);
                }
            });
        });
    </script>

</head>
<body>	

		<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
		 
		  <!-- Brand -->
		  <a class="navbar-brand mb-0 h1" href="#">AJL</a>
		  <div class="col-md-9">
		  <!-- Links -->
		  <ul class="navbar-nav">
		    <!-- Dropdown master-->
		    <li class="nav-item dropdown">
		      <a class="nav-link text-light" href="<?php echo site_url('ajl/home_ajl');?>" id="navbardrop" data-toggle="dropdown">
		        Master 
		      </a>
		      <div class="dropdown-menu">
		        <a class="dropdown-item" href="<?php echo site_url('ajl/barang/view_barang');?>">Barang</a>		       
		        <!-- <a class="dropdown-item" href="<?php echo site_url('ajl/bagian/view_bagian');?>">Bagian</a> -->
		        <a class="dropdown-item" href="<?php echo site_url('ajl/mesin/view_mesin');?>">Mesin</a>
		        <a class="dropdown-item" href="<?php echo site_url('ajl/kagrup/view_kagrup'); ?>">Kagrup</a>
		        <a class="dropdown-item" href="<?php echo site_url('ajl/mtc/view_mtc'); ?>">Mtc</a>		        
		        <a class="dropdown-item" href="<?php echo site_url('ajl/jenis/view_jenis'); ?>">Jenis</a>		        
		        <a class="dropdown-item" href="<?php echo site_url('ajl/fungsi/view_fungsi'); ?>">Fungsi</a>
		      </div>
		    </li>
		    <!-- Dropdown master End -->

		    <!-- Dropdown Transaksi-->
		    <li class="nav-item dropdown">
		      <a class="nav-link text-light" href="#" id="navbardrop" data-toggle="dropdown">
		        Transaksi 
		      </a>
		      <div class="dropdown-menu">
		        <a class="dropdown-item" href="<?php echo site_url('ajl/barang_masuk/view_barang_masuk');?>">Barang Masuk</a>
		        <a class="dropdown-item" href="<?php echo site_url('ajl/stok/view_stok'); ?>">Stok</a>
		        <a class="dropdown-item" href="<?php echo site_url('ajl/barang_keluar/view_barang_keluar');?>">Barang Keluar</a>
		      </div>
		    </li>
		    <!-- Dropdown Transaksi End -->

		    <!-- Dropdown Laporan-->
		    <li class="nav-item dropdown">
		      <a class="nav-link text-light" href="#" id="navbardrop" data-toggle="dropdown">
		        Laporan
		      </a>
		      <div class="dropdown-menu">
		        <a class="dropdown-item" href="<?php echo site_url('ajl/laporan/laporan_stok');?>">Stok</a>
		        <a class="dropdown-item" href="<?php echo site_url('ajl/laporan/laporan_barang_masuk');?>">Barang Masuk</a>
		        <a class="dropdown-item" href="<?php echo site_url('ajl/laporan/laporan_pemakaian');?>">Biaya</a>
		      </div>
		    </li>
		    <!-- Dropdown Laporan End -->

		    <!-- Dropdown maintenance-->
	<!-- 	    <li class="nav-item dropdown">
		      <a class="nav-link text-light" href="#" id="navbardrop" data-toggle="dropdown">
		        Maintenance
		      </a>
		      <div class="dropdown-menu">
		        <a class="dropdown-item" href="#"></a>
		      </div>
		    </li> -->
		    <!-- Dropdown maintenance End -->	

		  </ul>
		  </div>

		  <div class="row justify-content-end">
			  <div class="col-md-3">
				  <!-- Links -->
				  <ul class="navbar-nav">
				    <li class="nav-item">
				      <a class="nav-link text-light" href="#">Logout</a>
				    </li>
				  </ul>
			  </div>
		  </div>
		</nav>
		
		<?php $content ?>

	<!-- Optional JavaScript -->
    
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/DataTables/datatables.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
          var table = $('#myTable').DataTable({
          	"deferRender": true,
            "processing": true,
            "order" : [],
          });
      });
    </script>
</body>
</html>