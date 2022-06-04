<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mtc extends CI_Controller {

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

	// mtc
	// =====================================================================
	// tampilan data mtc
	public function view_mtc()
	{
		$data['isi'] = $this->M_shuttle3->view_mtc();
		$h = $this->load->view('shuttle3/home_shuttle3', $data);
		$c['content'] = $this->load->view('shuttle3/mtc/view', $h);
	}

	// Form tambah mtc
	public function tambah_mtc()
	{
		$h = $this->load->view('shuttle3/home_shuttle3');
		$c['content'] = $this->load->view('shuttle3/mtc/tambah', $h);
		$this->load->view('shuttle3/home_shuttle3', $c);
	}

	// Fungsi Insert mtc
	public function mtc_tambah()
	{
		$cek = $this->db->query("SELECT * FROM mtc where id_mtc='".$this->input->post('id_mtc',TRUE)."'")->num_rows();
		if($cek <= 0){
			$data = array(  'id_mtc' => $this->input->post('id_mtc', TRUE),
				'nama_mtc' => $this->input->post('nama_mtc', TRUE),
				'id_bagian' => $this->input->post('id_bagian', TRUE)
			);
			$this->M_shuttle3->simpan_mtc($data);
			redirect('shuttle3/mtc/view_mtc','refresh');
		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf Kode Mtc Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('shuttle3/mtc/tambah_mtc/').'")';
			echo '</script>';
		}
	}

	// Fungsi Delete mtc
	public function mtc_hapus($id)
	{
		$this->M_shuttle3->delete_mtc($id);
		redirect('shuttle3/mtc/view_mtc','refresh');
	}

	// fungsi form edit data mtc
	public function edit_mtc($id='')
	{	
		$data['ubah_data'] = $this->M_shuttle3->view_edit_mtc($id);		
		$c['content'] = $this->load->view('shuttle3/mtc/edit', $data);
		$this->load->view('shuttle3/home_shuttle3', $c);
	}
	// fungsi ubah mtc
	public function mtc_edit($id)
	{
		$data = array(	'id_mtc' => $this->input->post('id_mtc'),
			'nama_mtc' => $this->input->post('nama_mtc'),
			'id_bagian' => $this->input->post('id_bagian')
		);
		$this->M_shuttle3->edit_mtc($id,$data);
		redirect('shuttle3/mtc/view_mtc', 'refresh');
	}
}
