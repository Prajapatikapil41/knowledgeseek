	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	public function __construct(){
		parent::__construct();
        if(empty($this->session->userdata('adminName')) && empty($this->session->userdata('adminID'))){
			redirect(base_url().'kSeek/control_panel/unlock');
		}

		$this->load->model('admin/Contact_model', 'con');
	}

    public function index($page = 1){
        $perpage = 6;
        $param['offset'] = $perpage;
        $param['limit'] = ($page*$perpage-$perpage);

        $this->load->library("pagination");

		$config['base_url']   = base_url('admin/Contact/index');
		$config['total_rows'] =  $this->con->totalData($param);
		$config['per_page'] = $perpage;
		$config['use_page_numbers'] = true;

		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] = "</ul>";
		$config['num_tag_open']   = "<li class='page_item'>";
		$config['num_tag_close']   = "</li>";
		$config['cur_tag_open'] = "<li class='disabled page_item'><li class='active page_item'><a href='#' class=\"page-link\">";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] =  "<li class=\"page-item\">";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li class=\"page-item\">";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li class=\"page-item\">";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] =  "<li class=\"page-item\">";
		$config['last_tagl_close'] = "</li>";	
		$config['attributes'] = array('class' => 'page-link');	

		$this->pagination->initialize($config);
		$pagination_link = $this->pagination->create_links();

        $data['pagination_link'] = $pagination_link;
        $data['contactDetail'] = $this->con->getContacts($param);
        $data['mainModules'] = "contact";
      
         $this->load->view("admin/contactUs/contacts_list", $data);
        
    }


    public function getContactInfo(){
        $id = $this->input->get('id');
        $result = $this->con->getContactInfo($id);
    
        echo json_encode($result);
    }

	
    public function delete($id){
      	$this->con->delete($id);
		$this->session->set_flashdata("deleteCon", "Delete Successfully");
		redirect(base_url()."contact_detail");
    }

}
?>

