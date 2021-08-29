<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Dokter extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->helper('rupiah');

    date_default_timezone_set('Asia/Jakarta');
  }

  public function core($data)
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

      $data['admin'] = $this->db->query($query)->result_array();
      $data['menu'] = $this->db->get('tb_menu')->result_array();
      $data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();

      $this->load->view('admin/header', $data);
      $this->load->view($data['page'], $data);
      $this->load->view('admin/footer', $data);
    } else {
      # code...
      redirect('auth');
    }
  }

  public function data()
  {
    $data = [
      'title' => 'Dokter',
      'page'  => 'dokter/index'
    ];
    $this->core($data);
  }

  public function detail($id = '')
  {
    if($id){
      $data = [
        'title' => 'Detail Dokter',
        'page'  => 'dokter/detail',
        'dokter'  => $this->db->get_where(
          'tb_user',
          [
            'id_user' => $id,
          ]
        )->row(),
      ];
    } else {
      $data = [
        'title' => 'Detail Dokter',
        'page'  => 'dokter/detail',
        'dokter'  => (object)[
          'id_user' => '',
          'nama'    => '',
          'gelar'   => '',
          'hp'   => '',
          'email'   => '',
          'alamat'   => '',
          'profil'   => '',
          'video'   => '',
          'img'       => '',
        ]

      ];
    }
    $this->core($data);
  }

  public function getAll()
  {
    $this->db->where('level', 3);
    $this->db->where('is_active', 1);
    $user = $this->db->get('tb_user')->result();
    $array = [];
    $no = 1;
    foreach ($user as $key) {
      $array[] = [
        'no'        => $no++,
        'id_user'   => $key->id_user,
        'nama'   => $key->nama,
        'hp'   => $key->hp,
        'email'   => $key->email,
        'alamat'   => $key->alamat,
        'gelar'     => $key->gelar,
        'img'     => $key->img,
        'href'  => '<a class="mr-1 badge badge-info" href=" ' . base_url('dokter/detail/') . $key->id_user . '">Detail</a><a class="mr-1 hapus badge badge-danger" href="#" data-id="' . $key->id_user . '" >Blokir</a>'
      ];
    }
    echo json_encode($array);
  }

  public function add()
  {

    $this->form_validation->set_rules('nama', 'Nama Dokter', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required');
    $this->form_validation->set_rules('hp', 'No Hp', 'trim|required');
    $id = $this->input->post('id');

    $config['upload_path']          = './asset/img/dokter/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['encrypt_name']        = true;
    $config['max_size']             = 2024; // 1MB

    $this->load->library('upload', $config);
    if ($this->form_validation->run() == TRUE) {
      if (!$this->upload->do_upload('img')) {
        $result = ['error' =>  $this->upload->display_errors()];
        $img = null;
      } else {
        $img = $this->upload->data('file_name');
      }

      if ($id) {
        $this->db->where('id_user', $id);
        $user = $this->db->get('tb_user')->row();
        $data = array(
          'nama'    => $this->input->post('nama'),
          'gelar'   => $this->input->post('gelar'),
          'hp'   => $this->input->post('hp'),
          'email'   => $this->input->post('email'),
          'alamat'   => $this->input->post('alamat'),
          'profil'   => $this->input->post('profil'),
          'video'   => $this->input->post('video'),
          'img'       => ($img == null) ? $user->img : $img,
          'is_active'    => 1,
        );
        $this->db->where('id_user', $id);
        $this->db->update('tb_user', $data);
        $aff = 'Data berhasil dirubah';
      } else {
        $data = array(
          'date_created'    => date('Y-m-d H:i:s'),
          'nama'    => $this->input->post('nama'),
          'gelar'   => $this->input->post('gelar'),
          'hp'   => $this->input->post('hp'),
          'email'   => $this->input->post('email'),
          'alamat'   => $this->input->post('alamat'),
          'profil'   => $this->input->post('profil'),
          'video'   => $this->input->post('video'),
          'img'       => $img,
          'is_active'    => 1,
          'level'   => 3,
        );
        $this->db->insert('tb_user', $data);
        $aff = 'Data berhasl tersimpan';
      }

      if ($this->db->affected_rows() > 0) {
        $result = ['sukses' => $aff];
      } else {
        $result = ['error' => 'Data gagal tersimpan'];
      }
    } else {
      $result = ['error' => validation_errors()];
    }

    echo json_encode($result);
  }

  public function getID()
  {
    $id = $this->input->post('id');
    $this->db->where('id_user', $id);
    $user = $this->db->get('tb_user')->row();

    if ($user) {
      $result = ['sukses' => $user];
    } else {
      $result = ['error' => 'Data tidak boleh kosong, lengkapi data'];
    }
    echo json_encode($result);
  }

  public function hapus($id)
  {
    $this->db->where('id_user', $id);
    $this->db->set('is_active', 0);
    $this->db->update('tb_user');

    if ($this->db->affected_rows() > 0) {
      $result = ['sukses' => 'Data berhasil terhapus'];
    } else {
      $result = ['error' => 'Data gagal terhapus'];
    }
    echo json_encode($result);
  }
}


/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */