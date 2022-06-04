<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kagrup extends CI_Controller {

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

	// kagrup
	// =====================================================================
	// tampilan data kagrup
	public function view_kagrup()
	{
		$data['isi'] = $this->M_ajl->view_kagrup();
		$h = $this->load->view('ajl/home_ajl', $data);
		$c['content'] = $this->load->view('ajl/kagrup/view', $h);
	}

	// Form tambah kagrup
	public function tambah_kagrup()
	{
		$h = $this->load->view('ajl/home_ajl');
		$c['content'] = $this->load->view('ajl/kagrup/tambah', $h);
		$this->load->view('ajl/home_ajl', $c);
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
			$this->M_ajl->simpan_kagrup($data);
			redirect('ajl/kagrup/view_kagrup','refresh');
		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf Kode Kagrup Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('ajl/kagrup/tambah_kagrup/').'")';
			echo '</script>';
		}
	}

	// Fungsi Delete kagrup
	public function kagrup_hapus($id)
	{
		$this->M_ajl->delete_kagrup($id);
		redirect('ajl/kagrup/view_kagrup','refresh');
	}

	// fungsi form edit data kagrup
	public function edit_kagrup($id='')
	{	
		$data['ubah_data'] = $this->M_ajl->view_edit_kagrup($id);		
		$c['content'] = $this->load->view('ajl/kagrup/edit', $data);
		$this->load->view('ajl/home_ajl', $c);
	}
	// fungsi ubah kagrup
	public function kagrup_edit($id)
	{
		$data = array(	'id_kagrup' => $this->input->post('id_kagrup'),
			'nama_kagrup' => $this->input->post('nama_kagrup'),
			 'id_bagian' => $this->input->post('id_bagian')
		);
		$this->M_ajl->edit_kagrup($id,$data);
		redirect('ajl/kagrup/view_kagrup', 'refresh');
	}
}
