<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	public function __construct()   
	{     
	 parent::__construct();
	  $this->load->helper('url');   
	  $this->load->helper('form');   
	  $this->load->library('session');   
	  $this->load->model('user_model');
	  $this->load->library('pdf');
	  $user = $this->session->email;
	  if(empty($user)){
		$this->session->set_flashdata('message','<div class=
		"alert-success" role="alert">You must be login!</div>');
		 redirect('auth');
	  } 
	}

	public function index(){
		$data['title'] = 'Home';
		$this->load->view('partial/head',$data);
		$data['data_mahasiswa'] =  $this->user_model->get();   
    	$data['jumlah_data']  =  $this->user_model->get();
		$data['user'] = $this->db->get_where('user',['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('partial/header',$data);
		$this->load->view('partial/leftbar',$data);
		$this->load->view('user/index',$data);
		$this->load->view('partial/rightbar',$data);
		$this->load->view('partial/footer');  
	}

	public function form_insert()   
	{   
		 $this->form_validation->set_rules('nim','NIM','required|trim|min_length[10]|max_length[10]|alpha_numeric|is_unique[tabel_mahasiswa.nim]',[
			'is_unique' => '<div class=
			"alert-danger" role="alert">NIM has been used!</div>'
		]);
		 $this->form_validation->set_rules('nama','Nama','required|min_length[3]|max_length[20]');   
		 $this->form_validation->set_rules('alamat','Alamat','required|min_length[10]|max_length[50]'); 
		
		 if ($this->form_validation->run() === FALSE)
		 {   
			$data['title'] = 'ADD';
			$this->load->view('partial/head',$data);
			$data['user'] = $this->db->get_where('user',['email' =>
			$this->session->userdata('email')])->row_array();
			$this->load->view('partial/header',$data);
			$this->load->view('partial/leftbar',$data);
			$this->load->view('user/add');
			$this->load->view('partial/rightbar',$data);
			$this->load->view('partial/footer');   
		 }else{

			$data['nim'] = $this->input->post('nim');
		  $data['nama'] = $this->input->post('nama');      
		  $data['jenis_kelamin']  = $this->input->post('jenis_kelamin');
			$data['id_jurusan']  = $this->input->post('id_jurusan');
			$data['alamat']  = $this->input->post('alamat');


			$config['upload_path']   = './uploads/';
			$config['allowed_types'] = 'jpg|png|jpeg|bmp';
			$config['max_size']      = 3000;
			$config['file_name']     = $data['nim'];

			$this->load->library('upload', $config);

			$this->upload->do_upload('foto');
			  
			$foto = $this->upload->data('file_name');
			  
			$data['foto']  = $foto;

			
	
		  $this->user_model->insert($data);  
		  redirect('user','refresh');   
		 }    
	}   

	public function ubah($nim)   
	{   
		$data['title'] = 'Edit';
		$data['user'] = $this->db->get_where('user',['email' =>
		$this->session->userdata('email')])->row_array();
		 $data['data_mahasiswa'] =  $this->user_model->get_nim($nim)->row_array(); 
		 $this->load->view('partial/head',$data);
		 $this->load->view('partial/header',$data);
		 $this->load->view('partial/leftbar',$data);   
		 $this->load->view('user/edit',$data);
		 $this->load->view('partial/footer');   	   
	} 

	public function ubah_data()  
	{   
		$this->form_validation->set_rules('nim','NIM','required|trim|min_length[10]|max_length[10]|alpha_numeric');
		 $this->form_validation->set_rules('nama','Nama','required|min_length[3]|max_length[20]');   
		 $this->form_validation->set_rules('alamat','Alamat','required|min_length[10]|max_length[50]');  
		
		 if ($this->form_validation->run() === FALSE)
		 {   
			$data['title'] = 'ADD';
			$this->load->view('partial/head',$data);
			$data['user'] = $this->db->get_where('user',['email' =>
			$this->session->userdata('email')])->row_array();
			$this->load->view('partial/header',$data);
			$this->load->view('partial/leftbar',$data);
			$this->load->view('user/add');
			$this->load->view('partial/rightbar',$data);
			$this->load->view('partial/footer');   
		 }else{

			$syarat['nim'] = $this->input->post('nim');

			$data['nim'] = $this->input->post('nim');
			$data['nama'] = $this->input->post('nama');      
			$data['jenis_kelamin']  = $this->input->post('jenis_kelamin');
		 	$data['id_jurusan']  = $this->input->post('id_jurusan');
		 	$data['alamat']  = $this->input->post('alamat');


			$config['upload_path']   = './uploads/';
			$config['allowed_types'] = 'jpg|png|jpeg|bmp';
			$config['max_size']      = 3000;
			$config['file_name']     = $data['nim'];
			$config['overwrite']     = true;

			$this->load->library('upload', $config);

			$this->upload->do_upload('foto');
			  
			$foto = $this->upload->data('file_name');
			  
			$data['foto']  = $foto;
	
			$this->user_model->update_data($data, $syarat);     
			redirect('user','refresh');

		 }    
	}   
	
	/*
	public function hapus($nim)   
	{
		$data['data_mahasiswa'] =  $this->user_model->delete($nim);   
		return; 
	}
	*/
	public function hapus()   
	{
		$nim = $this->uri->segment(3);
		$this->user_model->delete($nim);
		redirect('user','refresh');
	}

	public function contactus()   
	{
		$this->form_validation->set_rules('email','Email','required|valid_email');
		 $this->form_validation->set_rules('subject','Subject','required');   
		 $this->form_validation->set_rules('message','Message','required');  
		
		 if ($this->form_validation->run() === FALSE)
		 {
				$data['title'] = 'Contact-US';
				$this->load->view('partial/head',$data);
				$data['user'] = $this->db->get_where('user',['email' =>
				$this->session->userdata('email')])->row_array();
				$this->load->view('partial/header',$data);
				$this->load->view('partial/leftbar',$data);
				$this->load->view('user/contactus');
				$this->load->view('partial/rightbar',$data);
				$this->load->view('partial/footer');  	  
			} 
		}


	public function laporanpdf(){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(250,7,'Universitas AW',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(250,7,'Daftar Mahasiswa Universitas AW Angkatan 2019/2020',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0);
        $pdf->Cell(30,6,'Nim',1,0);
        $pdf->Cell(40,6,'Nama Mahasiswa',1,0);
        $pdf->Cell(40,6,'Foto',1,0);
        $pdf->Cell(60,6,'Major',1,0);
        $pdf->Cell(25,6,'Gender',1,0);
        $pdf->Cell(50,6,'Address',1,1);
        $pdf->SetFont('Arial','',10);
        /*$tabel_mahasiswa = $this->db->get('tabel_mahasiswa')->result();*/
        $tabel_mahasiswa = $this->user_model->get();
        $no = 1;
        foreach ($tabel_mahasiswa as $row){
            $pdf->Cell(10,6,$no++,1,0);
            $pdf->Cell(30,6,$row->nim,1,0);
            $pdf->Cell(40,6,$row->nama,1,0);
            $pdf->Cell(40,6,$row->foto,1,0);
            $pdf->Cell(60,6,$row->namaJurusan,1,0);
            $pdf->Cell(25,6,$row->jenis_kelamin,1,0); 
            $pdf->Cell(50,6,$row->alamat,1,1); 
        }
        $pdf->Output();
    }


	public function export(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('InnerMedia')
					 ->setLastModifiedBy('InnerMedia')
					 ->setTitle("Data Mahasiswa")
					 ->setSubject("Mahasiswa")
					 ->setDescription("Laporan Semua Data Mahasiswa")
					 ->setKeywords("Data Mahasiswa");
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
		  'font' => array('bold' => true), // Set font nya jadi bold
		  'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
		  'alignment' => array(
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA MAHASISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:F1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "Nim"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Nama"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "Major"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "Gender"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "Alamat"); // Set kolom E3 dengan tulisan "ALAMAT"
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$tabel_mahasiswa = $this->user_model->get();
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($tabel_mahasiswa as $data){ // Lakukan looping pada variabel siswa
		  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nim);
		  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
		  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->namaJurusan);
		  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->jenis_kelamin);
		  $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->alamat);
		  
		  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		  
		  $no++; // Tambah 1 setiap kali looping
		  $numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(35); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(40); // Set width kolom E
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data Mahasiswa");
		$excel->setActiveSheetIndex(0);
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Mahasiswa From MahsSWA.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
		}
}