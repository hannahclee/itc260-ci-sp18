<?php

$this->load->view($this->config->item('theme') . 'header');
//application/views/pics/view.php

foreach($pics_item as $pic){ //into index?

    $size = 'm';
    $photo_url = '
    http://farm'. $pic->farm . '.staticflickr.com/' . $pic->server . '/' . $pic->id . '_' . $pic->secret . '_' . $size . '.jpg';


    echo '<div>' . "<img title='" . $pic->title . "' src='" . $photo_url . "' />" . '</div>' . '<div>' . $pic->title . '</div>';
 
}
$this->load->view($this->config->item('theme') . 'footer');