<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kagrup extends CI_Controller {

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

	// kagrup
	// =====================================================================
	// tampilan data kagrup
	public function view_kagrup()
	{
		$data['isi'] = $this->M_shuttle3->view_kagrup();
		$h = $this->load->view('shuttle3/home_shuttle3', $data);
		$c['content'] = $this->load->view('shuttle3/kagrup/view', $h);
	}

	// Form tambah kagrup
	public function tambah_kagrup()
	{
		$h = $this->load->view('shuttle3/home_shuttle3');
		$c['content'] = $this->load->view('shuttle3/kagrup/tambah', $h);
		$this->load->view('shuttle3/home_shuttle3', $c);
	}

	// Fungsi Insert kagrup
	public function kagrup_tambah()
	{
		$cek = $this->db->query("SELECT * FROM kagrup where id_kagrup='".$this->input->post('id_kagrup',TRUE)."'")->num_rows();
		if($cek <= 0){
			$data = array(  'id_kagrup' => $this->input->post('id_kagrup', TRUE),
				'nama_kagrup' => $this->input->post('nama_kagrup', TRUE),
				'id_bagian' => $this->input->post('id_bagian', TRUE)
			);
			$this->M_shuttle3->simpan_kagrup($data);
			redirect('shuttle3/kagrup/view_kagrup','refresh');
		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf Kode Kagrup Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('shuttle3/kagrup/tambah_kagrup/').'")';
			echo '</script>';
		}
	}

	// Fungsi Delete kagrup
	public function kagrup_hapus($id)
	{
		$this->M_shuttle3->delete_kagrup($id);
		redirect('shuttle3/kagrup/view_kagrup','refresh');
	}

	// fungsi form edit data kagrup
	public function edit_kagrup($id='')
	{	
		$data['ubah_data'] = $this->M_shuttle3->view_edit_kagrup($id);		
		$c['content'] = $this->load->view('shuttle3/kagrup/edit', $data);
		$this->load->view('shuttle3/home_shuttle3', $c);
	}
	// fungsi ubah kagrup
	public function kagrup_edit($id)
	{
		$data = array(	'id_kagrup' => $this->input->post('id_kagrup'),
			'nama_kagrup' => $this->input->post('nama_kagrup'),
			 'id_bagian' => $this->input->post('id_bagian')
		);
		$this->M_shuttle3->edit_kagrup($id,$data);
		redirect('shuttle3/kagrup/view_kagrup', 'refresh');
	}
}
