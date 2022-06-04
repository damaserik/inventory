 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_shuttle2 extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();		
	}
	// ============================= MENU MASTER ===============================
	// VIEW 
	// =========================================================================
	// Barang
	public function view_barang()
	{
		$sql = "SELECT id_barang,nama_barang,jenis,fungsi FROM barang,jenis,fungsi 
		WHERE barang.`id_jenis`=jenis.`id_jenis` AND barang.`id_fungsi`=fungsi.`id_fungsi` AND barang.id_bagian='Shtl2'
		order by id_barang asc";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function simpan_barang($data)
	{
		$this->db->insert('barang', $data);
	}

	public function delete_barang($id)
	{
		$this->db->where('id_barang', $id)
		->delete('barang');
	}

	public function view_edit_barang($id)
	{
		$this->db->select('*');
		$this->db->from('barang as a');
		$this->db->join('jenis as b', 'a.id_jenis=b.id_jenis');
		$this->db->join('fungsi as c', 'a.id_fungsi=c.id_fungsi');
		$this->db->where('a.id_barang', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	public function edit_barang($id, $data)
	{
		$this->db->where('id_barang', $id);
		$this->db->update('barang', $data);
	}


	// =========================================================================
	// Bagian
	public function view_bagian()
	{
		$sql = "SELECT id_bagian,nama_bagian FROM bagian order by id_bagian asc";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function simpan_bagian($data)
	{
		$this->db->insert('bagian', $data);
	}

	public function delete_bagian($id)
	{
		$this->db->where('id_bagian', $id)
		->delete('bagian');
	}

	public function view_edit_bagian($id)
	{
		$this->db->select('*');
		$this->db->from('bagian');
		$this->db->where('id_bagian', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	public function edit_bagian($id, $data)
	{
		$this->db->where('id_bagian', $id);
		$this->db->update('bagian', $data);
	}

	// =========================================================================
	// Mesin
	public function view_mesin()
	{
		$sql = "SELECT id_mesin,zona FROM mesin where id_bagian='Shtl2'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function simpan_mesin($data)
	{
		$this->db->insert('mesin', $data);
	}

	public function delete_mesin($id)
	{
		$this->db->where('id_mesin', $id)
		->delete('mesin');
	}

	public function view_edit_mesin($id)
	{
		$this->db->select('*');
		$this->db->from('mesin');
		$this->db->where('id_mesin', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	public function edit_mesin($id, $data)
	{
		$this->db->where('id_mesin', $id);
		$this->db->update('mesin', $data);
	}

    // =========================================================================
	// Kagrup
	public function view_kagrup()
	{
		$sql = "SELECT id_kagrup,nama_kagrup FROM kagrup where id_bagian='Shtl2' order by id_kagrup asc";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function simpan_kagrup($data)
	{
		$this->db->insert('kagrup', $data);
	}

	public function delete_kagrup($id)
	{
		$this->db->where('id_kagrup', $id)
		->delete('kagrup');
	}

	public function view_edit_kagrup($id)
	{
		$this->db->select('*');
		$this->db->from('kagrup');
		$this->db->where('id_kagrup', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	public function edit_kagrup($id, $data)
	{
		$this->db->where('id_kagrup', $id);
		$this->db->update('kagrup', $data);
	}

	// =========================================================================
	// Fungsi
	public function view_fungsi()
	{
		$sql = "SELECT id_fungsi,fungsi FROM fungsi WHERE id_bagian='Shtl2' order by id_fungsi asc";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function simpan_fungsi($data)
	{
		$this->db->insert('fungsi', $data);
	}

	public function delete_fungsi($id)
	{
		$this->db->where('id_fungsi', $id)
		->delete('fungsi');
	}

	public function view_edit_fungsi($id)
	{
		$this->db->select('*');
		$this->db->from('fungsi');
		$this->db->where('id_fungsi', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	public function edit_fungsi($id, $data)
	{
		$this->db->where('id_fungsi', $id);
		$this->db->update('fungsi', $data);
	}

    // =========================================================================
	// Jenis
	public function view_jenis()
	{
		$sql = "SELECT id_jenis,jenis FROM jenis WHERE id_bagian='Shtl2' order by id_jenis asc";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function simpan_jenis($data)
	{
		$this->db->insert('jenis', $data);
	}

	public function delete_jenis($id)
	{
		$this->db->where('id_jenis', $id)
		->delete('jenis');
	}

	public function view_edit_jenis($id)
	{
		$this->db->select('*');
		$this->db->from('jenis');
		$this->db->where('id_jenis', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	public function edit_jenis($id, $data)
	{
		$this->db->where('id_jenis', $id);
		$this->db->update('jenis', $data);
	}


	// =========================================================================
	// Mtc
	public function view_mtc()
	{
		$sql = "SELECT id_mtc,nama_mtc FROM mtc where id_bagian='Shtl2' order by id_mtc asc";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function simpan_mtc($data)
	{
		$this->db->insert('mtc', $data);
	}

	public function delete_mtc($id)
	{
		$this->db->where('id_mtc', $id)
		->delete('mtc');
	}

	public function view_edit_mtc($id)
	{
		$this->db->select('*');
		$this->db->from('mtc');
		$this->db->where('id_mtc', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	public function edit_mtc($id, $data)
	{
		$this->db->where('id_mtc', $id);
		$this->db->update('mtc', $data);
	}

	// =========================================================================
	// TRANSAKSI BARANG MASUK
	public function view_barang_masuk()
	{
		$sql = "SELECT barang_masuk.`id_transaksi`,tgl_masuk,barang.`nama_barang`,stok_masuk,stok_barang.`harga`,total_harga_masuk
				FROM barang_masuk,stok_barang,barang
				WHERE barang_masuk.`id_transaksi`=stok_barang.`id_transaksi` AND stok_barang.`id_barang`=barang.`id_barang` AND barang.`id_bagian`='Shtl2'
				ORDER BY tgl_masuk ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function simpan_barang_masuk($data)
	{
		$this->db->insert('barang_masuk', $data);
	}
		public function simpan_stok_barang($data)
	{
		$this->db->insert('stok_barang', $data);
	}

	public function delete_barang_masuk($id)
	{
		$this->db->where('id_transaksi', $id)
		->delete('barang_masuk');
	}

	public function delete_stok_barang($id)
	{
		$this->db->where('id_transaksi', $id)
		->delete('stok_barang');
	}

	public function view_edit_barang_masuk($id)
	{
		$this->db->select('*');
		$this->db->from('barang_masuk as a');
		$this->db->join('stok_barang as b', 'a.id_transaksi=b.id_transaksi');
		$this->db->join('barang as c', 'b.id_barang=c.id_barang');
		$this->db->where('a.id_transaksi', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	public function edit_barang_masuk($id, $data)
	{
		$this->db->where('id_transaksi', $id);
		$this->db->update('barang_masuk', $data);
	}

	public function edit_stok_barang($id, $data)
	{
		$this->db->where('id_transaksi', $id);
		$this->db->update('stok_barang', $data);
	}


	// =========================================================================
	// Stok
	public function view_stok()
	{
		$sql = "SELECT barang.`id_barang`,barang.`nama_barang`,SUM(`stok`) AS stok
				FROM barang,stok_barang
				WHERE barang.`id_barang`=stok_barang.`id_barang` AND stok_barang.`id_bagian`='Shtl2'
				GROUP BY stok_barang.`id_barang`";
		$data = $this->db->query($sql);
		return $data->result();
	}



	// =========================================================================
	// TRANSAKSI BARANG KELUAR
	public function view_barang_keluar()
	{
		$sql = "SELECT * FROM barang_keluar as a join dtl_barang_keluar as b on a.`id_transaksi`=b.`id_transaksi`  join barang as c on b.`id_barang`=c.`id_barang` WHERE a.`id_bagian`='Shtl2' group by a.`id_transaksi` ORDER BY a.`tgl_keluar` desc";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function simpan_barang_keluar($data)
	{
		$this->db->insert('barang_keluar', $data);
	}
	public function simpan_stok_barang_kel($data)
	{
		$this->db->insert('stok_barang', $data);
	}
	public function simpan_dtl_barang_kel($data)
	{
		$this->db->insert('dtl_barang_keluar', $data);
	}

	// public function edit_stok_barang($id, $data)
	// {
	// 	$this->db->where('id_transaksi', $id);
	// 	$this->db->update('stok_barang', $data);
	// }

	// function hapus_transaksi($id_transaski, $reverse_stok)
	// {
	// 	if($reverse_stok){
	// 		$loop = $this->db
	// 			->select('id_barang, stok')
	// 			->where('id_trans_msk', $id_transaski)
	// 			->get('dtl_barang_keluar');

	// 		foreach($loop->result() as $b)
	// 		{
	// 			$sql = "
	// 				UPDATE `stok_barang` SET `stok` = `stok` + ".$b->stok." 
	// 				WHERE `id_barang` = '".$b->id_barang."' 
	// 			";

	// 			$this->db->query($sql);
	// 		}
	// 	}

	// 	// $this->db->where('id_penjualan_m', $id_transaski)->delete('pj_penjualan_detail');
	// 	// return $this->db
	// 	// 	->where('id_penjualan_m', $id_transaski)
	// 	// 	->delete('pj_penjualan_master');
	// }

	public function delete_barang_keluar($id)
	{
		$this->db->where('id_transaksi', $id)
		->delete('barang_keluar');
	}

	public function delete_dtl_stok_barang($id)
	{
		$this->db->where('id_transaksi', $id)
		->delete('dtl_barang_keluar');
	}

	// perhitungan barang keluar
	public function jmlh_stok($id_barang)
	{
		$sql = "SELECT SUM(stok) as stok from stok_barang where id_barang = '$id_barang'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function stok_urut_tgl($id_barang)
	{
		$sql = "SELECT * from stok_barang where id_barang = '$id_barang' AND stok > 0 ORDER by tanggal ASC";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function update_stok_barang($id_barang,$stok_update,$out,$tgl)
	{
		$sql = "UPDATE stok_barang SET stok = '$stok_update', stok_out = '$out' WHERE id_barang = '$id_barang' AND tanggal = '$tgl'";
		$data = $this->db->query($sql);
		return $data->result();
	}


	// FUNGSI GET
	//===========================================================================
	public function get_idbarang()
	{
		$this->db->select('*');
		$this->db->order_by('id_barang', 'asc');
		$this->db->from('barang');
		$this->db->where("id_bagian", "Shtl2");
		return $this->db->get('');
	}

	public function get_cek_ketersedian()
	{
		$this->db->select('id_barang,sum(stok) as stok');
		$this->db->from('stok_barang');
		$this->db->group_by('id_barang');
		$query = $this->db->get(); 
        return $query->result();
	}

	public function get_idmesin()
	{
		$this->db->select('*');
		$this->db->order_by('id_mesin', 'asc');
		$this->db->from('mesin');
		$this->db->where("id_bagian", "Shtl2");
		return $this->db->get('');
	}

	public function get_idkagrup()
	{
		$this->db->select('*');
		$this->db->order_by('id_kagrup', 'asc');
		$this->db->from('kagrup');
		$this->db->where("id_bagian", "Shtl2");
		return $this->db->get('');
	}

	public function get_idmtc()
	{
		$this->db->select('*');
		$this->db->order_by('id_mtc', 'asc');
		$this->db->from('mtc');
		$this->db->where("id_bagian", "Shtl2");
		return $this->db->get('');
	}

	public function get_idfungsi()
	{
		$this->db->select('*');
		$this->db->order_by('id_fungsi', 'asc');
		$this->db->from('fungsi');
		$this->db->where("id_bagian", "Shtl2");
		return $this->db->get('');
	}

	public function get_idjenis()
	{
		$this->db->select('*');
		$this->db->order_by('id_jenis', 'asc');
		$this->db->from('jenis');
		$this->db->where("id_bagian", "Shtl2");
		return $this->db->get('');
	}

	// FUNGSI AUTO NUMBER
	//===========================================================================
	function id_barang_masuk()  
	{   
		$this->db->select('RIGHT(barang_masuk.id_transaksi, 8) as kode', FALSE);  
		$this->db->order_by('id_transaksi','DESC');   $this->db->limit(1); 
		$query = $this->db->get('barang_masuk'); 
			 
			if($query->num_rows() <> 0){ 
				$data = $query->row();   
			    $kode = intval($data->kode) + 1; 
			}else{ 
			    $kode = 1; 
			} 
			 $kodemax = str_pad($kode, 8, "0", STR_PAD_LEFT);   $kodejadi = "IN".$kodemax; 
			 
 		 return $kodejadi; 
  	}

	function id_barang_keluar()  
	{   
		$this->db->select('RIGHT(barang_keluar.id_transaksi, 8) as kode', FALSE);  
		$this->db->order_by('id_transaksi','DESC');   $this->db->limit(1); 
		$query = $this->db->get('barang_keluar'); 
			 
			if($query->num_rows() <> 0){ 
				$data = $query->row();   
			    $kode = intval($data->kode) + 1; 
			}else{ 
			    $kode = 1; 
			} 
			 $kodemax = str_pad($kode, 8, "0", STR_PAD_LEFT);   $kodejadi = "OUT".$kodemax; 
			 
 		 return $kodejadi; 
  	}
}