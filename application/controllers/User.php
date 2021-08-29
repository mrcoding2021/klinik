<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index()
  {
    $id = $this->session->userdata('id');
    if ($id) {
      $id = $this->session->userdata('id_user');
      $level = $this->session->userdata('level');
      $table = 'tb_user';
      $query = "SELECT `id_user`, `menu`
          FROM `tb_user_menu` JOIN `tb_menu_acces` 
            ON `tb_user_menu`.`id_user` = `tb_menu_acces`.`menu_id`
          WHERE `tb_menu_acces`.`role_id`= $level
        ORDER BY `tb_menu_acces`.`menu_id` ASC";
      $data['title'] = 'Users';
      $data['admin'] = $this->db->query($query)->result_array();
      $data['menu'] = $this->db->get('tb_menu')->result_array();
      $data['userfull'] = $this->db->get('tb_user')->result_array();
      $data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();
      $data['slider'] = $this->db->get('tb_slider')->result_array();
      $this->load->view('admin/header', $data);
      $this->load->view('admin/v_user', $data);
      $this->load->view('admin/footer', $data);
    } else {
      redirect('home/login_page');
    }
  }

  public function addUser()
  {
    $this->form_validation->set_rules('nama', 'Nama User Baru', 'trim|required');
    $this->form_validation->set_rules('email', 'Email User', 'trim|required');
    $this->form_validation->set_rules('pwd', 'Password User', 'trim|required');

    $array = array(
      'nama' => $this->input->post('nama'),
      'email' => $this->input->post('email'),
      'level' => $this->input->post('level'),
      'password' => md5($this->input->post('pwd')),
      'is_active' => 1,
      'date_created' => date('l, d-m-Y')
    );

    if ($this->form_validation->run() == TRUE) {
      $this->db->insert('tb_user', $array);
      $this->session->set_flashdata('alert', '<div class="alert alert-info">User baru berhasiil ditambahkan</div>');
      redirect('user');
    } else {
      $this->session->set_flashdata('alert', '<div class="alert alert-danger">Mohon maaf, User baru gagal ditambahan</div>');
      redirect('user');
    }
  }

  public function editUser()
  {
    $id = $this->uri->segment(3);

    $this->form_validation->set_rules('nama', 'Judul Post', 'trim|required');
    $this->form_validation->set_rules('date', 'Date', 'trim|required');
    $this->form_validation->set_rules('negara', 'Negara', 'trim|required');
    $this->form_validation->set_rules('isi', 'Isi Post', 'trim|required');

    $judul = htmlspecialchars($this->input->post('nama'));
    $date = htmlspecialchars($this->input->post('date'));
    $negara = htmlspecialchars($this->input->post('negara'));
    $isi = htmlspecialchars($this->input->post('isi'));

    $slug = str_replace(" ", "-", strtolower($judul));

    $data = array(
      'judul' => $judul,
      'date'   => $date,
      'negara'    => $negara,
      'isi'    => $isi,
      'slug'    => $slug,
    );

    $config['upload_path']          = './asset/assets/images/blog/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->form_validation->run() == TRUE) {
      if (!$this->upload->do_upload('img')) {
        echo $this->upload->display_errors();
      } else {
        $img = $this->upload->data('file_name');
        $this->db->set('img', $img);
      }
      $this->db->where('id_user', $id);
      $this->db->update('tb_user', $data);
      $this->session->set_flashdata('alert', '<div class="alert alert-info">Data baru berhasiil dirubah</div>');
      redirect('user');
    } else {
      $this->session->set_flashdata('alert', '<div class="alert alert-danger">Mohon maaf. data gagal dirubah</div>');
      redirect('user');
    }
  }

  public function delete()
  {
    $id = $this->uri->segment(3);
    $this->db->where('id_user', $id);
    $this->db->delete('tb_user');
    $this->session->set_flashdata('alert', '<div class="alert alert-info">Data berhasil dihapus</div>');
    redirect('user');
  }

  public function aktif()
  {
    $id = $this->uri->segment(3);
    $data = $this->db->get_where('tb_user', array('id_user' => $id))->row_array();
    $aktif = $data['is_active'];
    
    if ($aktif == 1) {
      $this->db->set('is_active', 0);
      $this->db->where('id_user', $id);
      $this->db->update('tb_user');
      redirect('user');
    } else {
      $this->db->set('is_active', 1);
      $this->db->where('id_user', $id);
      $this->db->update('tb_user');
      redirect('user');
    }
  }
}


/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
