<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Layout {

	public function view($name, $data = array('title' => '')) {
		$CI =& get_instance();

		if (isset($data['title']) && $data['title'] == '') {
			$data = array('title' => $name); //definition nom par défaut si aucun n'est défini
		}
		$CI->load->view('templates/header', $data);
		$CI->load->view('templates/navbar');
		$CI->load->view($name, $data);
		$CI->load->view('templates/footer');
	}
}
