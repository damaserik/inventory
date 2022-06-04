<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mesin extends CI_Controller {

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

	// Mesin
	// =====================================================================
	// tampilan data Mesin
	public function view_mesin()
	{
		$data['isi'] = $this->M_shuttle3->view_mesin();
		$h = $this->load->view('shuttle3/home_shuttle3', $data);
		$c['content'] = $this->load->view('shuttle3/mesin/view', $h);
	}

	// Form tambah mesin
	public function tambah_mesin()
	{
		$h = $this->load->view('shuttle3/home_shuttle3');
		$c['content'] = $this->load->view('shuttle3/mesin/tambah', $h);
		$this->load->view('shuttle3/home_shuttle3', $c);
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
			$this->M_shuttle3->simpan_mesin($data);
			redirect('shuttle3/mesin/view_mesin','refresh');
		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf Kode Mesin Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('shuttle3/mesin/tambah_mesin/').'")';
			echo '</script>';
		}
	}

	// Fungsi Delete mesin
	public function mesin_hapus($id)
	{
		$this->M_shuttle3->delete_mesin($id);
		redirect('shuttle3/mesin/view_mesin','refresh');
	}

	// fungsi form edit data mesin
	public function edit_mesin($id='')
	{	
		$data['ubah_data'] = $this->M_shuttle3->view_edit_mesin($id);		
		$c['content'] = $this->load->view('shuttle3/mesin/edit', $data);
		$this->load->view('shuttle3/home_shuttle3', $c);
	}
	// fungsi ubah mesin
	public function mesin_edit($id)
	{
		$data = array(	'id_mesin' => $this->input->post('id_mesin'),
			'zona' => $this->input->post('zona'),
			'id_bagian' => $this->input->post('id_bagian')
		);
		$this->M_shuttle3->edit_mesin($id,$data);
		redirect('shuttle3/mesin/view_mesin', 'refresh');
	}
}
