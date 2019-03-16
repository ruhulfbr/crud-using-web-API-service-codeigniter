<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index(){
		$contact_json = file_get_contents("http://localhost/cicrud-ajax/contact/ShowAll");
		$data = array();
		$data['title'] = 'save';
		$data['contacts'] = json_decode($contact_json);
		$this->load->view('welcome_message',$data);
	}
	public function save(){
		$url = 'http://localhost/cicrud-ajax/contact/SaveContact';
		$data = array();
		$data['name'] = $this->input->post('name');
		$data['email'] =$this->input->post('email');
		$data['phone'] = $this->input->post('phone');
		$options = array(
		    'http' => array(
		        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		        'method'  => 'POST',
		        'content' => http_build_query($data),
		    ),
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		redirect('welcome');
	}
	public function delete($id){
		$username = 'ruhul';
		$password = '12345695';   //Here Send User Creadential for check access
		$delete_url = "http://localhost/cicrud-ajax/contact/DeleteContact/".$id.'/'.$password.'/'.$username;
		$contact_json = file_get_contents($delete_url);
		$contact = json_decode($contact_json);
		redirect('welcome');
	}
	public function edit($id){
		$contacts_json = file_get_contents("http://localhost/cicrud-ajax/contact/ShowAll");
		$url = "http://localhost/cicrud-ajax/contact/EditContact/".$id;
		$contact_json = file_get_contents($url);
		$data = array();
		$data['title'] = 'Edit';
		$data['contacts'] = json_decode($contacts_json);
		$data['contact'] = json_decode($contact_json);
		$this->load->view('welcome_message',$data);
	}
	public function update(){
		$url = 'http://localhost/cicrud-ajax/contact/UpdateContact';
		$data = array();
		$data['id'] = $this->input->post('contact_id');
		$data['name'] = $this->input->post('name');
		$data['email'] =$this->input->post('email');
		$data['phone'] = $this->input->post('phone');
		$options = array(
		    'http' => array(
		        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		        'method'  => 'POST',
		        'content' => http_build_query($data),
		    ),
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		redirect('welcome');
	}
}
