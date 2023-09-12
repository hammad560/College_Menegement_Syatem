<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Coadmin extends MY_Controller
{
public function dashboard(){
    $this->load->model('quries');
    $college_id = $this->session->userdata('college_id');
    $students['student'] = $this->quries->getStudents($college_id);
    $this->load->view('users', $students);
}
}

?>