<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Galeri extends CI_Controller
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
      # code...
      $level = $this->session->userdata('level');
      $table = 'tb_user';
      $query = "SELECT `id_user`, `menu`
            FROM `tb_user_menu` JOIN `tb_menu_acces` 
              ON `tb_user_menu`.`id_user` = `tb_menu_acces`.`menu_id`
            WHERE `tb_menu_acces`.`role_id`= $level
          ORDER BY `tb_menu_acces`.`menu_id` ASC";
      $data['title'] = 'Agenda';
      $data['admin'] = $this->db->query($query)->result_array();
      $data['menu'] = $this->db->get('tb_menu')->result_array();
      $data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();
      $this->db->order_by('id_agenda','desc');
      $data['galeri'] = $this->db->get('tb_agenda')->result_array();

      $this->load->view('admin/header', $data);
      $this->load->view('admin/v_galeri', $data);
      $this->load->view('admin/footer', $data);
    } else {
      redirect('auth');
    }
  }


  public function addGaleri()
  {

    $this->form_validation->set_rules('nama', 'Judul galeri', 'trim|required');
    $this->form_validation->set_rules('isi', 'Isi galeri', 'trim|required');

    $judul = htmlspecialchars($this->input->post('nama'));
    $isi = htmlspecialchars($this->input->post('isi'));

    $id = $_POST['kategori'];
    $data = array(
      'nama' => $judul,
      'isi'   => $isi,
      'created_at'    => date('Y-m-d'),
      'kategori'  => $id
    );

    $config['upload_path']          = './asset/img/agenda/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->form_validation->run() == TRUE) {
      if (!$this->upload->do_upload('file')) {
        echo $this->upload->display_errors();
      } else {
        $img = $this->upload->data('file_name');
        $this->db->set('img', $img);
      }
      
      $this->db->set('kategori',$id);
      $this->db->insert('tb_agenda', $data);
      $this->session->set_flashdata('alert', '<div class="alert alert-info">Data baru berhasiil ditambahkan</div>');
      redirect('galeri');
    } else {
      $this->session->set_flashdata('alert', '<div class="alert alert-danger">Mohon maaf. data gagal ditambahkanh</div>');
      redirect('galeri');
    }
  }

  public function editGaleri()
  {


    $this->form_validation->set_rules('nama', 'Judul galeri', 'trim|required');
    $this->form_validation->set_rules('isi', 'Isi galeri', 'trim|required');

    $id = $_POST['id'];
    $judul = htmlspecialchars($this->input->post('nama'));
    $isi = htmlspecialchars($this->input->post('isi'));

    $data = array(
      'nama' => $judul,
      'isi'=> $isi
    );

    $config['upload_path']          = './asset/img/agenda/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 2000; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('file')) {
      echo $this->upload->display_errors();
    } else {
      $img = $this->upload->data('file_name');
      $this->db->set('img', $img);
    }
    if ($this->form_validation->run() == TRUE) {
      $this->db->where('id_agenda', $id);
      $this->db->update('tb_agenda', $data);
      $this->session->set_flashdata('alert', '<div class="alert alert-info">Data baru berhasiil dirubah</div>');
      redirect('galeri');
    } else {
      $this->session->set_flashdata('alert', '<div class="alert alert-danger">Mohon maaf. data gagal dirubah</div>');
      redirect('galeri');
    }
  }

  public function delete($id)
  {
    $this->db->where('id_agenda', $id);
    $this->db->delete('tb_agenda');
    $this->session->set_flashdata('alert', '<div class="alert alert-info">Data berhasil dihapus</div>');
    redirect('galeri');
  }
}


/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
