<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if(empty($this->session->userdata('adminName')) && empty($this->session->userdata('adminID'))){
            redirect(base_url().'admin/Admin_login/index');
        }
        $this->load->model("admin/Books_model", "book");
        
    }

    public function index()
    {
        $data['mainModules'] = "books";
        $this->load->view("admin/books/books", $data);
    }


  public function getSubjectData($page= 1) 
  {
            $perpage = 6;
            $param['offset'] = $perpage;
            $param['limit'] = ($page*$perpage-$perpage);
            $this->load->library("pagination");
            $config['base_url']   = "#";
            $config['total_rows'] =   $this->book->subjectsCount();
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
            $data['subjects_data'] =  $this->book->getSubjectData($param);
            echo json_encode($data);
    }


        public function addBooks(){
          
            $config['upload_path']   = './public/uploads/books';
            $config['allowed_types'] = 'pdf|doc|docx';
            $config['max_size'] = 100000;
            $config['file_name']  = $this->input->post('name');

            $this->load->library('upload', $config);

                if(!$this->upload->do_upload("book")) {

                    $error = $this->upload->display_errors();
                    $data['Error'] =  $error;
                   
                }else{

                    $books_data = $this->input->post();
                    $book = $this->upload->data();

                    $books_data['book'] = $book['file_name'];
                    $books_data['created_at'] = date("y-m-d  H:i:s");

                     $result = $this->book->addBooks($books_data);
                      if($result){
                            $data['res'] = "add";
                      }else{
                        $data['res'] = "error";
                      }
                }
              echo json_encode($data);
        }


        public function getBooksData(){
             $id= $this->input->get("sub_id");
              $data['books_data'] =  $this->book->getBooksData($id);
              echo json_encode($data);
        }

    public function viewBooksData()
    {
      $id =$this->input->get("view_id");
      $result = $this->book->viewBooksData($id);
      echo json_encode($result);
    }
  

     public function editBook(){
        $id =$this->input->get("books_id");
       $result = $this->book->editBook($id);
       echo json_encode($result);
    }

    public function updateBooks($id)
    {
        $check = $this->book->viewBooksData($id);
        if (!empty($_FILES['book']['name'])) {
            $config['upload_path']   = './public/uploads/books';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 100000;
            $config['file_name']  = $this->input->post('name');
            $this->load->library('upload', $config);

            if(!$this->upload->do_upload("book")) {
                $error = $this->upload->display_errors();
                $datas['Error'] =  $error;
               
            }else{
               
                if($check['book'] != '' && file_exists("./public/uploads/books/".$check['book'])){
                  unlink("./public/uploads/books/".$check['book']);
                }

                $books_data = $this->input->post();
                $book = $this->upload->data();

                $books_data['book'] = $book['file_name'];
                $books_data['updated_at'] = date("y-m-d  H:i:s");

                 $result = $this->book->updateBooks($id, $books_data);
                  if($result){
                        $datas['res'] = "update";
                  }else{
                    $datas['res'] = "error";
                  }
                
            }
        }else{

            $books_data = $this->input->post();
            $books_data['updated_at'] = date("d-m-y H:i:s");
            $books_data['book'] = $check['book'];
             $result = $this->book->updateBooks($id, $books_data);
              if($result){
                    $datas['res'] = "update";
              }else{
                $datas['res'] = "error";
              }
        }
          echo json_encode($datas);
      
    }

    public function deleteBooks()
    {
      $id = $this->input->get("del_id");
      $check = $this->book->viewBooksData($id);
      if(file_exists("./public/uploads/books/".$check['book'])){
        unlink("./public/uploads/books/".$check['book']);
      }
      $data['res'] = $this->book->deleteBooks($id);
        echo json_encode($data);
    }

    public function searchBooks()
    {
       $search = $this->input->get("search_data");
       $searchData = $this->book->searchBooks($search);
       echo json_encode($searchData);

    }

   
     public function updateStatus()
    {
        $id = $this->input->get("stat_id");
        $res = $this->book->updateStatus($id);
        echo json_encode($res);
    }

}
?>
