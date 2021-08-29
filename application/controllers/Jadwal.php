<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Jadwal extends CI_Controller
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
    $this->db->where('parent', 0);
    $hari = $this->db->get('tb_user_jadwal')->result();

    $data = [
      'title' => 'Jadwal',
      'page'  => 'jadwal/index',
      'hari'  => $hari,
    ];
    $this->core($data);
  }

  public function hari($id = '')
  {
    $this->db->where('id', $id);
    $hari = $this->db->get('tb_user_jadwal')->row();
    $this->db->where('parent', $id);
    $listJadwal = $this->db->get('tb_user_jadwal')->result();
    $this->db->where('level', 3);
    $dokter = $this->db->get('tb_user')->result();

    $data = [
      'title' => 'Jadwal',
      'subtitle' => 'List Jadwal Dokter',
      'page'  => 'jadwal/listJadwal',
      'hari'  => $hari,
      'listJadwal'  => $listJadwal,
      'dokter'  => $dokter
    ];
    $this->core($data);
  }

  public function getAll()
  {

    $this->db->where('is_active', 1);
    $user = $this->db->get('promo')->result();
    $array = [];
    $no = 1;
    foreach ($user as $key) {
      $array[] = [
        'no'        => $no++,
        'id'   => $key->id,
        'judul'   => $key->judul,
        'img'   => $key->img,
        'ket'   => $key->ket,
        'harga' => rupiah($key->harga)
      ];
    }
    echo json_encode($array);
  }

  public function add()
  {

    $this->form_validation->set_rules('judul', 'Nama Project', 'trim|required');
    $id = $this->input->post('id');

    $config['upload_path']          = './asset/img/promo/';
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
        $this->db->where('id', $id);
        $user = $this->db->get('promo')->row();
        $data = array(
          'judul'    => strtoupper($this->input->post('judul')),
          'harga'   => $this->input->post('harga'),
          'jadwal'   => $this->input->post('jadwal'),
          'ket'   => $this->input->post('ket'),
          'img'       => ($img == null) ? $user->img : $img,
          'is_active'    => 1,
        );
        $this->db->where('id', $id);
        $this->db->update('promo', $data);
        $aff = 'Data berhasil dirubah';
      } else {
        $data = array(
          'date_created'    => date('Y-m-d H:i:s'),
          'judul'    => strtoupper($this->input->post('judul')),
          'harga'   => $this->input->post('harga'),
          'jadwal'   => $this->input->post('jadwal'),
          'ket'   => $this->input->post('ket'),
          'img'       => $img,
          'is_active'    => 1,
        );
        $this->db->insert('promo', $data);
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

  public function getID($id)
  {
    $this->db->where('id', $id);
    $data = $this->db->get('promo')->row();

    if ($data) {
      $result = ['sukses' => $data];
    } else {
      $result = ['error' => 'Data tidak boleh kosong, lengkapi data'];
    }
    echo json_encode($result);
  }

  public function hapus($id)
  {
    $this->db->where('id', $id);
    $this->db->set('is_active', 0);
    $this->db->update('promo');

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