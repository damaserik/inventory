<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang_keluar extends CI_Controller {

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

	// barang_keluar
	// =====================================================================
	// tampilan data barang_keluar
	public function view_barang_keluar()
	{
		$data['isi'] = $this->M_ajl->view_barang_keluar();
		$h = $this->load->view('ajl/home_ajl', $data);
		$c['content'] = $this->load->view('ajl/barang_keluar/view', $h);
	}

	// Form tambah barang_keluar
	public function tambah_barang_keluar()
	{
		$data['kode'] = $this->M_ajl->id_barang_keluar();
		$data['get_jns'] = $this->M_ajl->get_idbarang();
		$data['get_msn'] = $this->M_ajl->get_idmesin();
		$data['get_kg'] = $this->M_ajl->get_idkagrup();
		$data['get_mt'] = $this->M_ajl->get_idmtc();
		$h = $this->load->view('ajl/home_ajl', $data);
		$c['content'] = $this->load->view('ajl/barang_keluar/tambah', $h);
	}

	// Fungsi Insert barang_keluar
	public function barang_keluar_tambah()
	{
		$id_barang  = $this->input->post('id_barang');
		$jml_keluar	= $this->input->post('stok_keluar');
		$id_transaksi = $this->input->post('id_transaksi', TRUE);
		$ketersedian_stok = $this->M_ajl->get_cek_ketersedian();

		foreach ($ketersedian_stok as $row) {
				$barang 	= $row->id_barang;
				$jml_stok 	= $row->stok;
				if($id_barang == $barang && $jml_keluar>$jml_stok) {	
				echo '<script language="javascript">';
				echo 'alert("Maaf Stok Tidak Cukup")';
				echo '</script>';
				redirect('ajl/barang_keluar/tambah_barang_keluar/','refresh');
				}	
		}
		
		$stok_all = $this->M_ajl->jmlh_stok($id_barang);
		$fifo = $this->M_ajl->stok_urut_tgl($id_barang);
			
		$sql = "SELECT id_transaksi,tanggal,stok,id_barang, harga from stok_barang where id_barang = '$id_barang' AND stok > 0 ORDER by tanggal ASC";
		$data = $this->db->query($sql);
		$result = $data->result();

			foreach($result as $row) {
				$tgl 	= $row->tanggal;
				$stok	= $row->stok;
				$harga = $row->harga;
				$id_trans = $row->id_transaksi;

				if($jml_keluar > 0){
					$tmp = $jml_keluar;
					$jml_keluar = $jml_keluar - $stok;

					if($jml_keluar > 0){
						$update_stok = 0;
						$update_tot  = $tmp - $jml_keluar;
					}else{
						$update_stok = $stok - $tmp;
						$update_tot = $tmp;
					}
					$sql1 = "UPDATE stok_barang SET stok = '$update_stok', stok_out = '$update_tot' + stok_out WHERE id_barang = '$id_barang' AND id_bagian='Ajl' AND tanggal = '$tgl'";
					$data1 = $this->db->query($sql1);

					$subjum = $update_tot*$harga;					

					$data3 = array(  'id_transaksi' => $this->input->post('id_transaksi', TRUE),
						'id_barang' => $this->input->post('id_barang', TRUE),
						'tgl_keluar' => $this->input->post('tgl_keluar', TRUE),
						'stok' => $update_tot,
						'harga' => $harga,
						'sub_harga' => $subjum,
						'id_trans_msk' => $id_trans,
						'tgl_msk' => $tgl

					);
					$this->M_ajl->simpan_dtl_barang_kel($data3);

					/*$this->M_ajl->update_stok_barang($id_barang,$update_stok,$update_tot,$tgl);*/
				}

			}
			$sql11 = "SELECT sum(sub_harga) as total_harga from dtl_barang_keluar where id_barang = '$id_barang' and id_transaksi = '$id_transaksi' group by id_barang";
			$data11 = $this->db->query($sql11);
			$result = $data11->result();
			foreach ($result as $row) {
				$toal_harga = $row->total_harga;
			}
			// redirect('ajl/barang_keluar/view_barang_keluar','refresh');

			$data1 = array(  'id_transaksi' => $this->input->post('id_transaksi', TRUE),
				'tgl_keluar' => $this->input->post('tgl_keluar', TRUE),
				'stok_keluar' => $this->input->post('stok_keluar', TRUE),
				'total_harga_keluar' => $toal_harga,
				'id_bagian' => $this->input->post('id_bagian', TRUE),
				'id_mesin' => $this->input->post('id_mesin', TRUE),
				'id_kagrup' => $this->input->post('id_kagrup', TRUE),
				'id_mtc' => $this->input->post('id_mtc', TRUE)
			);
			$this->M_ajl->simpan_barang_keluar($data1);
			redirect('ajl/barang_keluar/view_barang_keluar','refresh');
	}

	// Fungsi Delete barang_keluar
	public function barang_keluar_hapus($id_transaski)
	{
		// $this->M_ajl->delete_barang_keluar($id);
		// $this->M_ajl->delete_stok_barang($id);
		// redirect('ajl/barang_keluar/view_barang_keluar','refresh');
	}

	function hapus_brngkeluar($id)
	{
		$loop = $this->db
			-> select('id_trans_msk, stok, id_barang, tgl_msk')
			->where('id_transaksi',$id)
			->get('dtl_barang_keluar');
		foreach($loop->result() as $row){
		 $sql = "update stok_barang set stok = stok + ".$row->stok.", stok_out = stok_out - ".$row->stok."
			where id_transaksi= '".$row->id_trans_msk."' and id_barang = '".$row->id_barang."' and tanggal = '".$row->tgl_msk."'";		
			$this->db->query($sql);
		}
		$this->M_ajl->delete_barang_keluar($id);
		$this->M_ajl->delete_dtl_stok_barang($id);
		redirect('ajl/barang_keluar/view_barang_keluar','refresh');
	}



	// // fungsi form edit data barang_keluar
	// public function edit_barang_keluar($id='')
	// {	
	// 	$data['get_jns'] = $this->M_ajl->get_idbarang();
	// 	$data['ubah_data'] = $this->M_ajl->view_edit_barang_keluar($id);		
	// 	$c['content'] = $this->load->view('ajl/barang_keluar/edit', $data);
	// 	$this->load->view('ajl/home_ajl', $c);
	// } 
	// // fungsi ubah barang_keluar
	// public function barang_keluar_edit($id)
	// {
	// 		$data1 = array(  'id_transaksi' => $this->input->post('id_transaksi', TRUE),
	// 			'tgl_masuk' => $this->input->post('tgl_masuk', TRUE),
	// 			'stok_masuk' => $this->input->post('stok_masuk', TRUE),
	// 			'total_harga_masuk' => $this->input->post('total_harga_masuk', TRUE),
	// 			'penanggung_jawab' => $this->input->post('penanggung_jawab', TRUE),
	// 			'id_bagian' => $this->input->post('id_bagian', TRUE)
	// 		);
	// 		$this->M_ajl->edit_barang_keluar($id,$data1);
						
									
	// 		$data2 = array(  'tanggal' => $this->input->post('tgl_masuk', TRUE),
	// 			'id_transaksi' => $this->input->post('id_transaksi', TRUE),
	// 			'id_barang' => $this->input->post('id_barang', TRUE),
	// 			'stok' => $this->input->post('stok_masuk', TRUE),
	// 			'harga' => $this->input->post('harga', TRUE),
	// 			'id_bagian' => $this->input->post('id_bagian', TRUE)
	// 		);
	// 		$this->M_ajl->edit_stok_barang($id,$data2);
			

	// 	redirect('ajl/barang_keluar/view_barang_keluar', 'refresh');
	// }


}
