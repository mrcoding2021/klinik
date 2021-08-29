<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Post extends CI_Controller
{
  protected $table = 'tb_post';

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
      'title' => 'Post',
      'page'  => 'artikel/index'
    ];
    $this->core($data);
  }

  public function getAll()
  {

    $this->db->where('is_active', 1);
    $user = $this->db->get('tb_post')->result();
    $array = [];
    $no = 1;
    foreach ($user as $key) {
      $array[] = [
        'no'        => $no++,
        'id'   => $key->id,
        'judul'   => $key->judul,
        'img'   => $key->img,
        'slug'   => '<a class="badge badge-info" href="' . base_url('post/detail/') . $key->slug . '">Detail</a><a class="hapus badge badge-danger" data-id="' . $key->id . '" href="#">Hapus</a>',
        'isi'   => $key->isi,
        'kategori' => $key->kategori
      ];
    }
    echo json_encode($array);
  }

  public function detail($id = '')
  {
    if ($id) {
      $data = [
        'title' => 'Detail Post',
        'page'  => 'artikel/detail',
        'post'  => $this->db->get_where('tb_post', ['slug' => $id])->row(),
        'kategori'  => $this->db->get('tb_post_kategori')->result()
      ];
    } else {
      $data = [
        'title' => 'Tambah Post',
        'page'  => 'artikel/detail',
        'post'  => (object)[
          'id'    => '',
          'judul' => '',
          'isi'   => '',
          'slug'  =>'',
          'img'   => '',
          'kategori'  => 0
        ],
        'kategori'  => $this->db->get('tb_post_kategori')->result()
      ];
    }
    $this->core($data);
  }

  public function add()
  {

    $this->form_validation->set_rules('judul', 'Judul Post', 'trim|required');
    $this->form_validation->set_rules('isi', 'Isi Post', 'trim|required');
    $id = $this->input->post('id');

    $config['upload_path']          = './asset/img/post/';
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
        $user = $this->db->get('tb_post')->row();
        $data = array(
          'judul'    => $this->input->post('judul'),
          'kategori'   => $this->input->post('kategori'),
          'isi'   => $this->input->post('isi'),
          'slug'   => strtolower(str_replace(' ','-',$this->input->post('judul'))),
          'img'       => ($img == null) ? $user->img : $img,
          'is_active'    => 1,
        );
        $this->db->where('id', $id);
        $this->db->update('tb_post', $data);
        $aff = 'Data berhasil dirubah';
      } else {
        $data = array(
          'date_created'    => date('Y-m-d H:i:s'),
          'judul'    => strtoupper($this->input->post('judul')),
          'kategori'   => $this->input->post('kategori'),
          'isi'   => $this->input->post('isi'),
          'slug'   => strtolower(str_replace(' ', '-', $this->input->post('judul'))),
          'img'       => $img,
          'is_active'    => 1,
        );
        $this->db->insert('tb_post', $data);
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
    $this->db->where('id', $id);
    $user = $this->db->get($this->table)->row();

    if ($user) {
      $result = ['sukses' => $user];
    } else {
      $result = ['error' => 'Data tidak boleh kosong, lengkapi data'];
    }
    echo json_encode($result);
  }

  public function artikel($id = '')
  {
    if ($id) {
      $this->db->where('slug', $id);
      $data['post'] = $this->db->get('tb_post')->row();
      $data['title'] = 'Blog Artile';
      $this->load->view('template/header', $data);
      $this->load->view('page/single-blog', $data);
      $this->load->view('template/footer', $data);
    } else {
      $data['posts'] = $this->db->get('tb_post')->result();
      $data['title']  = 'Blog Artikel';
      $this->load->view('template/header', $data);
      $this->load->view('page/blog', $data);
      $this->load->view('template/footer', $data);
    }
  }
  public function hapus($id)
  {
    $this->db->where('id', $id);
    $this->db->set('is_active', 0);
    $this->db->update('tb_post');

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