<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang extends CI_Controller {

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

	// Barang
	// =====================================================================
	// tampilan data barang
	public function view_barang()
	{		

		$data['isi'] = $this->M_ajl->view_barang();
		$h = $this->load->view('ajl/home_ajl', $data);
		$c['content'] = $this->load->view('ajl/barang/view', $h);
	}

	// Form tambah barang
	public function tambah_barang()
	{	
		$data['get_jens'] = $this->M_ajl->get_idjenis();
		$data['get_fung'] = $this->M_ajl->get_idfungsi();
		$h = $this->load->view('ajl/home_ajl',$data);
		$c['content'] = $this->load->view('ajl/barang/tambah', $h);
		$this->load->view('ajl/home_ajl', $c);
	}

	// Fungsi Insert Barang
	public function barang_tambah()
	{
		$cek = $this->db->query("SELECT * FROM barang where id_barang='".$this->input->post('id_barang',TRUE)."' AND id_bagian='".$this->input->post('id_bagian',TRUE)."'")->num_rows();
		if($cek <= 0){
			$data = array(  'id_barang' => $this->input->post('id_barang', TRUE),
				'nama_barang' => $this->input->post('nama_barang', TRUE),
				'id_jenis' => $this->input->post('id_jenis', TRUE),
				'id_fungsi' => $this->input->post('id_fungsi', TRUE),
				'id_bagian' => $this->input->post('id_bagian', TRUE),
				'status_barang' => $this->input->post('status_barang', TRUE)
			);
			$this->M_ajl->simpan_barang($data);
			redirect('ajl/barang/view_barang','refresh');
		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf  Barang Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('ajl/barang/tambah_barang/').'")';
			echo '</script>';
		}
	}

	// Fungsi Delete Barang
	public function barang_hapus($id)
	{
		$this->M_ajl->delete_barang($id);
		redirect('ajl/barang/view_barang','refresh');
	}

	// fungsi form edit data barang
	public function edit_barang($id='')
	{	
		$data['get_jens'] = $this->M_ajl->get_idjenis();
		$data['get_fung'] = $this->M_ajl->get_idfungsi();
		$data['ubah_data'] = $this->M_ajl->view_edit_barang($id);		
		$c['content'] = $this->load->view('ajl/barang/edit', $data);
		$this->load->view('ajl/home_ajl', $c);
	}
	
	// fungsi ubah barang
	public function barang_edit($id)
	{
		$data = array(	'id_barang' => $this->input->post('id_barang'),
			'nama_barang' => $this->input->post('nama_barang'),
			'id_jenis' => $this->input->post('id_jenis'),
			'id_fungsi' => $this->input->post('id_fungsi'),
			'id_bagian' => $this->input->post('id_bagian'),
			'status_barang' => $this->input->post('status_barang')
		);
		$this->M_ajl->edit_barang($id,$data);
		redirect('ajl/barang/view_barang', 'refresh');
	}
}
