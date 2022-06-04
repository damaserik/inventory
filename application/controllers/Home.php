<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}

	public function shuttle2()
	{
	 $data =	$this->load->view('shuttle2/home_shuttle2');
	 $c['content'] =	$this->load->view('shuttle2/content', $data);
	}

	public function shuttle3()
	{
	 $data =	$this->load->view('shuttle3/home_shuttle3');
	 $c['content'] =	$this->load->view('shuttle3/content', $data);
	}

	public function ajl()
	{
	 $data =	$this->load->view('ajl/home_ajl');
	 $c['content'] =	$this->load->view('ajl/content', $data);
	}
		
	public function notfound()
	{
		$this->load->view('notfound404');
	}

}