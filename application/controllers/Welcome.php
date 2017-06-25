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

		$queryPointsPerStudent = $this->db->query(
			'SELECT CONCAT(`meno`, " ", `priezvisko`) as student, SUM(body) as body FROM mydb.Znamky as z
JOIN mydb.Aktivity as a ON  z.Aktivity_idAktivity = a.idAktivity
GROUP BY student');
		$data['queryResultBody'] = $queryPointsPerStudent->result();


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

       	$postData = $this->input->post();

       	$insertData = array(
       				'meno' => $postData['name'],
       				'priezvisko' => $postData['surname'],
       				'datum' => $postData['date'],
       				'body' => $postData['points'],
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

	public function deleteGrade($id){
		$this->db->where('idZnamky', $id);
		$this->db->delete('Znamky');

		redirect(base_url(''), 'refresh');
	}

	public function deleteActivity(){
		$this->db->where('idAktivity', $id);
		$this->db->delete('Aktivity');

		redirect(base_url(''), 'refresh');
	}

	public function viewGradeUpdateForm($id){

		$queryGrade = $this->db->query('SELECT * FROM Znamky WHERE idZnamky ='.$id);
		$data['queryGrade'] = $queryGrade->result();

		$queryActivity = $this->db->query('SELECT * FROM Aktivity');
		$data['queryResultAktivity'] = $queryActivity->result();

		if (!isset($data['queryGrade'])){
			$data['heading'] = "Chyba";
			$data['message'] = "Znamka neexistuje!";
			
			return $this->load->view('errors/html/error_404', $data);
		}

		$this->load->view('grade_update', $data);
	}

	public function viewActivityUpdateForm($id){
		$queryActivity = $this->db->query('SELECT * FROM Aktivity WHERE idAktivity ='.$id);
		$data['queryActivity'] = $queryActivity->result();

		if (!isset($data['queryActivity'])){
			$data['heading'] = "Chyba";
			$data['message'] = "Znamka neexistuje!";
			
			return $this->load->view('errors/html/error_404', $data);
		}

		$this->load->view('activity_update', $data);
	}

	public function updateGrade($id){
		$postData = $this->input->post();

		$data = array(
					'meno' => $postData['name'],
       				'priezvisko' => $postData['surname'],
       				'datum' => $postData['date'],
       				'body' => $postData['points'],
       				'Aktivity_idAktivity' => $postData['activity']
			);

		$where = "idZnamky = ".$id;

		$query = $str = $this->db->update_string('Znamky', $data, $where);
		$this->db->query($query);

		redirect(base_url(''), 'refresh');
	}

	public function updateActivity($id){
		$postData = $this->input->post();

		$data = array(
					'nazov' => $postData['label'],
       				'popis' => $postData['info'],
       				'maximum' => $postData['max']
			);

		$where = "idAktivity = ".$id;

		$query = $str = $this->db->update_string('Aktivity', $data, $where);
		$this->db->query($query);

		redirect(base_url(''), 'refresh');
	}
}
