<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bagian extends CI_Controller {

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

	// Bagian
	// =====================================================================
	// tampilan data Bagian
	public function view_bagian()
	{
		$data['isi'] = $this->M_shuttle2->view_bagian();
		$h = $this->load->view('shuttle2/home_shuttle2', $data);
		$c['content'] = $this->load->view('shuttle2/bagian/view', $h);
	}

	// Form tambah Bagian
	public function tambah_bagian()
	{
		$h = $this->load->view('shuttle2/home_shuttle2');
		$c['content'] = $this->load->view('shuttle2/bagian/tambah', $h);
		$this->load->view('shuttle2/home_shuttle2', $c);
	}

	// Fungsi Insert Bagian
	public function bagian_tambah()
	{
		$cek = $this->db->query("SELECT * FROM bagian where id_bagian='".$this->input->post('id_bagian',TRUE)."'")->num_rows();
		if($cek <= 0){
			$data = array(  'id_bagian' => $this->input->post('id_bagian', TRUE),
				'nama_bagian' => $this->input->post('nama_bagian', TRUE)
			);
			$this->M_shuttle2->simpan_bagian($data);
			redirect('shuttle2/bagian/view_bagian','refresh');
		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf Kode Bagian Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('shuttle2/bagian/tambah_bagian/').'")';
			echo '</script>';
		}
	}

	// Fungsi Delete Bagian
	public function bagian_hapus($id)
	{
		$this->M_shuttle2->delete_bagian($id);
		redirect('shuttle2/bagian/view_bagian','refresh');
	}

	// fungsi form edit data Bagian
	public function edit_bagian($id='')
	{	
		$data['ubah_data'] = $this->M_shuttle2->view_edit_bagian($id);		
		$c['content'] = $this->load->view('shuttle2/bagian/edit', $data);
		$this->load->view('shuttle2/home_shuttle2', $c);
	}
	// fungsi ubah Bagian
	public function bagian_edit($id)
	{
		$data = array(	'id_bagian' => $this->input->post('id_bagian'),
			'nama_bagian' => $this->input->post('nama_bagian')
			);
		$this->M_shuttle2->edit_bagian($id,$data);
		redirect('shuttle2/bagian/view_bagian', 'refresh');
	}

}
