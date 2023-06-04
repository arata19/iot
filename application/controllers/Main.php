<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['judul'] = "Dashboard";
		$this->template->load('main_template', 'main/dashboard', $data);
	}

	public function dashboard()
	{
		OB_START();
		$data['judul'] = "Dashboard";
		$this->load->view('main/dashboard', $data);
		$konten = ob_get_clean();
		echo JSON_ENCODE(array("status" => TRUE, "konten" => $konten));
	}

	public function tracking()
	{
		OB_START();
		$data['judul'] = "Tracking";
		$this->load->view('main/tracking', $data);
		$konten = ob_get_clean();
		echo JSON_ENCODE(array("status" => TRUE, "konten" => $konten));
	}

	public function user_js_jsp()
	{
		OB_START();
		$data['judul'] = "Data User JS/JSP";
		$this->load->view('main/user_js_jsp', $data);
		$konten = ob_get_clean();
		echo JSON_ENCODE(array("status" => TRUE, "konten" => $konten));
	}

	public function alat_tracking()
	{
		OB_START();
		$data['judul'] = "Data Alat Tracking";
		$this->load->view('main/alat_tracking', $data);
		$konten = ob_get_clean();
		echo JSON_ENCODE(array("status" => TRUE, "konten" => $konten));
	}

	public function form_alat_tracking()
	{
		OB_START();
		$this->load->view('main/alat_tracking_form');
		$konten = ob_get_clean();
		echo JSON_ENCODE(array("status" => TRUE, "konten" => $konten));
	}

	public function pengaturan_yurisdiksi()
	{
		OB_START();
		$data['judul'] = "Pengaturan Yurisdiksi";
		$this->load->view('main/pengaturan_yurisdiksi', $data);
		$konten = ob_get_clean();
		echo JSON_ENCODE(array("status" => TRUE, "konten" => $konten));
	}

	public function form_pengaturan_yurisdiksi()
	{
		OB_START();
		$this->load->view('main/pengaturan_yurisdiksi_form');
		$konten = ob_get_clean();
		echo JSON_ENCODE(array("status" => TRUE, "konten" => $konten));
	}

	public function panggilan_sidang()
	{
		OB_START();
		$data['judul'] = "Panggilan Sidang";
		$this->load->view('main/panggilan_sidang', $data);
		$konten = ob_get_clean();
		echo JSON_ENCODE(array("status" => TRUE, "konten" => $konten));
	}

	public function form_panggilan_sidang()
	{
		OB_START();
		$this->load->view('main/panggilan_sidang_form');
		$konten = ob_get_clean();
		echo JSON_ENCODE(array("status" => TRUE, "konten" => $konten));
	}

	public function list_perkara()
	{
		OB_START();
		$this->load->view('main/list_perkara');
		$konten = ob_get_clean();
		echo JSON_ENCODE(array("status" => TRUE, "konten" => $konten));
	}
}
