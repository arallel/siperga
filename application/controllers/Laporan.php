<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
class laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('rakmodel', 'rak');
    }
    public function index()
    {
        $rak = $this->rak->getData();
       $this->load->view('laporan', ['rak' => $rak]);
    }
    public function test()
    {
           
            // var_dump($datas);
    // redirect('laporan');
    }
    public function exportbuku()
    {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $style_col = [
        'alignment' => [
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ],
      'font' => [['bold' => true]], 
      'borders' => [
        'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
        'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
        'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
        'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
      ],
       'fill' => [
                'fillType' =>\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => array('argb' => 'C0C0C0')
            ],
      ];    

    $sheet->setCellValue('A1', "No");     
    $sheet->setCellValue('B1', "Kd_buku"); 
    $sheet->setCellValue('C1', "judul"); 
    $sheet->setCellValue('D1', "pengarang"); 
    $sheet->setCellValue('E1', "penerbit"); 
    $sheet->setCellValue('F1', "kota_terbit"); 
    $sheet->setCellValue('G1', "th_terbit"); 
    $sheet->setCellValue('H1', "ISBN"); 
    $sheet->setCellValue('I1', "asal"); 
    $sheet->setCellValue('J1', "klasifikasi"); 
    $sheet->setCellValue('K1', "tgl_diterima"); 
    $sheet->setCellValue('L1', "jenis"); 
    $sheet->setCellValue('M1', "rak"); 
    $sheet->setCellValue('N1', "stok"); 


    $sheet->getStyle('A1')->applyFromArray($style_col)->getAlignment()->setHorizontal('center');
    $sheet->getStyle('B1')->applyFromArray($style_col)->getAlignment()->setHorizontal('center');
    $sheet->getStyle('C1')->applyFromArray($style_col)->getAlignment()->setHorizontal('center');
    $sheet->getStyle('D1')->applyFromArray($style_col)->getAlignment()->setHorizontal('center');
    $sheet->getStyle('E1')->applyFromArray($style_col)->getAlignment()->setHorizontal('center');
    $sheet->getStyle('F1')->applyFromArray($style_col)->getAlignment()->setHorizontal('center');
    $sheet->getStyle('G1')->applyFromArray($style_col)->getAlignment()->setHorizontal('center');
    $sheet->getStyle('H1')->applyFromArray($style_col)->getAlignment()->setHorizontal('center');
    $sheet->getStyle('I1')->applyFromArray($style_col)->getAlignment()->setHorizontal('center');
    $sheet->getStyle('J1')->applyFromArray($style_col)->getAlignment()->setHorizontal('center');
    $sheet->getStyle('K1')->applyFromArray($style_col)->getAlignment()->setHorizontal('center');
    $sheet->getStyle('L1')->applyFromArray($style_col)->getAlignment()->setHorizontal('center');
    $sheet->getStyle('M1')->applyFromArray($style_col)->getAlignment()->setHorizontal('center');
    $sheet->getStyle('N1')->applyFromArray($style_col)->getAlignment()->setHorizontal('center');


   $style_row = [
      'alignment' => [
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ],
      'font' => ['serif'],
      'borders' => [
        'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
        'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
        'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
        'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
      ]
    ];
    

    $asal = $this->input->post('asal');
            $tgl_diterima = $this->input->post('tgl_diterima');
            $rak = $this->input->post('rak');
            $stok = $this->input->post('stok');
    $formats = $this->input->post('format');
 if($asal){
    if ($asal) {
           $datas =  $this->db->get_where('buku_induk', array('asal' => $asal))->result();
    } elseif($tgl_diterima) {
        $datas =  $this->db->get_where('buku_induk', array('tgl_diterima' => $tgl_diterima))->result();
    } elseif ($rak) {
         $datas =  $this->db->get_where('buku_induk', array('rak' => $rak))->result();
    }elseif ($stok) {
        $datas =  $this->db->get_where('buku_induk', array('stok' => $stok))->result();
    }
 }else{
         $datas =  $this->db->get('buku_induk')->result();
    }

    $no = 1; 
    $numrow = 2; 
    foreach($datas as $data){ 
      $sheet->setCellValue('A'.$numrow, $no);
      $sheet->setCellValue('B'.$numrow, $data->kd_buku);
      $sheet->setCellValue('C'.$numrow, $data->judul);
      $sheet->setCellValue('D'.$numrow, $data->pengarang);
      $sheet->setCellValue('E'.$numrow, $data->penerbit);
      $sheet->setCellValue('F'.$numrow, $data->kota_terbit);
      $sheet->setCellValue('G'.$numrow, $data->tahun_terbit);
      $sheet->setCellValue('H'.$numrow, $data->ISBN);
      $sheet->setCellValue('I'.$numrow, $data->asal);
      $sheet->setCellValue('J'.$numrow, $data->klasifikasi);
      $sheet->setCellValue('K'.$numrow, $data->tgl_diterima);
      $sheet->setCellValue('L'.$numrow, $data->jenis);
      $sheet->setCellValue('M'.$numrow, $data->rak);
      $sheet->setCellValue('N'.$numrow, $data->stok);

      $sheet->getStyle('A'.$numrow)->applyFromArray($style_row)->getAlignment()->setHorizontal('center');
      $sheet->getStyle('B'.$numrow)->applyFromArray($style_row)->getAlignment()->setHorizontal('center');
      $sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('F'.$numrow)->applyFromArray($style_row)->getAlignment()->setHorizontal('center');
      $sheet->getStyle('G'.$numrow)->applyFromArray($style_row)->getAlignment()->setHorizontal('center');
      $sheet->getStyle('H'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('I'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('J'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('K'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('L'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('M'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('N'.$numrow)->applyFromArray($style_row);
      $no++; 
      $numrow++; 
    }
     
    // $sheet->getDefaultRowDimension()->setRowHeight(-1);
    // Set width kolom
    $sheet->getColumnDimension('A')->setWidth(13);
    $sheet->getColumnDimension('B')->setWidth(13);
    $sheet->getColumnDimension('C')->setWidth(50);
    $sheet->getColumnDimension('D')->setWidth(20);
    $sheet->getColumnDimension('E')->setWidth(25);
    $sheet->getColumnDimension('F')->setWidth(17);
     $sheet->getColumnDimension('G')->setWidth(15);
    $sheet->getColumnDimension('H')->setWidth(10);
    $sheet->getColumnDimension('I')->setWidth(10);
    $sheet->getColumnDimension('J')->setWidth(10);
    $sheet->getColumnDimension('K')->setWidth(20);
    $sheet->getColumnDimension('L')->setWidth(10);
     $sheet->getColumnDimension('M')->setWidth(10);
    $sheet->getColumnDimension('N')->setWidth(5);
    
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $sheet->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $sheet->setTitle("Laporan Buku");
    if ($this->input->post('nama_file')) {
          $nama_file = $this->input->post('nama_file');
    } else {
        $nama_file = 'Databuku ' . date('d-m-y');
    }
    
    $format = $this->input->post('format');
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="'. $nama_file .'.'.$format.'"'); 
    header('Cache-Control: max-age=0');
    if ($format == 'csv') {
        $writer = new Csv($spreadsheet);
    } else {
        $writer = new Xlsx($spreadsheet);
    }
    
    $writer->save('php://output');

    }
}
