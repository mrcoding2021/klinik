<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pdf extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Model_global', 'mapp');
    $this->load->helper('tgl_indo');
    $this->load->helper('rupiah');
  }


  public function report($id){
    
    ob_start();
    $this->db->where('id_simpanan', $id);
    $data['key'] = $this->db->get('tb_simpanan')->row();
    
    $this->load->view('pdf/simpanan',$data);
    $html = ob_get_contents();
    ob_end_clean();

    require './application/libraries/html2pdf/html2pdf/autoload.php';

    $pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
    $pdf->WriteHTML($html);
    $pdf->Output('Pengajuan Simpanan '.$data['key']->nama.'.pdf', 'D');
  }

  public function cetak($id)
  {
    ob_start();
    $this->db->where('id_pengajuan', $id);
    $data['key'] = $this->db->get('tb_pembiayaan')->row();

    $this->load->view('pdf/pembiayaan', $data);
    $html = ob_get_contents();
    ob_end_clean();

    require './application/libraries/html2pdf/html2pdf/autoload.php';

    $pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
    $pdf->WriteHTML($html);
    $pdf->Output('Pengajuan Pembiayaan ' . $data['key']->nama . '.pdf', 'D');
  }
}
