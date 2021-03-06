<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('tgl_indo');

		$this->load->helper('rupiah');
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

			$data['title'] = 'Dashboard';
			$data['admin'] = $this->db->query($query)->result_array();
			$data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();

			$this->load->view('admin/header', $data);
			$this->load->view('admin/v_dashboard', $data);
			$this->load->view('admin/footer', $data);
		} else {
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
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

			$data['title'] = 'Menu';
			$data['admin'] = $this->db->query($query)->result_array();
			$data['menu'] = $this->db->get('tb_menu')->result_array();
			$data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();
			$this->load->view('admin/header', $data);
			$this->load->view('admin/v_menu', $data);
			$this->load->view('admin/footer', $data);
		} else {
			redirect('auth');
		}
	}
}
