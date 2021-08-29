<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Produk extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->helper('rupiah');
    $this->load->helper('tgl_indo');
    
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
      $data['title'] = 'Produk';
      $data['admin'] = $this->db->query($query)->result_array();
      $data['menu'] = $this->db->get('tb_menu')->result_array();
      $queryJoin = 'SELECT * FROM tb_produk JOIN tb_kategori ON tb_produk.kategori = tb_kategori.id_kategori ORDER BY id_produk DESC';
      $this->db->order_by('id_paket', 'desc');

      $data['produk'] = $this->db->get('paket')->result_array();
      $data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();
      $data['slider'] = $this->db->get('tb_slider')->result_array();

      $this->load->view('admin/header', $data);
      $this->load->view('admin/v_produk', $data);
      $this->load->view('admin/footer', $data);
    } else {
      # code...
      redirect('home');
    }
  }

  public function addProduk()
  {

    $this->form_validation->set_rules('nama', 'Nama Produk', 'trim|required');
    $judul = htmlspecialchars($this->input->post('nama'));

    $data = array(
      'nama' => $judul,
      'isi' => $_POST['isi'],
      'kategori' => $_POST['kategori']
    );

    $config['upload_path']          = './asset/img/produk/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 2024;

    $this->load->library('upload', $config);

    if ($this->form_validation->run() == TRUE) {
      if (!$this->upload->do_upload('img')) {
        echo $this->upload->display_errors();
      } else {
        $img = $this->upload->data('file_name');
        $this->db->set('img', $img);
      }
      $this->db->insert('paket', $data);
      $this->session->set_flashdata('alert', '<div class="alert alert-info">Data baru berhasiil ditambahkan</div>');
      redirect('produk');
    } else {
      $this->session->set_flashdata('alert', '<div class="alert alert-danger">Mohon maaf. data gagal ditambahkanh</div>');
      redirect('produk');
    }
  }

  public function editProduk($id)
  {

    $this->form_validation->set_rules('nama', 'Nama Produk', 'trim|required');


    $judul = htmlspecialchars($this->input->post('nama'));

    $data = array(
      'nama' => $judul,
      'isi' => $_POST['isi'],
      'kategori' => $_POST['kategori']
    );

    $config['upload_path']          = './asset/img/produk/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 2048; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('img')) {
      $this->upload->display_errors();
    } else {
      $img = $this->upload->data('file_name');
      $this->db->set('img', $img);
    }
    if ($this->form_validation->run() == TRUE) {
      $this->db->where('id_paket', $id);
      $this->db->update('paket', $data);
      $this->session->set_flashdata('alert', '<div class="alert alert-info">Data baru berhasiil dirubah</div>');
      redirect('produk');
    } else {
      $this->session->set_flashdata('alert', '<div class="alert alert-danger">Mohon maaf. data gagal dirubah</div>');
      redirect('produk');
    }
  }

  public function delete($id)
  {
    $this->db->where('id_paket', $id);
    $this->db->delete('paket');
    $this->session->set_flashdata('alert', '<div class="alert alert-info">Data berhasil dihapus</div>');
    redirect('produk');
  }

  public function detail($id2)
  {
    

    $this->db->where('acces', 3);
    $data['menu'] = $this->db->get('tb_menu')->result_array();
    
    $id2 = str_replace('-', ' ', $id2);
    $this->db->where('id_paket', $id2);
    $data['detail'] = $this->db->get('paket')->row();

    $data['title'] = $data['detail']->nama;

    $this->load->view('template/header', $data);
    $this->load->view('pages/detail', $data);
    $this->load->view('template/footer', $data);
  }
}
