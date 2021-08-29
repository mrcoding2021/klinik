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
 * @category  Controller MENU
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Menu extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->helper('tgl_indo');
    
  }

  public function index()
  {
    $id = $this->session->userdata('id');
    if ($id) {
      redirect('admin/menu');
    } else {
      redirect('auth');
    }
  }

  public function addMenu()
  {

    $this->form_validation->set_rules('nama', 'Nama Menu', 'trim|required');
    $this->form_validation->set_rules('akses', 'Hak Akses', 'trim|required');
    $this->form_validation->set_rules('icon', 'Menu Icon', 'trim|required');
    $this->form_validation->set_rules('link', 'Menu Link', 'trim|required');

    $nama = htmlspecialchars($this->input->post('nama'));
    $akses = $this->input->post('akses');
    $icon = htmlspecialchars($this->input->post('icon'));
    $link = htmlspecialchars($this->input->post('link'));
    $parent = $this->input->post('parent');
    $dropdown = $this->input->post('dropdown');
    $data = array(
      'nama' => $nama,
      'acces'   => $akses,
      'icon'    => $icon,
      'attr_href'    => $link,
      'parent'  => $parent,
      'dropdown' => $dropdown
    );

    if ($this->form_validation->run() == TRUE) {
      $this->db->insert('tb_menu', $data);
      $this->session->set_flashdata('alert', '<div class="alert alert-info">Menu baru berhasiil ditambahan</div>');
      redirect('admin/menu');
    } else {
      $this->session->set_flashdata('alert', '<div class="alert alert-danger">Mohon maaf, menu baru gagal di tambahkan</div>');
      redirect('admin/menu');
    }
  }

  public function editMenu()
  {

    $this->form_validation->set_rules('id_menu', 'Id Menu', 'trim|required');
    $this->form_validation->set_rules('nama', 'Nama Menu', 'trim|required');
    $this->form_validation->set_rules('akses', 'Hak Akses', 'trim|required');
    $this->form_validation->set_rules('icon', 'Menu Icon', 'trim|required');
    $this->form_validation->set_rules('link', 'Menu Link', 'trim|required');

    $id = htmlspecialchars($this->input->post('id_menu'));
    $nama = htmlspecialchars($this->input->post('nama'));
    $akses = $this->input->post('akses');
    $icon = htmlspecialchars($this->input->post('icon'));
    $link = htmlspecialchars($this->input->post('link'));
    $parent = $this->input->post('parent');
    $dropdown = $this->input->post('dropdown');

    $data = array(
      'nama' => $nama,
      'acces'   => $akses,
      'icon'    => $icon,
      'attr_href'    => $link,
      'parent'  => $parent,
      'dropdown' => $dropdown
    );
    $this->db->where('id_menu', $id);

    if ($this->form_validation->run() == TRUE) {
      $this->db->update('tb_menu', $data);
      $this->session->set_flashdata('alert', '<div class="alert alert-info">Menu baru berhasiil dirubah</div>');
      redirect('admin/menu');
    } else {
      $this->session->set_flashdata('alert', '<div class="alert alert-danger">Mohon maaf, menu baru gagal dirubah</div>');
      redirect('admin/menu');
    }
  }

  public function akses()
  {
    $id = $this->uri->segment(3);
    $data = $this->db->get_where('tb_menu', array('id_menu' => $id))->row_array();
    $akses = $data['is_active'];
    $this->db->where('id_menu', $id);
    if ($akses == 1) {
      $this->db->update('tb_menu', array('is_active' => 2));
    } elseif ($akses == 2) {
      $this->db->update('tb_menu', array('is_active' => 1));
    }
    redirect('admin/menu');
  }

  public function delete()
  {
    $id = $this->uri->segment(3);

    $this->db->where('id_menu', $id);
    $this->db->delete('tb_menu');
    redirect('admin/menu');
  }

  public function detail($id)
  {
    $id = str_replace('-', ' ', $id);
    $this->db->order_by('urutan', 'ASC');
    $data['menu'] = $this->db->get_where('tb_menu', array('acces' => 3, 'parent' => 0))->result_array();
    $this->db->where('nama', $id);
    $data['detail'] = $this->db->get('tb_menu')->row();
    $data['produk'] = $this->db->get('paket')->result();
    
    $data['title'] = $data['detail']->nama;
    $this->load->view('template/header', $data);
    $this->load->view('pages/menu', $data);
    $this->load->view('template/footer', $data);
  }

  public function menu()
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

      $data['title'] = 'Edit Menu';
      $data['admin'] = $this->db->query($query)->result_array();

      $this->db->where('acces', 3);
      $data['menu'] = $this->db->get('tb_menu')->result_array();
      $data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();
      $this->load->view('admin/header', $data);
      $this->load->view('admin/v_edit', $data);
      $this->load->view('admin/footer', $data);
    } else {
      redirect('auth');
    }
  }

  public function edit($menu)
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

      $data['admin'] = $this->db->query($query)->result_array();

      $this->db->where('id_menu', $menu);
      $data['menu'] = $this->db->get('tb_menu')->row_array();
      $data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();
      $data['title'] = 'Edit Menu';
      $this->load->view('admin/header', $data);
      $this->load->view('admin/v_editMenu', $data);
      $this->load->view('admin/footer', $data);
    } else {
      redirect('auth');
    }
  }

  public function edit_menu($id){
    
    $this->form_validation->set_rules('nama', 'Nama Slider', 'trim|required');
    $data= array(
      'nama' => $_POST['nama'],
      'isi'   => $_POST['isi']
    );

    $config['upload_path']          = './asset/img/slides/nivo/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['overwrite']            = true;
    $config['max_size']             = 2048; // 1MB

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('img')) {
      echo $this->upload->display_errors();
    } else {
      $img = $this->upload->data('file_name');
      $this->db->set('img', $img);
    }

    if ($this->form_validation->run() == TRUE) {
      $this->db->where('id_menu', $id);
      $this->db->update('tb_menu', $data);
      $this->session->set_flashdata('alert', '<div class="alert alert-info">Data baru berhasiil dirubah</div>');
      redirect('menu/edit/' . $id);
    } else {
      $this->session->set_flashdata('alert', '<div class="alert alert-danger">Mohon maaf. data gagal dirubah</div>');
      redirect('menu/edit/' . $id);
    }
    
  }
}


/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
