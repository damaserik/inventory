<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}

	public function shuttle2()
	{
	 $data =	$this->load->view('ajl/home_ajl');
	 $c['content'] =	$this->load->view('ajl/content', $data);
	}

}