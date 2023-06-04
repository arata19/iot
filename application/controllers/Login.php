<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		$data['judul'] = "Login";
		$this->template->load('login_template', '', $data);
	}
}
