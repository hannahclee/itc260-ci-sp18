<?php
//application/controllers/Pics.php
class Pics extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('pics_model');
                $this->load->helper('url_helper');
                $this->config->set_item('banner','Pics Banner');
        }

        public function index()
        {
                $data['pics'] = $this->pics_model->get_pics();
                //$data['title'] = 'News archive';
                $this->config->set_item('title','Pics Title');
                $this->load->view('pics/index', $data);
        }

        public function view($slug = NULL)
        {
                $data['pics_item'] = $this->pics_model->get_pics($slug);

                if (empty($data['pics_item']))
                {
                        show_404();
                }
                //$data['title'] = $data['pics_item'];
                $this->config->set_item('title',$slug);
                $this->load->view('pics/view', $data);
            
     
        }//end of view
    
        public function create()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->config->set_item('title','Create');
            $data['title'] = 'Create a pics item';
                        
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('text', 'Text', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('pics/create', $data);

            }
            else
            {
                //$this->pics_model->set_pics();
                
                $slug = $this->pics_model->set_pics();
                
                if($slug !== false)
                 {   //data has been entered - show page
                    feedback('News item succesfully entered', 'info');
                    redirect('/pics/view/' . $slug);
                }else{//problem - show warning
                    feedback('News item not created', 'error');
                    redirect('/pics/create');
                }
                
            }
        }//end of create

    
}//end of class