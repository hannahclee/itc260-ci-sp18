<?php
//application/models/Pics_model.php
class Pics_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
    
        public function get_pics($slug = FALSE)
        {
            if(!$slug)
            {
                return $pics= false;
            }
            $api_key = 'ddb95f7ea7950e349083b69b9a6ba0ed'; //into config
            $tags = $slug;

            $perPage = 25;
            $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search';
            $url.= '&api_key=' . $api_key;
            $url.= '&tags=' . $tags;
            $url.= '&per_page=' . $perPage;
            $url.= '&format=json';
            $url.= '&nojsoncallback=1';

            $response = json_decode(file_get_contents($url));
            $pics = $response->photos->photo;
            
            return $pics;
 
/*
echo "<pre>";
echo var_dump($response);
echo "</pre>";
die;
*/
        }//end of get_pics method
    
        public function set_pics()
        {
            $this->load->helper('url');

            $slug = url_title($this->input->post('title'), 'dash', TRUE);

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'text' => $this->input->post('text')
            );

        //return $this->db->insert('sp18_pics', $data);
            
            if($this->db->insert('sp18_pics', $data))
            {//data inserted, pass back slug
                return $slug;   
            }else{// data not inserted, pass back warning
                return false;
            }
        }//end set_pics method

  
}//end of News_model class