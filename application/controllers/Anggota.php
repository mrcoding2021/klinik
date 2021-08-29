<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_global', 'mapp');
        $this->load->helper('tgl_indo');
        
    }

    public function index()
    {
        $id = $this->session->userdata('id');
        if ($id) {
            
            $level = $this->session->userdata('level');
            $table = 'tb_user';
            $query = "SELECT `id_user`, `menu`
            FROM `tb_user_menu` JOIN `tb_menu_acces` 
              ON `tb_user_menu`.`id_user` = `tb_menu_acces`.`menu_id`
            WHERE `tb_menu_acces`.`role_id`= $level
          ORDER BY `tb_menu_acces`.`menu_id` ASC";
            $data['title'] = 'Anggota';
            $data['admin'] = $this->db->query($query)->result_array();
            $data['menu'] = $this->db->get('tb_menu')->result_array();
            $data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();
            $data['simpanan'] = $this->db->get('tb_anggota')->result_array();
            $this->load->view('admin/header', $data);
            $this->load->view('admin/v_anggota', $data);
            $this->load->view('admin/footer', $data);
        } else {
            redirect('uuth');
        }
    }

    public function add()

    {

        $this->form_validation->set_rules('nama', 'Nama Slider', 'trim|required');

        $data = array(
            'kode_anggota' => $_POST['kode_simpan'],
            'nama' => htmlspecialchars($_POST['nama']),
            'ktp' => htmlspecialchars($_POST['ktp']),
            'alamat' => htmlspecialchars($_POST['alamat']),
            'tlp' => htmlspecialchars($_POST['tlp']),
            'email' => htmlspecialchars($_POST['email']),
            'kerja' => $_POST['kerja'],
            'ibu' => htmlspecialchars($_POST['ibu']),
            'waris' => $_POST['waris'],
            'hub_waris' => $_POST['hub_waris'],
            'created_at' => date('Y-m-d'),
        );

        if ($this->form_validation->run() == TRUE) {
            $this->db->insert('tb_anggota', $data);
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data Anda telah masuk ke sistem kami, silahkan lakukan setoran Simpanan Wajib dan Simpanan Pokok</div>');
            redirect('home/daftar');
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Mohon maaf. Data Anda gagal terinput, silahkan coba lagi</div>');
            redirect('home/daftar');
        }
    }

    public function editSlider($id)
    {
        $config['upload_path']          = './asset/img/slide/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->form_validation->set_rules('nama', 'Nama Menu', 'trim|required');
        $this->form_validation->set_rules('caption', 'Caption Slider', 'trim|required');


        $nama = htmlspecialchars($this->input->post('nama'));
        $caption = htmlspecialchars($this->input->post('caption'));

        $data = array(
            'nama' => $nama,
            'caption' => $caption
            
        );

        if (!$this->upload->do_upload('img')) {
            $this->upload->display_errors();
        } else {
            $img = $this->upload->data('file_name');
            $this->db->set('img', $img);
        };

        if ($this->form_validation->run() == TRUE) {
            $this->db->where('id_slider', $id);
            $this->db->update('tb_slider', $data);
            $this->session->set_flashdata('alert', '<div class="alert alert-info">Data baru berhasiil dirubah</div>');
            redirect('slider');
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Mohon maaf. data gagal dirubah</div>');
            redirect('slider');
        }
    }

    public function delete($id)
    {
        $this->db->where('id_slider', $id);
        $this->db->delete('tb_slider');
        $this->session->set_flashdata('alert', '<div class="alert alert-info">Data baru berhasiil dihapus</div>');
        redirect('slider');
    }
    
}