<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stok extends CI_Controller {

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

	// stok
	// =====================================================================
	// tampilan data stok
	public function view_stok()
	{
		$data['isi'] = $this->M_ajl->view_stok();
		$h = $this->load->view('ajl/home_ajl', $data);
		$c['content'] = $this->load->view('ajl/stok/view', $h);
	}

	// // Form tambah stok
	// public function tambah_stok()
	// {
	// 	$h = $this->load->view('ajl/home_ajl');
	// 	$c['content'] = $this->load->view('ajl/stok/tambah', $h);
	// 	$this->load->view('ajl/home_ajl', $c);
	// }

	// // Fungsi Insert stok
	// public function stok_tambah()
	// {
	// 	$cek = $this->db->query("SELECT * FROM stok where id_stok='".$this->input->post('id_stok',TRUE)."'")->num_rows();
	// 	if($cek <= 0){
	// 		$data = array(  'id_stok' => $this->input->post('id_stok', TRUE),
	// 			'nama_stok' => $this->input->post('nama_stok', TRUE),
	// 			'satuan' => $this->input->post('satuan', TRUE),
	// 			'id_bagian' => $this->input->post('id_bagian', TRUE)
	// 		);
	// 		$this->M_ajl->simpan_stok($data);
	// 		redirect('ajl/stok/view_stok','refresh');
	// 	}else{
	// 		echo '<script language="javascript">';
	// 		echo 'alert("Maaf Kode stok Sudah Ada")';
	// 		echo '</script>';
	// 		echo '<script language="javascript">';
	// 		echo 'window.location=("'.site_url('ajl/stok/tambah_stok/').'")';
	// 		echo '</script>';
	// 	}
	// }

	// // Fungsi Delete stok
	// public function stok_hapus($id)
	// {
	// 	$this->M_ajl->delete_stok($id);
	// 	redirect('ajl/stok/view_stok','refresh');
	// }

	// // fungsi form edit data stok
	// public function edit_stok($id='')
	// {	
	// 	$data['ubah_data'] = $this->M_ajl->view_edit_stok($id);		
	// 	$c['content'] = $this->load->view('ajl/stok/edit', $data);
	// 	$this->load->view('ajl/home_ajl', $c);
	// }
	// // fungsi ubah stok
	// public function stok_edit($id)
	// {
	// 	$data = array(	'id_stok' => $this->input->post('id_stok'),
	// 		'nama_stok' => $this->input->post('nama_stok'),
	// 		'satuan' => $this->input->post('satuan'),
	// 		'id_bagian' => $this->input->post('id_bagian')
	// 	);
	// 	$this->M_ajl->edit_stok($id,$data);
	// 	redirect('ajl/stok/view_stok', 'refresh');
	// }
}
