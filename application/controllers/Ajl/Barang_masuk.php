<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang_masuk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','file'));
		$this->load->model('M_ajl');
	}
	// Tampilan Halaman Awal Shuttle 2
	public function index()
	{
		$c['content'] = $this->load->view('ajl/content');
		$this->load->view('ajl/home_ajl',$c);
	}

	// barang_masuk
	// =====================================================================
	// tampilan data barang_masuk
	public function view_barang_masuk()
	{
		$data['isi'] = $this->M_ajl->view_barang_masuk();
		$h = $this->load->view('ajl/home_ajl', $data);
		$c['content'] = $this->load->view('ajl/barang_masuk/view', $h);
	}

	// Form tambah barang_masuk
	public function tambah_barang_masuk()
	{
		$data['kode'] = $this->M_ajl->id_barang_masuk();
		$data['get_jns'] = $this->M_ajl->get_idbarang();
		$h = $this->load->view('ajl/home_ajl', $data);
		$c['content'] = $this->load->view('ajl/barang_masuk/tambah', $h);
	}

	// Fungsi Insert barang_masuk
	public function barang_masuk_tambah()
	{
		$cek = $this->db->query("SELECT barang_masuk.`id_transaksi`,tgl_masuk,barang.`nama_barang`,stok_masuk,stok_barang.`harga`,total_harga_masuk,stok_barang.`stok` FROM barang_masuk,stok_barang,barang WHERE barang_masuk.`id_transaksi`=stok_barang.`id_transaksi` AND stok_barang.`id_barang`=barang.`id_barang` AND barang_masuk.`id_transaksi`='".$this->input->post('barang_masuk.`id_transaksi`',TRUE)."'")->num_rows();
		if($cek <= 0){

			$data1 = array(  'id_transaksi' => $this->input->post('id_transaksi', TRUE),
				'tgl_masuk' => $this->input->post('tgl_masuk', TRUE),
				'stok_masuk' => $this->input->post('stok_masuk', TRUE),
				'total_harga_masuk' => $this->input->post('total_harga_masuk', TRUE),
				'penanggung_jawab' => $this->input->post('penanggung_jawab', TRUE),
				'id_bagian' => $this->input->post('id_bagian', TRUE)
			);
			$this->M_ajl->simpan_barang_masuk($data1);
						
			$data2 = array(  'tanggal' => $this->input->post('tgl_masuk', TRUE),
				'id_transaksi' => $this->input->post('id_transaksi', TRUE),
				'id_barang' => $this->input->post('id_barang', TRUE),
				'stok' => $this->input->post('stok_masuk', TRUE),
				'harga' => $this->input->post('harga', TRUE),
				'id_bagian' => $this->input->post('id_bagian', TRUE)
			);
			$this->M_ajl->simpan_stok_barang($data2);
			
			redirect('ajl/barang_masuk/view_barang_masuk','refresh');
		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf ID Transaksi Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('ajl/barang_masuk/tambah_barang_masuk/').'")';
			echo '</script>';
		}
	}

	// Fungsi Delete barang_masuk
	public function barang_masuk_hapus($id)
	{
		$this->M_ajl->delete_barang_masuk($id);
		$this->M_ajl->delete_stok_barang($id);
		redirect('ajl/barang_masuk/view_barang_masuk','refresh');
	}

	// fungsi form edit data barang_masuk
	public function edit_barang_masuk($id='')
	{	
		$data['get_jns'] = $this->M_ajl->get_idbarang();
		$data['ubah_data'] = $this->M_ajl->view_edit_barang_masuk($id);		
		$c['content'] = $this->load->view('ajl/barang_masuk/edit', $data);
		$this->load->view('ajl/home_ajl', $c);
	}
	// fungsi ubah barang_masuk
	public function barang_masuk_edit($id)
	{
			$data1 = array(  'id_transaksi' => $this->input->post('id_transaksi', TRUE),
				'tgl_masuk' => $this->input->post('tgl_masuk', TRUE),
				'stok_masuk' => $this->input->post('stok_masuk', TRUE),
				'total_harga_masuk' => $this->input->post('total_harga_masuk', TRUE),
				'penanggung_jawab' => $this->input->post('penanggung_jawab', TRUE),
				'id_bagian' => $this->input->post('id_bagian', TRUE)
			);
			$this->M_ajl->edit_barang_masuk($id,$data1);
						
									
			$data2 = array(  'tanggal' => $this->input->post('tgl_masuk', TRUE),
				'id_transaksi' => $this->input->post('id_transaksi', TRUE),
				'id_barang' => $this->input->post('id_barang', TRUE),
				'stok' => $this->input->post('stok_masuk', TRUE),
				'harga' => $this->input->post('harga', TRUE),
				'id_bagian' => $this->input->post('id_bagian', TRUE)
			);
			$this->M_ajl->edit_stok_barang($id,$data2);
			

		redirect('ajl/barang_masuk/view_barang_masuk', 'refresh');
	}

		
	//fungsi autocomplete

	public function search()
	{
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(5);
// cari di database
		$data = $this->db->select('a.nama_barang as nm, sum(b.stok) as stok, b.id_barang as id_barang, b.harga as harga, b.id_transaksi as id_trans_msk')
						  ->from('barang as a')
						  ->join('stok_barang as b', 'a.id_barang = b.id_barang')
						  ->where("a.id_bagian","Ajl")
						  ->like('a.nama_barang',$keyword)
						  ->group_by('b.id_barang')
						  ->get();

		// $data = $this->db->from('barang')->like('nama_barang',$keyword)->get();	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->nm,
				'id'	=>$row->id_barang,
				'sto'	=>$row->stok,
				'hrg'	=>$row->harga,
				'id_trm' =>$row->id_trans_msk
			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}
}
