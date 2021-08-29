<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mitraku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('tgl_indo');
        $this->load->model('Model_global', 'mapp');
        $this->load->helper('rupiah');
        $this->load->library('form_validation');
    }

    public function mutasi()
    {
        $id = $this->session->userdata('id');

        if ($id) {
            # code...
            $level = $this->session->userdata('level');
            $table = 'tb_user';

            $query = "SELECT `id_user`, `menu`
			  FROM `tb_user_menu` JOIN `tb_menu_acces` 
				ON `tb_user_menu`.`id_user` = `tb_menu_acces`.`menu_id`
			  WHERE `tb_menu_acces`.`role_id`= $level
			ORDER BY `tb_menu_acces`.`menu_id` ASC";

            $data['title'] = 'Mutasi Simpanan';
            $data['admin'] = $this->db->query($query)->result_array();
            $data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();
            $this->load->view('admin/header', $data);
            if ($level == 1) {
                $data['sekolah'] = $this->db->get('tb_sekolah')->result();
                $data['transaksi'] = $this->mapp->get_all('tb_tansaksi')->result();
                $this->load->view('admin/v_mutasi', $data);
            } elseif ($level == 2) {
                $this->db->where('id_sekolah', $id);
                $data['transaksi'] = $this->db->get('tb_tansaksi')->result();
                $this->load->view('bc/v_mutasi', $data);
            } else {
                $data['sekolah'] = $this->mapp->get_by('tb_sekolah', array('id_user' => $id));
                $this->db->where('id_user', $id);
                $data['transaksi'] = $this->db->get('tb_tansaksi')->result();
                $this->load->view('agen/v_mutasi', $data);
            }
            $this->load->view('admin/footer', $data);
        } else {
            redirect('home');
        }
    }

    public function saldo()
    {
        $id = $this->session->userdata('id');

        if ($id) {
            # code...
            $level = $this->session->userdata('level');
            $table = 'tb_user';

            $query = "SELECT `id_user`, `menu`
			  FROM `tb_user_menu` JOIN `tb_menu_acces` 
				ON `tb_user_menu`.`id_user` = `tb_menu_acces`.`menu_id`
			  WHERE `tb_menu_acces`.`role_id`= $level
			ORDER BY `tb_menu_acces`.`menu_id` ASC";

            $data['title'] = 'Dashboard';
            $data['admin'] = $this->db->query($query)->result_array();
            $data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();
            $data['sekolah'] = $this->db->get('tb_sekolah')->result();
            $data['transaksi'] = $this->mapp->get_all('tb_tansaksi');
            $this->load->view('admin/header', $data);
            if ($level == 1) {
                $this->load->view('admin/v_saldo_sekolah', $data);
            } else {
                $data['data_sekolah'] = $this->mapp->get_by('tb_sekolah', array('id_user' => $id));
                $this->db->where('id_sekolah', $data['data_sekolah']->id_sekolah);
                $data['pelajar_sekolah'] = $this->db->get('tb_murid')->result();
                
                $this->load->view('admin/v_saldo_murid', $data);
            } 

            $this->load->view('admin/footer', $data);
        } else {
            redirect('home');
        }
    }

    public function add()
    {
        $this->form_validation->set_rules('nama', 'Judul Post', 'trim|required');
        $this->form_validation->set_rules('hp', 'No. HP Sekolah', 'trim|required');

        $this->db->order_by('id_user', 'DESC');
        $user = $this->db->get('tb_user')->result();

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'date_created' => date('Y-m-d'),
                'id_user' => $user[0]->id_user++,
                'nama_sekolah' => $this->input->post('nama'),
                'alamat_sekolah' => $this->input->post('alamat'),
                'hp_sekolah' => $this->input->post('hp'),
                'email_sekolah' => $this->input->post('email'),
                'pj_sekolah' => $this->input->post('pj'),
            );
            $this->db->insert('tb_sekolah', $data);

            $data2 = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'date_created' => date('Y-m-d'),
                'hp' => $this->input->post('hp'),
                'level' => 2
            );
            $this->db->insert('tb_user', $data2);
            $this->session->set_flashdata('alert', '<div class="alert alert-info">Data baru berhasiil dirubah</div>');
            redirect('mitraku/mitra');
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Mohon maaf. data gagal dirubah</div>');
            redirect('mitraku/mitra');
        }
    }

    public function mitra(){
        $id = $this->session->userdata('id');

        if ($id) {
            # code...
            $level = $this->session->userdata('level');
            $table = 'tb_user';

            $query = "SELECT `id_user`, `menu`
			  FROM `tb_user_menu` JOIN `tb_menu_acces` 
				ON `tb_user_menu`.`id_user` = `tb_menu_acces`.`menu_id`
			  WHERE `tb_menu_acces`.`role_id`= $level
			ORDER BY `tb_menu_acces`.`menu_id` ASC";

            $data['title'] = 'Daftar Mitra';
            $data['admin'] = $this->db->query($query)->result_array();
            $data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();
            $data['sekolah'] = $this->db->get('tb_sekolah')->result();
            
            $this->load->view('admin/header', $data);
            if ($level == 1) {
                $this->db->where('level', 2);
                $data['mitra'] = $this->mapp->get_all('tb_user')->result();
                $this->load->view('admin/v_mitra', $data);
            } elseif ($level == 2) {
                $this->db->where('parent', $id);
                $data['mitra'] = $this->mapp->get_all('tb_user')->result();
                $this->db->where('id_sekolah', $id);
                $data['transaksi'] = $this->db->get('tb_tansaksi')->result();
               
                
                $this->load->view('bc/v_mitra', $data);
            } 
            $this->load->view('admin/footer', $data);
        } else {
            redirect('home');
        }
    }
}
