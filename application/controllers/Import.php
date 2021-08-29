<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Menu
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller Import
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Import extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));
        $this->load->helper('harga');
    }

    public function index()
    {
        $this->load->view('v_import');
    }

    public function upload()
    {
        $fileName = $this->input->post('file');

        $config['upload_path'] = './asset/upload/';
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
        $config['max_size'] = 10000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Upload data produk gagal ditambahan</div>');
            redirect('produk');
        } else {
            $media = $this->upload->data();
            $inputFileName = 'asset/upload/' . $media['file_name'];

            try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
            }

            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            for ($row = 2; $row <= $highestRow; $row++) {
                $rowData = $sheet->rangeToArray(
                        'A' . $row . ':' . $highestColumn . $row,
                        NULL,
                        TRUE,
                        FALSE
                    );
                $data = array(
                        "kode_produk" => $rowData[0][0],
                        "nama_produk" => $rowData[0][1],
                        "kategori" => $rowData[0][3],
                        "deskripsi" => $rowData[0][4],
                        "tag" => $rowData[0][5],    
                        "hrg_konsumen" => $rowData[0][7],
                        "hrg_reseller" => $rowData[0][8],
                        "hrg_agen" => $rowData[0][9],
                        "satuan" => $rowData[0][11]
                    );
                $this->db->insert('tb_produk', $data);
            }
            $this->session->set_flashdata('alert', '<div class="alert alert-info">Upload Data produk berhasiil ditambahan</div>');
            redirect('produk');
        }
    }
}


/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
