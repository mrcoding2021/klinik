<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pasien extends CI_Controller
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
      'title' => 'Pasien',
      'page'  => 'pasien/index',
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

  public function getAll($parent = '')
  {
    $id = $this->input->post('id');
    $no = 1;
    if ($id) {
      $this->db->where('id', $id);
      $array = $this->db->get('tb_user_jadwal')->row();
    } else {
      // $this->db->where('is_active', 1);
      $this->db->where('parent', $parent);
      $user = $this->db->get('tb_user_jadwal')->result();
      $array = [];
      foreach ($user as $key) {
        $this->db->where('id_user', $key->id_user);
        $user = $this->db->get('tb_user')->row();
        $array[] = [
          'no'   => $no,
          'id'   => $key->id,
          'id_hari'   => $key->parent,
          'id_user'  => $key->id_user,
          'dokter'  => strtoupper($user->nama),
          'waktu' => $key->hari . ' ' . $key->waktu . ', Jam ' . $key->start_time . ' s/d ' . $key->end_time,
          'status'  => ($key->is_active == 1) ? '<span class="aktif text-xs btn btn-sm btn-success">Aktif</span>' : '<span data-status="' . $key->is_active . '" data-id="' . $key->id . '"  class="text-xs btn btn-sm btn-danger hapus">Tidak Aktif</span>'
        ];
        $no++;
      }
    }
    echo json_encode($array);
  }

  public function add()
  {

    $this->form_validation->set_rules('id_user', 'Dokter', 'trim|required');
    $id = $this->input->post('id');

    if ($this->form_validation->run() == TRUE) {

      if ($id) {
        $this->db->where('id', $id);
        $user = $this->db->get('promo')->row();
        $data = array(
          'inputer'   => $this->session->userdata('id'),
          'id_user'    => $this->input->post('id_user'),
          'hari'   => $this->input->post('hari'),
          'parent'   => $this->input->post('parent'),
          'waktu'   => $this->input->post('waktu'),
          'start_time'   => $this->input->post('start_time'),
          'end_time'   => $this->input->post('end_time'),
          'ket'   => $this->input->post('ket'),
          'is_active'    => 1,
        );
        $this->db->where('id', $id);
        $this->db->update('tb_user_jadwal', $data);
        $aff = 'Data berhasil dirubah';
      } else {
        $data = array(
          'date_created'    => date('Y-m-d H:i:s'),
          'inputer'   => $this->session->userdata('id'),
          'id_user'    => $this->input->post('id_user'),
          'hari'   => $this->input->post('hari'),
          'parent'   => $this->input->post('parent'),
          'waktu'   => $this->input->post('waktu'),
          'start_time'   => $this->input->post('start_time'),
          'end_time'   => $this->input->post('end_time'),
          'ket'   => $this->input->post('ket'),
          'is_active'    => 1,
        );
        $this->db->insert('tb_user_jadwal', $data);
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

  public function hapus()
  {
    $id = $this->input->post('id');
    $status = $this->input->post('status');
    if ($status == 1) {
      $this->db->set('is_active', 0);
      $msg = 'Jadwal ini berhasil di non aktifkan';
    } else {
      $this->db->set('is_active', 1);
      $msg = 'Jadwal ini berhasil di aktifkan kembali';
    }
    $this->db->where('id', $id);
    $this->db->update('tb_user_jadwal');

    if ($this->db->affected_rows() > 0) {
      $result = ['sukses' => $msg];
    } else {
      $result = ['error' => 'Data gagal terhapus'];
    }
    echo json_encode($result);
  }
}


/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */