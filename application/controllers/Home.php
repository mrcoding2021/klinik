<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()

	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Model_global', 'mapp');
		$this->load->helper('rupiah');
		$this->load->helper('tgl_indo');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function core($data)
	{
		$data['menu'] = $this->db->get_where('tb_menu', array('acces' => 3, 'parent' => 0))->result_array();
		$this->load->view('template/header', $data);
		$this->load->view($data['view'], $data);
		$this->load->view('template/footer', $data);
	}

	public function index()
	{
		$data = [
			'title'		=> 'Imani Medika',
			'view'		=> 'index'
		];
		$this->db->order_by('id_slider', 'DESC');
		$data['slider'] = $this->db->get('tb_slider')->result();
		$this->core($data);
	}

	public function klinik_pratama()
	{
		$data = [
			'title'		=> 'Klinik Pratama',
			'view'		=> 'page/pratama'
		];
		$this->core($data);
	}



	public function dokter()

	{
		$data = [
			'title'		=> 'Dokter',
			'view'		=> 'page/dokter'
		];
		$this->core($data);
	}

	public function profile($id = '')
	{
		$data = [
			'title'		=> 'Profil Dokter',
			'view'		=> 'dokter/profil'
		];
		$nama = str_replace('-', ' ', $id);

		$this->db->where('nama', $nama);
		$this->db->where('level', 3);
		$this->db->where('is_active', 1);
		$data['dokter'] = $this->db->get('tb_user')->row();
		$this->core($data);
	}

	public function promo()

	{
		$data = [
			'title'		=> 'Promo',
			'view'		=> 'page/promo'
		];
	
		$this->db->where('is_active', 1);
		$data['promo'] = $this->db->get('promo')->result();
		$this->core($data);
	}

	public function detail($nama = '', $id = '')
	{
		$data = [
			'title'		=> 'Detail Promo',
			'view'		=> 'promo/detail'
		];
		$nama = str_replace('-', ' ', $nama);

		$this->db->where('id', $id);
		$data['promo'] = $this->db->get('promo')->row();
		$this->core($data);
	}

	public function cek()
	{
		$data = [
			'title'		=> 'Cek Kesehatan',
			'view'		=> 'page/cek-kesehatan'
		];
		$this->core($data);
	}



	public function booking()
	{
		$data = [
			'title'		=> 'Booking',
			'view'		=> 'page/booking'
		];
		$this->core($data);
	}

	public function profil()
	{
		$data = [
			'title'		=> 'Profil',
			'view'		=> 'page/profil'
		];
		$this->core($data);
	}

	public function kontak()
	{
		$data = [
			'title'		=> 'Kontak',
			'view'		=> 'page/kontak'
		];
		$this->core($data);
	}
}
