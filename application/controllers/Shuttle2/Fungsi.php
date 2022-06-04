<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fungsi extends CI_Controller {

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

	// fungsi
	// =====================================================================
	// tampilan data fungsi
	public function view_fungsi()
	{
		$data['isi'] = $this->M_shuttle2->view_fungsi();
		$h = $this->load->view('shuttle2/home_shuttle2', $data);
		$c['content'] = $this->load->view('shuttle2/fungsi/view', $h);
	}

	// Form tambah fungsi
	public function tambah_fungsi()
	{
		$h = $this->load->view('shuttle2/home_shuttle2');
		$c['content'] = $this->load->view('shuttle2/fungsi/tambah', $h);
		$this->load->view('shuttle2/home_shuttle2', $c);
	}

	// Fungsi Insert fungsi
	public function fungsi_tambah()
	{
		$cek = $this->db->query("SELECT * FROM fungsi where id_fungsi='".$this->input->post('id_fungsi',TRUE)."' AND id_bagian='".$this->input->post('id_bagian',TRUE)."'")->num_rows();
		if($cek <= 0){
			$data = array(  'id_fungsi' => $this->input->post('id_fungsi', TRUE),
				'fungsi' => $this->input->post('fungsi', TRUE),
				'id_bagian' => $this->input->post('id_bagian', TRUE)
			);
			$this->M_shuttle2->simpan_fungsi($data);
			redirect('shuttle2/fungsi/view_fungsi','refresh');
		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf Kode fungsi Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('shuttle2/fungsi/tambah_fungsi/').'")';
			echo '</script>';
		}
	}

	// Fungsi Delete fungsi
	public function fungsi_hapus($id)
	{
		$this->M_shuttle2->delete_fungsi($id);
		redirect('shuttle2/fungsi/view_fungsi','refresh');
	}

	// fungsi form edit data fungsi
	public function edit_fungsi($id='')
	{	
		$data['ubah_data'] = $this->M_shuttle2->view_edit_fungsi($id);		
		$c['content'] = $this->load->view('shuttle2/fungsi/edit', $data);
		$this->load->view('shuttle2/home_shuttle2', $c);
	}
	// fungsi ubah fungsi
	public function fungsi_edit($id)
	{
		$data = array(	'id_fungsi' => $this->input->post('id_fungsi'),
			'fungsi' => $this->input->post('fungsi')
		);
		$this->M_shuttle2->edit_fungsi($id,$data);
		redirect('shuttle2/fungsi/view_fungsi', 'refresh');
	}
}
