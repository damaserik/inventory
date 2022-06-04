<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','file'));
		$this->load->model('M_laporan_shuttle3');
	}
	// Tampilan Halaman Awal Shuttle 2
	public function index()
	{
		$c['content'] = $this->load->view('shuttle3/content');
		$this->load->view('shuttle3/home_shuttle3',$c);
	}

	// Laporan Stok
	// =====================================================================
	public function laporan_stok()
	{
		$h = $this->load->view('shuttle3/home_shuttle3');
		$c['content'] = $this->load->view('shuttle3/laporan/menu_stok', $h);

	}

	public function laporan_view_stok()
	{
		$data['isi'] = $this->M_laporan_shuttle3->laporan_stok_view();
		$h = $this->load->view('shuttle3/home_shuttle3', $data);
		$c['content'] = $this->load->view('shuttle3/laporan/view_stok', $h);

	}

	public function laporan_view_stok_harga()
	{
		$data['isi'] = $this->M_laporan_shuttle3->laporan_stok_harga();
		$h = $this->load->view('shuttle3/home_shuttle3', $data);
		$c['content'] = $this->load->view('shuttle3/laporan/view_stok_harga', $h);

	}

	public function laporan_stok_cetak()
	{
		include_once './assets/cexcel/Classes/PHPExcel.php';
		date_default_timezone_set('Asia/Jakarta');
		$objPHPExcel = new PHPExcel();

		$data  =  $this->M_laporan_shuttle3->laporan_stok_view();
	
		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0);
		$rowCount = 4;
		$rowcount2 = 2;
		
		$objPHPExcel->getSheet(0)->mergeCells('A1:E1');
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "Laporan Stok");
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setName('Times New Roman');
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		
		$objPHPExcel->getSheet(0)->mergeCells('A2:E2');
		$objPHPExcel->getActiveSheet()->SetCellValue('A2', indonesian_date($bulan)." - ".indonesian_date($tahun));
		$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setName('Times New Roman');
		$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setItalic(true);		
		$objPHPExcel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

		// Set Orientation, size and scaling
		$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(true);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);

		$objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount.':'.'E'.$rowCount)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount.':'.'E'.$rowCount)->getFill()->getStartColor()->setARGB('999999');

        //  Border header
        $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount.':'.'E'.$rowCount)->applyFromArray(array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))));        

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ID BARANG");
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "NAMA BARANG");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "NB MASUK");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "NB PAKAI");
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "NB SISA");
		$rowCount++;

		// set datatable 
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id_barang); 
		    $objPHPExcel->getActiveSheet()->setCellValue('B'.$rowCount, $value->nama_barang);
		    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->NB_masuk); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->NB_pakai); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->sisa); 
		    $rowCount++;
		}
		//  Border Data		
		$objPHPExcel->getActiveSheet()->getStyle('A4:E'.($rowCount-1))->applyFromArray(array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))));

		// set autosize
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);     
       

		 
		// set output
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
        sleep(1);
        $filename = 'Laporan_Stok'.date('d-m-Y H-i').'.xlsx';
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        header("Cache-Control: max-age=0");
        ob_clean();
        $objWriter->save("php://output");
        $objPHPExcel->disconnectWorksheets();
		unset($objPHPExcel);
	}


		public function laporan_stok_harga_cetak()
	{
		include_once './assets/cexcel/Classes/PHPExcel.php';
		date_default_timezone_set('Asia/Jakarta');
		$objPHPExcel = new PHPExcel();

		$data  =  $this->M_laporan_shuttle3->laporan_stok_harga();
	
		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0);
		$rowCount = 4;
		$rowcount2 = 2;
		
		$objPHPExcel->getSheet(0)->mergeCells('A1:H1');
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "Laporan Stok & Harga");
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setName('Times New Roman');
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		
		$objPHPExcel->getSheet(0)->mergeCells('A2:H2');
		$objPHPExcel->getActiveSheet()->SetCellValue('A2', indonesian_date($bulan)." - ".indonesian_date($tahun));
		$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setName('Times New Roman');
		$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setItalic(true);		
		$objPHPExcel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

		// Set Orientation, size and scaling
		$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(true);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);

		$objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount.':'.'H'.$rowCount)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount.':'.'H'.$rowCount)->getFill()->getStartColor()->setARGB('999999');

		$objPHPExcel->getActiveSheet()->getStyle('D'.$rowCount)->getNumberFormat()->setFormatCode("_(Rp* #.##0_);_(Rp* (#.##0);_(Rp* "-"_);_(@_)");
       	$objPHPExcel->getActiveSheet()->getStyle('F'.$rowCount)->getNumberFormat()->setFormatCode("_(Rp* #.##0_);_(Rp* (#.##0);_(Rp* "-"_);_(@_)");
		$objPHPExcel->getActiveSheet()->getStyle('H'.$rowCount)->getNumberFormat()->setFormatCode("_(Rp* #.##0_);_(Rp* (#.##0);_(Rp* "-"_);_(@_)");
        //  Border header
        $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount.':'.'H'.$rowCount)->applyFromArray(array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))));        

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ID BARANG");
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "NAMA BARANG");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "NB MASUK");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "HARGA NB MASUK");
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "NB PAKAI");
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "HARGA NB PAKAI");
		$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, "NB SISA");
		$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, "HARGA NB SISA");
		$rowCount++;

		// set datatable 
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id_barang); 
		    $objPHPExcel->getActiveSheet()->setCellValue('B'.$rowCount, $value->nama_barang);
		    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->NB_masuk); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->Harga_NB_masuk); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->NB_pakai); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->Harga_NB_pakai); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->sisa); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $value->Harga_NB_sisa); 
		    $rowCount++;
		}
		//  Border Data		
		$objPHPExcel->getActiveSheet()->getStyle('A4:H'.($rowCount-1))->applyFromArray(array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))));



		// set autosize
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true); 
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);         

		// set output
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
        sleep(1);
        $filename = 'Laporan_Stok_&_Harga'.date('d-m-Y H-i').'.xlsx';
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        header("Cache-Control: max-age=0");
        ob_clean();
        $objWriter->save("php://output");
        $objPHPExcel->disconnectWorksheets();
		unset($objPHPExcel);
	}
	// Laporan Barang Masuk
	// =====================================================================
	public function laporan_barang_masuk()
	{
		$h = $this->load->view('shuttle3/home_shuttle3');
		$c['content'] = $this->load->view('shuttle3/laporan/barang_masuk', $h);
	}

	public function laporan_view_barang_masuk()
	{
		$bulan =  $this->input->post('bulan');
		$tahun =  $this->input->post('tahun');
		$data['isi'] = $this->M_laporan_shuttle3->laporan_barang_masuk_view($bulan, $tahun);
		$data['awal'] = $bulan;
	 	$data['akhir'] = $tahun;
		$h = $this->load->view('shuttle3/home_shuttle3', $data);
		$c['content'] = $this->load->view('shuttle3/laporan/view_barang_masuk', $h);
	}
	public function laporan_barang_masuk_cetak()
	{
		include_once './assets/cexcel/Classes/PHPExcel.php';
		date_default_timezone_set('Asia/Jakarta');
		$objPHPExcel = new PHPExcel();

		$bulan =  $this->input->post('bulan');
		$tahun =  $this->input->post('tahun');
		$data  =  $this->M_laporan_shuttle3->laporan_barang_masuk_view($bulan, $tahun);
	
		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0);
		$rowCount = 4;
		$rowcount2 = 2;
		
		$objPHPExcel->getSheet(0)->mergeCells('A1:F1');
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "Laporan Barang Masuk");
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setName('Times New Roman');
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		
		$objPHPExcel->getSheet(0)->mergeCells('A2:F2');
		$objPHPExcel->getActiveSheet()->SetCellValue('A2', indonesian_date($bulan)." - ".indonesian_date($tahun));
		$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setName('Times New Roman');
		$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setItalic(true);		
		$objPHPExcel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

		// Set Orientation, size and scaling
		$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(true);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);

		$objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount.':'.'F'.$rowCount)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount.':'.'F'.$rowCount)->getFill()->getStartColor()->setARGB('999999');

		// $objPHPExcel->getActiveSheet()->getStyle('D'.$rowCount)->getNumberFormat()->setFormatCode("_(Rp* #.##0_);_(Rp* (#.##0);_(Rp* "-"_);_(@_)");
  //      	$objPHPExcel->getActiveSheet()->getStyle('F'.$rowCount)->getNumberFormat()->setFormatCode("_(Rp* #.##0_);_(Rp* (#.##0);_(Rp* "-"_);_(@_)");
		// $objPHPExcel->getActiveSheet()->getStyle('H'.$rowCount)->getNumberFormat()->setFormatCode("_(Rp* #.##0_);_(Rp* (#.##0);_(Rp* "-"_);_(@_)");
        //  Border header
        $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount.':'.'F'.$rowCount)->applyFromArray(array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))));        

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ID BARANG");
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "NAMA BARANG");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "TGL MASUK");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "BARANG MASUK");
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "TOTAL HARGA");
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "PENANGGUNG JAWAB");
		$rowCount++;

		// set datatable 
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id_barang); 
		    $objPHPExcel->getActiveSheet()->setCellValue('B'.$rowCount, $value->nama_barang);
		    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->tgl_masuk); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->barang_masuk); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->total_harga); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->penanggung_jawab); 
		    $rowCount++;
		}
		//  Border Data		
		$objPHPExcel->getActiveSheet()->getStyle('A4:F'.($rowCount-1))->applyFromArray(array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))));



		// set autosize
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true); 
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);   

		// set output
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
        sleep(1);
        $filename = 'Laporan_Barang_Masuk'.date('d-m-Y H-i').'.xlsx';
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        header("Cache-Control: max-age=0");
        ob_clean();
        $objWriter->save("php://output");
        $objPHPExcel->disconnectWorksheets();
		unset($objPHPExcel);
	}

	// Laporan Biaya
	// =====================================================================
	public function laporan_pemakaian()
	{
		$h = $this->load->view('shuttle3/home_shuttle3');
		$c['content'] = $this->load->view('shuttle3/laporan/pemakaian', $h);
	}

	public function laporan_view_pemakaian()
	{
		$bulan =  $this->input->post('bulan');
		$tahun =  $this->input->post('tahun');
		$zona =  $this->input->post('zona');
		$data['isi'] = $this->M_laporan_shuttle3->laporan_pemakaian_view($bulan, $tahun, $zona);
		$data['awal'] = $bulan;
	 	$data['akhir'] = $tahun;
		$h = $this->load->view('shuttle3/home_shuttle3', $data);
		$c['content'] = $this->load->view('shuttle3/laporan/view_pemakaian', $h);
	}
	
	public function laporan_pemakaian_cetak()
	{
		include_once './assets/cexcel/Classes/PHPExcel.php';
		date_default_timezone_set('Asia/Jakarta');
		$objPHPExcel = new PHPExcel();

		$bulan =  $this->input->post('bulan');
		$tahun =  $this->input->post('tahun');
		$zona =  $this->input->post('zona');
		$data  =  $this->M_laporan_shuttle3->laporan_pemakaian_view($bulan, $tahun, $zona);
	
		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0);
		$rowCount = 4;
		$rowcount2 = 2;
		
		$objPHPExcel->getSheet(0)->mergeCells('A1:G1');
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "Laporan Pemakaian");
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setName('Times New Roman');
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		
		$objPHPExcel->getSheet(0)->mergeCells('A2:G2');
		$objPHPExcel->getActiveSheet()->SetCellValue('A2', indonesian_date($bulan)." - ".indonesian_date($tahun));
		$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setName('Times New Roman');
		$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setItalic(true);		
		$objPHPExcel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

		// Set Orientation, size and scaling
		$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(true);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);

		$objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount.':'.'G'.$rowCount)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount.':'.'G'.$rowCount)->getFill()->getStartColor()->setARGB('999999');

		$objPHPExcel->getActiveSheet()->getStyle('G'.$rowCount)->getNumberFormat()->setFormatCode("_(Rp* #.##0_);_(Rp* (#.##0);_(Rp* "-"_);_(@_)");
  //      	$objPHPExcel->getActiveSheet()->getStyle('F'.$rowCount)->getNumberFormat()->setFormatCode("_(Rp* #.##0_);_(Rp* (#.##0);_(Rp* "-"_);_(@_)");
		// $objPHPExcel->getActiveSheet()->getStyle('H'.$rowCount)->getNumberFormat()->setFormatCode("_(Rp* #.##0_);_(Rp* (#.##0);_(Rp* "-"_);_(@_)");
        //  Border header
        $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount.':'.'G'.$rowCount)->applyFromArray(array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))));        

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ZONA");
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "MTC");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "MC");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "TANGGAL KELUAR");
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "NAMA BARANG");
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "JUMLAH PAKAI");
		$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, "BIAYA");
		$rowCount++;

		// set datatable 
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->zona); 
		    $objPHPExcel->getActiveSheet()->setCellValue('B'.$rowCount, $value->mtc);
		    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->mc); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->tanggal); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->nama_barang); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->jumlah_pakai); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->biaya); 
		    $rowCount++;
		}
		//  Border Data		
		$objPHPExcel->getActiveSheet()->getStyle('A4:G'.($rowCount-1))->applyFromArray(array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))));



		// set autosize
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true); 
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);   
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);   

		// set output
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
        sleep(1);
        $filename = 'Laporan_Pemakaian'.date('d-m-Y H-i').'.xlsx';
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        header("Cache-Control: max-age=0");
        ob_clean();
        $objWriter->save("php://output");
        $objPHPExcel->disconnectWorksheets();
		unset($objPHPExcel);
	}

	public function laporan_biaya_montir()
	{
		$h = $this->load->view('shuttle3/home_shuttle3');
		$c['content'] = $this->load->view('shuttle3/laporan/pemakaian', $h);
	}

	public function laporan_view_biaya_montir()
	{
		$bulan =  $this->input->post('bulan');
		$tahun =  $this->input->post('tahun');
		$zona =  $this->input->post('zona');
		$data['isi'] = $this->M_laporan_shuttle3->laporan_biaya_montir($bulan, $tahun,$zona);
		$data['awal'] = $bulan;
	 	$data['akhir'] = $tahun;
		$h = $this->load->view('shuttle3/home_shuttle3', $data);
		$c['content'] = $this->load->view('shuttle3/laporan/view_biaya_montir', $h);
	}

	public function laporan_biaya_montir_cetak()
	{
		include_once './assets/cexcel/Classes/PHPExcel.php';
		date_default_timezone_set('Asia/Jakarta');
		$objPHPExcel = new PHPExcel();

		$bulan =  $this->input->post('bulan');
		$tahun =  $this->input->post('tahun');
		$zona =  $this->input->post('zona');
		$data  =  $this->M_laporan_shuttle3->laporan_biaya_montir($bulan, $tahun, $zona);
	
		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0);
		$rowCount = 4;
		$rowcount2 = 2;
		
		$objPHPExcel->getSheet(0)->mergeCells('A1:L1');
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "Laporan Biaya Montir");
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setName('Times New Roman');
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		
		$objPHPExcel->getSheet(0)->mergeCells('A2:L2');
		$objPHPExcel->getActiveSheet()->SetCellValue('A2', indonesian_date($bulan)." - ".indonesian_date($tahun));
		$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setName('Times New Roman');
		$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setItalic(true);		
		$objPHPExcel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

		// Set Orientation, size and scaling
		$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(true);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);

		$objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount.':'.'L'.$rowCount)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount.':'.'L'.$rowCount)->getFill()->getStartColor()->setARGB('999999');

		//$objPHPExcel->getActiveSheet()->getStyle('G'.$rowCount)->getNumberFormat()->setFormatCode("_(Rp* #.##0_);_(Rp* (#.##0);_(Rp* "-"_);_(@_)");
  //      	$objPHPExcel->getActiveSheet()->getStyle('F'.$rowCount)->getNumberFormat()->setFormatCode("_(Rp* #.##0_);_(Rp* (#.##0);_(Rp* "-"_);_(@_)");
		// $objPHPExcel->getActiveSheet()->getStyle('H'.$rowCount)->getNumberFormat()->setFormatCode("_(Rp* #.##0_);_(Rp* (#.##0);_(Rp* "-"_);_(@_)");
        //  Border header
        $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount.':'.'L'.$rowCount)->applyFromArray(array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))));        

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "KA GRUP");
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "MTC");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "ZONA");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "MC");
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "BARANG");
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "LUSI");
		$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, "PAKAN");
		$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, "MOTOR UTAMA");
		$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, "MC PALET");
		$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, "BAUT-BAUT");
		$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, "BARANG LAIN2");
		$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, "TOTAL");
		$rowCount++;

		// set datatable 
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->nama_kagrup); 
		    $objPHPExcel->getActiveSheet()->setCellValue('B'.$rowCount, $value->nama_mtc);
		    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->zona); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->id_mesin); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->nama_barang); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->LUSI_WARP_LINE); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->PAKAN_WEFT_LINE); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $value->MOTOR_UTAMA); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $value->MESIN_PALET); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $value->BAUT_BAUT); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $value->BARANG_LAIN_LAIN); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $value->total); 
		    $rowCount++;
		}
		//  Border Data		
		$objPHPExcel->getActiveSheet()->getStyle('A4:L'.($rowCount-1))->applyFromArray(array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))));



		// set autosize
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true); 
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);   
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);   
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true); 
		$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);   
		$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);   

		// set output
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
        sleep(1);
        $filename = 'Laporan_Biaya_Montir'.date('d-m-Y H-i').'.xlsx';
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        header("Cache-Control: max-age=0");
        ob_clean();
        $objWriter->save("php://output");
        $objPHPExcel->disconnectWorksheets();
		unset($objPHPExcel);
	}

}
