<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stok extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','file'));
		$this->load->model('M_shuttle2');
	}
	// Tampilan Halaman Awal Shuttle 2
	public function index()
	{
		$c['content'] = $this->load->view('shuttle2/content');
		$this->load->view('shuttle2/home_shuttle2',$c);
	}

	// stok
	// =====================================================================
	// tampilan data stok
	public function view_stok()
	{
		$data['isi'] = $this->M_shuttle2->view_stok();
		$h = $this->load->view('shuttle2/home_shuttle2', $data);
		$c['content'] = $this->load->view('shuttle2/stok/view', $h);
	}

	// // Form tambah stok
	// public function tambah_stok()
	// {
	// 	$h = $this->load->view('shuttle2/home_shuttle2');
	// 	$c['content'] = $this->load->view('shuttle2/stok/tambah', $h);
	// 	$this->load->view('shuttle2/home_shuttle2', $c);
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
	// 		$this->M_shuttle2->simpan_stok($data);
	// 		redirect('shuttle2/stok/view_stok','refresh');
	// 	}else{
	// 		echo '<script language="javascript">';
	// 		echo 'alert("Maaf Kode stok Sudah Ada")';
	// 		echo '</script>';
	// 		echo '<script language="javascript">';
	// 		echo 'window.location=("'.site_url('shuttle2/stok/tambah_stok/').'")';
	// 		echo '</script>';
	// 	}
	// }

	// // Fungsi Delete stok
	// public function stok_hapus($id)
	// {
	// 	$this->M_shuttle2->delete_stok($id);
	// 	redirect('shuttle2/stok/view_stok','refresh');
	// }

	// // fungsi form edit data stok
	// public function edit_stok($id='')
	// {	
	// 	$data['ubah_data'] = $this->M_shuttle2->view_edit_stok($id);		
	// 	$c['content'] = $this->load->view('shuttle2/stok/edit', $data);
	// 	$this->load->view('shuttle2/home_shuttle2', $c);
	// }
	// // fungsi ubah stok
	// public function stok_edit($id)
	// {
	// 	$data = array(	'id_stok' => $this->input->post('id_stok'),
	// 		'nama_stok' => $this->input->post('nama_stok'),
	// 		'satuan' => $this->input->post('satuan'),
	// 		'id_bagian' => $this->input->post('id_bagian')
	// 	);
	// 	$this->M_shuttle2->edit_stok($id,$data);
	// 	redirect('shuttle2/stok/view_stok', 'refresh');
	// }
}
