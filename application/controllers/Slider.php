<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Slider extends CI_Controller
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

  public function index()
  {
    $data = [
      'title' => 'Slider',
      'page'  => 'admin/v_slider'
    ];
    $this->core($data);
  }

  public function getAll()
  {
    $this->db->where('is_active', 1);
    $user = $this->db->get('tb_slider')->result();
    $array = [];
    $no = 1;
    foreach ($user as $key) {
      $array[] = [
        'no'        => $no++,
        'id_slider'   => $key->id_slider,
        'ket'   => $key->ket,
        'judul'   => $key->judul,
        'img'   => '<img width="100" src="' . base_url('asset/img/slider/') . $key->img . '">',
      ];
    }
    echo json_encode($array);
  }

  public function add()
  {

    $this->form_validation->set_rules('judul', 'Judul Slider', 'trim|required');
    $id = $this->input->post('id_slider');

    $config['upload_path']          = './asset/img/slider/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['encrypt_name']        = true;
    $config['max_size']             = 2024; // 1MB

    $this->load->library('upload', $config);
    if ($this->form_validation->run() == TRUE) {
      if (!$this->upload->do_upload('img')) {
        $result = ['error' =>  $this->upload->display_errors()];
      } else {
        $img = $this->upload->data('file_name');
      }

      $data = array(
        'judul'    => strtoupper($this->input->post('judul')),
        'ket'    => strtoupper($this->input->post('ket')),
        'img'       => $img,
        'is_active'    => 1,
      );
      if ($id) {
        $this->db->where('id_slider', $id);
        $this->db->update('tb_slider', $data);
        $aff = 'Data Berhasi dirubah !';
      } else {
        $this->db->set('date', date('Y-m-d'));
        $this->db->insert('tb_slider', $data);
        $aff = 'Data baru berhasil tersimpan';
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
    $this->db->where('id_slider', $id);
    $user = $this->db->get('tb_slider')->row();

    if ($user) {
      $result = ['sukses' => $user];
    } else {
      $result = ['error' => 'Data tidak boleh kosong, lengkapi data'];
    }
    echo json_encode($result);
  }

  public function hapus($id)
  {
    $this->db->where('id_slider', $id);
    $this->db->set('is_active', 2);
    $this->db->update('tb_slider');

    if ($this->db->affected_rows() > 0) {
      $result = ['sukses' => 'Slider ini berhasil terhapus'];
    } else {
      $result = ['error' => 'Slider ini gagal terhapus'];
    }
    echo json_encode($result);
  }
}


/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */