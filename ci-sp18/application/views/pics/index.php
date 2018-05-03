<?php
//application/views/pics/index.php

$this->load->view($this->config->item('theme') . 'header');


?>
<h2>Pics</h2>
<ul>
    <li><?=anchor('pics/view/seattle-mariners','Mariners')?></li>
    <li><?=anchor('pics/view/seahawks','Seahawks')?></li>
    <li><?=anchor('pics/view/sounders','Sounders')?></li>
</ul>

<?php
$this->load->view($this->config->item('theme') . 'footer');

?>