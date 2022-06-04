<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jenis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','file'));
		$this->load->model('M_shuttle3');
	}
	// Tampilan Halaman Awal Shuttle 2
	public function index()
	{
		$c['content'] = $this->load->view('shuttle3/content');
		$this->load->view('shuttle3/home_shuttle3',$c);
	}

	// jenis
	// =====================================================================
	// tampilan data jenis
	public function view_jenis()
	{
		$data['isi'] = $this->M_shuttle3->view_jenis();
		$h = $this->load->view('shuttle3/home_shuttle3', $data);
		$c['content'] = $this->load->view('shuttle3/jenis/view', $h);
	}

	// Form tambah jenis
	public function tambah_jenis()
	{
		$h = $this->load->view('shuttle3/home_shuttle3');
		$c['content'] = $this->load->view('shuttle3/jenis/tambah', $h);
		$this->load->view('shuttle3/home_shuttle3', $c);
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
			$this->M_shuttle3->simpan_jenis($data);
			redirect('shuttle3/jenis/view_jenis','refresh');
		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf Kode jenis Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('shuttle3/jenis/tambah_jenis/').'")';
			echo '</script>';
		}
	}

	// jenis Delete jenis
	public function jenis_hapus($id)
	{
		$this->M_shuttle3->delete_jenis($id);
		redirect('shuttle3/jenis/view_jenis','refresh');
	}

	// jenis form edit data jenis
	public function edit_jenis($id='')
	{	
		$data['ubah_data'] = $this->M_shuttle3->view_edit_jenis($id);		
		$c['content'] = $this->load->view('shuttle3/jenis/edit', $data);
		$this->load->view('shuttle3/home_shuttle3', $c);
	}
	// jenis ubah jenis
	public function jenis_edit($id)
	{
		$data = array(	'id_jenis' => $this->input->post('id_jenis'),
			'jenis' => $this->input->post('jenis')
		);
		$this->M_shuttle3->edit_jenis($id,$data);
		redirect('shuttle3/jenis/view_jenis', 'refresh');
	}
}
