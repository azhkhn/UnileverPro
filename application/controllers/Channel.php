<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Channel extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model("dto/DtoChannels");
			$this->load->model("dao/ChannelDAO");
		}

		public function index(){
			//$this->load->view('channel');
			$this->listpro();
		}
		
		public function add(){
			$this->load->view('addchannel');
		}
		
		public function addingpro(){
			$this->DtoChannels->setName($this->input->post('name'));
			$this->DtoChannels->setDescription($this->input->post('description'));
			$this->DtoChannels->setCreated_by(1);
			$this->ChannelDAO->addChannel($this->DtoChannels);
			redirect("channel");
		}
		
		public function listpro(){
			$data['lists'] = $this->ChannelDAO->listChannels();
			$this->load->view('channel', $data);
		}
		
		public function deletepro($id){
			$this->ChannelDAO->deleteChannel($id);
			redirect('channel');
		}

		public function getpro($id){
			$data['getpro'] = $this->ChannelDAO->getChannel($id);
			$this->load->view('addchannel', $data);
		}

		public function updatepro($id){
			$this->DtoChannels->setId($id);
			$this->DtoChannels->setName($this->input->post('name'));
			$this->DtoChannels->setDescription($this->input->post('description'));
			$this->DtoChannels->setUpdated_by(1);
			
			$this->ChannelDAO->updateChannel($this->DtoChannels);
			redirect('channel');
			
		}
	
	}
?>