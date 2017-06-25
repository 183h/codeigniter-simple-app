<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$this->load->model('Znamka_model', '', TRUE);

		$queryZnamky = $this->db->query('SELECT * FROM Znamky');
		$queryAktivity = $this->db->query('SELECT * FROM Aktivity');
		$data['queryResultZnamky'] = $queryZnamky->result();
		$data['queryResultAktivity'] = $queryAktivity->result();

		$this->load->view('welcome_message', $data);
	}

	public function createGrade(){
		$data = array();
		
		if($this->input->post('submit')){
                 
   			$this->load->library('formvalidator');
   			if($this->formvalidator->isValid('contact')){            
      			//process data
      		}
      		else{
         		//show validation error
         		$data['statusMessage'] = validation_errors();
        		$data['statusSuccess'] = FALSE;
      		}
   		}
   	
   		$queryZnamky = $this->db->query('SELECT * FROM Znamky');
		$queryAktivity = $this->db->query('SELECT * FROM Aktivity');
		$data['queryResultZnamky'] = $queryZnamky->result();
		$data['queryResultAktivity'] = $queryAktivity->result();
       	//$data['contact_form'] = $this->config->item('contact_rules');

       	$postData = $this->input->post();

       	$insertData = array(
       				'meno' => $postData['name'],
       				'priezvisko' => $postData['surname'],
       				'datum' => $postData['date'],
       				'Aktivity_idAktivity' => $postData['activity']
       			);

		$query = $this->db->insert_string('Znamky', $insertData);
		$this->db->query($query);

		redirect(base_url(''), 'refresh');
	}

	public function createActivity(){
		$data = array();
		
		if($this->input->post('submit')){
                 
   			$this->load->library('formvalidator');
   			if($this->formvalidator->isValid('contact')){            
      			//process data
      		}
      		else{
         		//show validation error
         		$data['statusMessage'] = validation_errors();
        		$data['statusSuccess'] = FALSE;
      		}
   		}
   	
   		$queryZnamky = $this->db->query('SELECT * FROM Znamky');
		$queryAktivity = $this->db->query('SELECT * FROM Aktivity');
		$data['queryResultZnamky'] = $queryZnamky->result();
		$data['queryResultAktivity'] = $queryAktivity->result();
       	$data['contact_form'] = $this->config->item('contact_rules');

       	$postData = $this->input->post();

       	$insertData = array(
       				'nazov' => $postData['label'],
       				'popis' => $postData['info'],
       				'maximum' => $postData['max']
       			);

		$query = $this->db->insert_string('Aktivity', $insertData);
		$this->db->query($query);

		redirect(base_url(''), 'refresh');
	}
}
