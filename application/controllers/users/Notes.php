<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notes extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('users/Users_Notes_model', 'UNM');
	}

    public function index()
	{
        $this->load->model('users/Users_model');
		$data['programe'] = $this->Users_model->getProgrames();
		$data['subAct'] = "service";
		$data['act'] = "note";
		$this->load->view('users/notes/notes', $data);
	}

	public function notesAjax(){
        $this->load->model('users/Users_model');
		$id = $this->input->get("prog_id");
		$branch_id = $this->input->get("branch_id");
		$data['branches'] = $this->Users_model->getBranches($id);
		$data['year_or_sem'] = $this->Users_model->get_year_or_sem($branch_id);

		echo json_encode($data);
	}


	public function getSubjects(){
		$sub_branch_id = $this->input->get("branch_id");
		$sub_year_or_sem_id =  $this->input->get("year_or_sem_id");
		$data['subjects'] = $this->UNM->getSubjects($sub_branch_id, $sub_year_or_sem_id);
		echo json_encode($data);
	}

    public function searchNotes(){
        $val = $this->input->get("search_val");
        $data['searchData'] =$this->UNM->searchNotes($val);

        echo json_encode($data);
    }

    public function showNotes($id){
		 $syllabus['syllab'] =$this->UNM->getSyllabus($id);
		$data = array();
		if(is_array($syllabus['syllab'])){
			foreach($syllabus['syllab'] as $val){
        	$data['notesData'] = $this->UNM->getNotes($id, $val['id']);
		}
		}
		
      	$this->load->view("users/notes/showNotes", $data);
    }
	

	public function downloadNote($note){
		$this->load->helper('download');

		force_download('public/uploads/notes/'.$note, NULL);
	}

}
