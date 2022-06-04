<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mesin extends CI_Controller {

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

	// Mesin
	// =====================================================================
	// tampilan data Mesin
	public function view_mesin()
	{
		$data['isi'] = $this->M_shuttle2->view_mesin();
		$h = $this->load->view('shuttle2/home_shuttle2', $data);
		$c['content'] = $this->load->view('shuttle2/mesin/view', $h);
	}

	// Form tambah mesin
	public function tambah_mesin()
	{
		$h = $this->load->view('shuttle2/home_shuttle2');
		$c['content'] = $this->load->view('shuttle2/mesin/tambah', $h);
		$this->load->view('shuttle2/home_shuttle2', $c);
	}

	// Fungsi Insert mesin
	public function mesin_tambah()
	{
		$cek = $this->db->query("SELECT * FROM mesin where id_mesin='".$this->input->post('id_mesin',TRUE)."'")->num_rows();
		if($cek <= 0){
			$data = array(  'id_mesin' => $this->input->post('id_mesin', TRUE),
				'zona' => $this->input->post('zona', TRUE),
				'id_bagian' => $this->input->post('id_bagian', TRUE)
			);
			$this->M_shuttle2->simpan_mesin($data);
			redirect('shuttle2/mesin/view_mesin','refresh');
		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf Kode Mesin Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('shuttle2/mesin/tambah_mesin/').'")';
			echo '</script>';
		}
	}

	// Fungsi Delete mesin
	public function mesin_hapus($id)
	{
		$this->M_shuttle2->delete_mesin($id);
		redirect('shuttle2/mesin/view_mesin','refresh');
	}

	// fungsi form edit data mesin
	public function edit_mesin($id='')
	{	
		$data['ubah_data'] = $this->M_shuttle2->view_edit_mesin($id);		
		$c['content'] = $this->load->view('shuttle2/mesin/edit', $data);
		$this->load->view('shuttle2/home_shuttle2', $c);
	}
	// fungsi ubah mesin
	public function mesin_edit($id)
	{
		$data = array(	'id_mesin' => $this->input->post('id_mesin'),
			'zona' => $this->input->post('zona'),
			'id_bagian' => $this->input->post('id_bagian')
		);
		$this->M_shuttle2->edit_mesin($id,$data);
		redirect('shuttle2/mesin/view_mesin', 'refresh');
	}
}
