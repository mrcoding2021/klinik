<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
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
			'title'		=> 'Pendaftaran Online',
			'view'		=> 'pendaftaran/index'
		];
		$this->db->order_by('id_slider', 'DESC');
		$data['slider'] = $this->db->get('tb_slider')->result();
		$this->core($data);
	}

	public function umum()
	{
		$data = [
			'title'		=> 'Pendaftaran Gigi, Umum dan Spesialis',
			'view'		=> 'pendaftaran/umum'
		];
		$this->core($data);
	}

	public function vaksin()

	{
		$data = [
			'title'		=> 'Pendaftaran Vaksin',
			'view'		=> 'pendaftaran/vaksin'
		];
		$this->core($data);
	}

	public function poli($id = '')
	{
		if ($id == '') {
			$data = [
				'title'		=> 'Jadwal Praktek Dokter',
				'view'		=> 'pendaftaran/poli'
			];
		} else {
			$data = [
				'title'		=> 'Jadwal Praktek Dokter',
				'view'		=> 'pendaftaran/beforePoli'
			];
		}
		
		$this->core($data);
	}

	public function form()
	{
		$data = [
			'title'		=> 'Formulir Pendaftaran Online',
			'view'		=> 'pendaftaran/form'
		];
		
		$this->core($data);
	}
}
