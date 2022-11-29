<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . "third_party/Spout/Autoloader/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Style\Font;

class Bukuinduk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BukuIndukModel', 'bInd');
    }
    public function index()
    {
        $data = $this->bInd->getData();
        $this->load->view('bInd/table-bind', ['data' => $data]);
    }
    public function import()
    {
        $this->load->view('bInd/import-bind');
    }
    public function read()
    {
      
         $config['upload_path']  = './upload/files/';
        $config['allowed_types']= 'xlsx|xls|csv';
        $config['file_name']    = 'data' . time();
        
        $this->load->library('upload', $config);
           if($this->upload->do_upload('file')){
            $file = $this->upload->data(); 
            $name = $file['file_name'];
            $explode = explode('.', $name);
                if ($explode[1] == 'csv') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                } else {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }
        $spreadsheet = $reader->load('upload/files/' . $file['file_name']);
        $d = $spreadsheet->getSheet(0)->toArray();
        unset($d[0]);
         foreach ($d as $t) {
             $stoks = $t[13];
               if ($stoks > 0) {
                         for ($i = 1; $i <= $stoks; $i++) { 
            $data["kd_buku"] = $t[1];
            $data["judul"] = $t[2];
            $data["no_buku"] = $i;
            $data["pengarang"] = $t[3];
            $data["penerbit"] = $t[4];
            $data["kota_terbit"] = $t[5];
            $data["tahun_terbit"] = $t[6];
            $data["ISBN"] = $t[7];
            $data["asal"] = $t[8];
            $data["klasifikasi"] = $t[9];
            $data["tgl_diterima"] = $t[10];
            $data["jenis"] = $t[11];
            $data["rak"] = $t[12];
             $data["stok"] = "1";
            $data["keadaan"] = "baik";
             $this->bInd->store($data);
                }
               } else {
                $c = 1;
                   $data["kd_buku"] = $t[1];
            $data["judul"] = $t[2];
            $data["no_buku"] = $c++;
            $data["pengarang"] = $t[3];
            $data["penerbit"] = $t[4];
            $data["kota_terbit"] = $t[5];
            $data["tahun_terbit"] = $t[6];
            $data["ISBN"] = $t[7];
            $data["asal"] = $t[8];
            $data["klasifikasi"] = $t[9];
            $data["tgl_diterima"] = $t[10];
            $data["jenis"] = $t[11];
            $data["rak"] = $t[12];
             $data["stok"] = "0";
            $data["keadaan"] = "baik";
             $this->bInd->store($data);
               }
               
       
        }
              redirect('bukuinduk');
        }
    }

    public function export()
    {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $style_col = [
        'alignment' => [
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ],
      'font' => ['bold' => true], 
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
      'borders' => [
        'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
        'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
        'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
        'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
      ],
      'font' => [
          'name' => 'Calibri',
        ], 
    ];

    $datas = $this->db->query("SELECT * FROM buku_induk GROUP BY judul,penerbit,pengarang ORDER BY id ASC")->result();
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

      $stok = $this->db->get_where('buku_induk', ['kd_buku' => $data->kd_buku,'judul' => $data->judul,'penerbit' => $data->penerbit])->num_rows();
      $sheet->setCellValue('N'.$numrow, $stok);

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

    
    public function create()
    {
        $this->load->view('bInd/tambahbuku',);
    }
    public function store()
    {
        $kd_buku = $this->input->post('kd_buku');
        $judul = $this->input->post('judul');
        $pengarang = $this->input->post('pengarang');
        $penerbit = $this->input->post('penerbit');
        $kota_terbit = $this->input->post('kota_terbit');
        $tahun_terbit = $this->input->post('tahun_terbit');
        $ISBN = $this->input->post('ISBN');
        $asal = $this->input->post('asal');
        $klasifikasi = $this->input->post('klasifikasi');
        $tgl_diterima = $this->input->post('tgl_diterima');
        $jenis = $this->input->post('jenis');
        $rak = $this->input->post('rak');
        $stok = $this->input->post('stok');

        for ($i = 1; $i <= $stok; $i++) { 
            $data = [
               "kd_buku" => $kd_buku,
               "no_buku" => $i,
                "judul" => $judul,
                "pengarang" => $pengarang,
                "penerbit" => $penerbit,
                "kota_terbit" => $kota_terbit,
                "tahun_terbit" => $tahun_terbit,
                "ISBN" => $ISBN,
                "asal" => $asal,
                "klasifikasi" => $klasifikasi,
                "tgl_diterima" => $tgl_diterima,
                "jenis" => $jenis,
                "rak" => $rak,
                "stok" => 1,
                "keadaan" => "baik"
            ];
            $this->bInd->store($data);
        }
        $this->session->set_flashdata('msg', 'berhasil nambah data');
        redirect('bukuinduk');
    }
    public function edit($kd_buku)
    {
        $data = $this->bInd->getData($kd_buku);
        $this->load->view('bInd/editbuku', [
            'data' => $data[0]
        ]);
    }
    public function update($kd_buku)
    {
            $judul = $this->input->post('judul');
            $pengarang = $this->input->post('pengarang');
            $penerbit = $this->input->post('penerbit');
            $kota_terbit = $this->input->post('kota_terbit');
            $tahun_terbit = $this->input->post('tahun_terbit');
            $ISBN = $this->input->post('ISBN');
            $asal = $this->input->post('asal');
            $klasifikasi = $this->input->post('klasifikasi');
            $tgl_diterima = $this->input->post('tgl_diterima');
            $jenis = $this->input->post('jenis');
            $rak = $this->input->post('rak');
         
            $data = [
                "judul" => $judul,
                "pengarang" => $pengarang,
                "penerbit" => $penerbit,
                "kota_terbit" => $kota_terbit,
                "tahun_terbit" => $tahun_terbit,
                "ISBN" => $ISBN,
                "asal" => $asal,
                "klasifikasi" => $klasifikasi,
                "tgl_diterima" => $tgl_diterima,
                "jenis" => $jenis,
                "rak" => $rak,
                ];
                $this->bInd->updatebuku($data, $kd_buku);    
    }
    public function detail($id)
    {
        $data = $this->bInd->detailBuku($id);
        $this->load->view('bInd/detailbuku', ['data' => $data[0]]);
    }
    
    public function addStok($id,$judul,$penerbit)
    {
        $stok = $this->input->post('stok');
        $data = $this->db->get_where('buku_induk', ['kd_buku' => $id,'judul' => $judul,'penerbit' => $penerbit])->result_array();
        $stoknow = $this->db->get_where('buku_induk', ['kd_buku' => $id,'judul' => $judul,'penerbit' => $penerbit])->num_rows();
        $buku = $data[0];
        for ($i = 1; $i <= $stok; $i++) { 
            $data = [
               "kd_buku" => $id,
               "no_buku" => $stoknow+$i,
                "judul" => $buku['judul'],
                "pengarang" => $buku['pengarang'],
                "penerbit" => $buku['penerbit'],
                "kota_terbit" => $buku['kota_terbit'],
                "tahun_terbit" => $buku['tahun_terbit'],
                "ISBN" => $buku['ISBN'],
                "asal" => $buku['asal'],
                "klasifikasi" => $buku['klasifikasi'],
                "tgl_diterima" => $buku['tgl_diterima'],
                "jenis" => $buku['jenis'],
                "rak" => $buku['rak'],
                "stok" => 1,
                "keadaan" => "baik",
            ];
            $this->bInd->store($data);
        }
        $this->session->set_flashdata('msg', 'berhasil nambah stok');
        redirect('bukuinduk/tampilkan/'.$id.'/'.$judul.'/'.$penerbit);
    }

    public function tampilkan($id,$judul,$penerbit)
    {
        // $data = $this->bInd->tampilkanBuku($id);
        $data = $this->db->get_where('buku_induk', ['kd_buku' => $id,'judul' => $judul,'penerbit' => $penerbit, 'keadaan' => "baik"])->result_array();
        $generator = new Picqer\Barcode\BarcodeGeneratorSVG();
        $this->load->view('bInd/tampilkanBuku', ['data' => $data, 'gen' => $generator]);
    }

    public function status($id)
    {
        $no = $_GET['no'];
        $data = $this->db->get_where('buku_induk', ['kd_buku' => $id, 'no_buku' => $no])->result_array();
        $this->load->view('bInd/status', ['data' => $data[0]]);
    }
    public function changeStatus($id, $no)
    {
        $keadaan = $this->input->post('keadaan');

        $this->db->query("UPDATE buku_induk SET keadaan='$keadaan' WHERE kd_buku='$id' AND no_buku='$no'");
        redirect('bukuinduk/tampilkan/'. $id);
    }
    public function bukuRusak()
    {
        $data = $this->db->query('SELECT * FROM buku_induk WHERE keadaan="rusak" || keadaan="hilang"')->result_array();
        // var_dump($data);
        $this->load->view('bInd/bukuRusak', ['data' => $data]);
    }
}
