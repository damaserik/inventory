<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jenis extends CI_Controller {

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

	// jenis
	// =====================================================================
	// tampilan data jenis
	public function view_jenis()
	{
		$data['isi'] = $this->M_shuttle2->view_jenis();
		$h = $this->load->view('shuttle2/home_shuttle2', $data);
		$c['content'] = $this->load->view('shuttle2/jenis/view', $h);
	}

	// Form tambah jenis
	public function tambah_jenis()
	{
		$h = $this->load->view('shuttle2/home_shuttle2');
		$c['content'] = $this->load->view('shuttle2/jenis/tambah', $h);
		$this->load->view('shuttle2/home_shuttle2', $c);
	}

	// jenis Insert jenis
	public function jenis_tambah()
	{
		$cek = $this->db->query("SELECT * FROM jenis where id_jenis='".$this->input->post('id_jenis',TRUE)."'AND id_bagian='".$this->input->post('id_bagian',TRUE)."'")->num_rows();
		if($cek <= 0){
			$data = array(  'id_jenis' => $this->input->post('id_jenis', TRUE),
				'jenis' => $this->input->post('jenis', TRUE),
				'id_bagian' => $this->input->post('id_bagian', TRUE)
			);
			$this->M_shuttle2->simpan_jenis($data);
			redirect('shuttle2/jenis/view_jenis','refresh');
		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf Kode jenis Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('shuttle2/jenis/tambah_jenis/').'")';
			echo '</script>';
		}
	}

	// jenis Delete jenis
	public function jenis_hapus($id)
	{
		$this->M_shuttle2->delete_jenis($id);
		redirect('shuttle2/jenis/view_jenis','refresh');
	}

	// jenis form edit data jenis
	public function edit_jenis($id='')
	{	
		$data['ubah_data'] = $this->M_shuttle2->view_edit_jenis($id);		
		$c['content'] = $this->load->view('shuttle2/jenis/edit', $data);
		$this->load->view('shuttle2/home_shuttle2', $c);
	}
	// jenis ubah jenis
	public function jenis_edit($id)
	{
		$data = array(	'id_jenis' => $this->input->post('id_jenis'),
			'jenis' => $this->input->post('jenis')
		);
		$this->M_shuttle2->edit_jenis($id,$data);
		redirect('shuttle2/jenis/view_jenis', 'refresh');
	}
}
