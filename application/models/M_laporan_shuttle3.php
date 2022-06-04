<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_laporan_shuttle3 extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function laporan_stok_view()
	{
		$query = $this->db->query("SELECT barang.`id_barang`,barang.`nama_barang`, SUM(barang_masuk.`stok_masuk`) AS NB_masuk, 
				SUM(stok_barang.`stok_out`) AS NB_pakai, SUM(stok_barang.`stok`) AS sisa
				FROM barang,stok_barang,barang_masuk
				WHERE barang.`id_barang`=stok_barang.`id_barang` AND stok_barang.`id_transaksi`=barang_masuk.`id_transaksi`
				AND stok_barang.`id_bagian`='Shtl3'
				GROUP BY id_barang
				UNION ALL
				SELECT '' AS id_barang,
					'Jumlah' AS nama_barang,
				SUM(barang_masuk.`stok_masuk`) AS NB_masuk, 
				SUM(stok_barang.`stok_out`) AS NB_pakai, SUM(stok_barang.`stok`) AS sisa
				FROM barang,stok_barang,barang_masuk
				WHERE barang.`id_barang`=stok_barang.`id_barang` AND stok_barang.`id_transaksi`=barang_masuk.`id_transaksi`
				AND stok_barang.`id_bagian`='Shtl3'");
		return $query->result();	}

	public function laporan_stok_harga()
	{
		$query = $this->db->query("SELECT barang.`id_barang`,barang.`nama_barang`, SUM(barang_masuk.`stok_masuk`) AS NB_masuk, 
				SUM(barang_masuk.`total_harga_masuk`) AS Harga_NB_masuk,
				SUM(stok_barang.`stok_out`) AS NB_pakai,SUM(stok_barang.`harga`*stok_out) AS Harga_NB_pakai, 
				SUM(stok_barang.`stok`) AS sisa, SUM(stok_barang.`harga`*stok) AS Harga_NB_sisa
				FROM barang,stok_barang,barang_masuk
				WHERE barang.`id_barang`=stok_barang.`id_barang` AND stok_barang.`id_transaksi`=barang_masuk.`id_transaksi`
				AND stok_barang.`id_bagian`='Shtl3'			
				GROUP BY barang.`id_barang`
				UNION ALL
				SELECT '' AS id_barang,
					'Grand Total' AS nama_barang,
					SUM(barang_masuk.`stok_masuk`) AS NB_masuk, SUM(barang_masuk.`total_harga_masuk`) AS Harga_NB_masuk,
				SUM(stok_barang.`stok_out`) AS NB_pakai,SUM(stok_barang.`harga`*stok_out) AS Harga_NB_pakai, 
				SUM(stok_barang.`stok`) AS sisa, SUM(stok_barang.`harga`*stok) AS Harga_NB_sisa
				FROM barang,stok_barang,barang_masuk
				WHERE barang.`id_barang`=stok_barang.`id_barang` AND stok_barang.`id_transaksi`=barang_masuk.`id_transaksi`
				AND stok_barang.`id_bagian`='Shtl3'");
		return $query->result();
	}

	public function laporan_barang_masuk_view($bulan,$tahun)
	{
		$query = $this->db->query("SELECT stok_barang.`id_barang`,barang.`nama_barang`,tgl_masuk,stok_masuk AS barang_masuk,total_harga_masuk AS total_harga, penanggung_jawab
				FROM barang_masuk,barang,stok_barang
				WHERE barang.`id_barang`=stok_barang.`id_barang` AND stok_barang.`id_transaksi`=barang_masuk.`id_transaksi`
				AND MONTH(tanggal)='$bulan' AND YEAR(tanggal)='$tahun'
				AND stok_barang.`id_bagian`='Shtl3'");
		return $query->result();	
	}

	public function laporan_pemakaian_view($bulan,$tahun,$zona)
	{
		$query = $this->db->query("SELECT mesin.`zona`,mtc.`nama_mtc` AS mtc,mesin.`id_mesin` AS mc,barang_keluar.`tgl_keluar` AS tanggal,barang.`nama_barang`,stok_keluar AS jumlah_pakai,
				SUM(sub_harga) AS biaya
				FROM mesin,barang,mtc,barang_keluar,dtl_barang_keluar
				WHERE mesin.`id_mesin`=barang_keluar.`id_mesin` AND barang_keluar.`id_transaksi`=dtl_barang_keluar.`id_transaksi` 
				AND barang.`id_barang`=dtl_barang_keluar.`id_barang` AND barang_keluar.`id_mtc`=mtc.`id_mtc`
				AND mesin.`zona` LIKE '$zona%'
				AND MONTH(barang_keluar.`tgl_keluar`)='$bulan' AND YEAR(barang_keluar.`tgl_keluar`)='$tahun' AND barang_keluar.`id_bagian`='Shtl3'
				GROUP BY   mesin.`id_mesin`,barang_keluar.`tgl_keluar`,barang.`nama_barang`
				UNION ALL
				SELECT '' AS zona,'' AS mtc,''AS mc, '' AS tanggal,
					'Grand Total' AS nama_barang,
					SUM(stok)AS jumlah_pakai,
					SUM(sub_harga) AS biaya
				FROM mesin,barang,mtc,barang_keluar,dtl_barang_keluar
				WHERE mesin.`id_mesin`=barang_keluar.`id_mesin` AND barang_keluar.`id_transaksi`=dtl_barang_keluar.`id_transaksi` 
				AND barang.`id_barang`=dtl_barang_keluar.`id_barang` AND barang_keluar.`id_mtc`=mtc.`id_mtc` 
				AND mesin.`zona` LIKE '$zona%'
				AND MONTH(barang_keluar.`tgl_keluar`)='$bulan' AND YEAR(barang_keluar.`tgl_keluar`)='$tahun' AND barang_keluar.`id_bagian`='Shtl3'");
		return $query->result();	
	}
	public function laporan_biaya_montir($bulan,$tahun,$zona)
	{
		$query = $this->db->query("SELECT  kagrup.`nama_kagrup`,mtc.`nama_mtc`,mesin.`zona`,mesin.`id_mesin`,barang.`nama_barang`,
				MAX(CASE WHEN `id_fungsi` = '1' THEN total_harga_keluar ELSE '0' END) AS LUSI_WARP_LINE,
				MAX(CASE WHEN `id_fungsi` = '2' THEN total_harga_keluar ELSE '0' END) AS PAKAN_WEFT_LINE,
				MAX(CASE WHEN `id_fungsi` = '3' THEN total_harga_keluar ELSE '0' END) AS MOTOR_UTAMA,
				MAX(CASE WHEN `id_fungsi` = '4' THEN total_harga_keluar ELSE '0' END) AS MESIN_PALET,
				MAX(CASE WHEN `id_fungsi` = '5' THEN total_harga_keluar ELSE '0' END) AS BAUT_BAUT,
				MAX(CASE WHEN `id_fungsi` = '6' THEN total_harga_keluar ELSE '0' END) AS BARANG_LAIN_LAIN,
				total_harga_keluar AS total
				FROM barang,kagrup,mtc,mesin,barang_keluar,dtl_barang_keluar
				WHERE barang.`id_barang`=dtl_barang_keluar.`id_barang` AND mesin.`id_mesin`=barang_keluar.`id_mesin` 
				AND kagrup.`id_kagrup`=barang_keluar.`id_kagrup` AND barang_keluar.`id_mtc`=mtc.`id_mtc`
				AND barang_keluar.`id_transaksi`=dtl_barang_keluar.`id_transaksi` 
				AND mesin.`zona` LIKE '$zona%'
				AND MONTH(barang_keluar.`tgl_keluar`)='$bulan' AND YEAR(barang_keluar.`tgl_keluar`)='$tahun' AND barang_keluar.`id_bagian`='Shtl3'
				GROUP BY barang.`nama_barang`,kagrup.`nama_kagrup`,mtc.`nama_mtc`,total_harga_keluar");
		return $query->result();	
	}
								
}