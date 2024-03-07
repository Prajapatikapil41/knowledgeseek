<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('users/Blogs_model', 'blog');
	}

    public function index()
	{
		$this->load->helper('text');
		$data['category'] = $this->blog->getCategory();
		$data['latestArticle'] = $this->blog->get_article();
		$id = $data['latestArticle']['id'];
		$data['allArticles'] = $this->blog->getAllArticles($id);
		$this->load->view('users/blogs/blogs', $data);
	}

	public function getCategoryArticle(){
		$this->load->helper('text');
		$id = $this->input->get("cat_id");
		$Adata['latestOne'] =  $this->blog->get_article($id);

		$article_id = $Adata['latestOne']['id'];
		$Adata['allCategoryArticle'] = $this->blog->getAllArticles($article_id, $id);
	
		$html = "";

        $html .= '<div class="card mb-3">';
            if ($Adata['latestOne'] != null & $Adata['latestOne']['status']==1) {
             $html .= '<img src="'. base_url().'public/uploads/articles/'. $Adata['latestOne']['image'] .' " style="width: 100%; height: 250px;" class="card-img-top" alt="..." />' .
                '<div class="card-body">'.
                '<h5 class="card-title">' . $Adata['latestOne']['category_name'] . '</h5>' .
                '<p class="card-text px-3">' .
                word_limiter(strip_tags($Adata['latestOne']['discription']), 50) .
                '<a href="#" class="text-primary"> Read More </a>' .
                '</p>' .
                '<div class="d-flex justify-content-between">' .
                '<p class="card-text"><small class="text-muted">Author - <span>' .
                $Adata['latestOne']['author'] .
                '</span></small></p>' .
                '<p class="card-text"><small class="text-muted">' .
                date("y-M-d",strtotime($Adata['latestOne']['created_at'])) .
                ' </small></p>' .
                '</div>' .
                '</div>';
            } else {

             $html .= '<img src="' . base_url().'public/uploads/articles/No-Image.jpg'.'" style="width: 100%; height: 250px;" class="card-img-top" alt="..." />' .
                ' <div class="card-body">' .
                ' <h5 class="card-title text-center" style="font-size: 50px; ">' .
                ' DATA NOT FOUND' .
                ' </h5>' .
                '</div>';
            }

           $html .= '</div>' .
              '<div class="row">';

            if ($Adata['allCategoryArticle'] != null) {
				foreach($Adata['allCategoryArticle'] as $element){
					if($element['status'] == 1){
               $html .= '<div class="col-sm-12 col-md-6 col-lg-6 col-12">' .
                  '<div class="card">' .
                  ' <img src="' . base_url().'public/uploads/articles/' . $element['image'] . '" class="card-img-top"  alt="...">' .
                  '<div class="card-body">' .
                  '<h5 class="card-title">' . $element['category_name'] . '</h5>' .
                  '<p class="card-text text-justify">' .
                   word_limiter(strip_tags($element['discription']), 50) .
                  '<a href="#" class="text-primary"> read more</a>' .
                  '</p >' .
                  '<div class="d-flex justify-content-between">' .
                  ' <p class="card-text"><small class="text-muted">Author - <span>' .
                  $element['author'] .
                  '</span></small></p>' .
                  '<p class="card-text"><small class="text-muted">' .
                    date("y-M-d",strtotime($element['created_at'])).
                  '</small></p>' .
                  '</div>' .
                  ' <a href="#">Click Me</a>' .
                  '</div>' .
                  '</div>' .
                  '</div>';
				}
			}
              }else{
				$html .= "DATA NOT FOUND";
			  }
          
           $html .= '</div >';

		echo json_encode($html);
	}

	public function blog2()
	{
		$this->load->view('users/blogs/blogs2');
	}

}
