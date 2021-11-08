<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{

    public function index()
    {
        $data = array(
            'title' => 'View Map',
            'isi' => 'v_home'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function marker()
    {
        $data = array(
            'title' => '<b>Mini Map Sekitar Kontrakan</b>',
            'isi' => 'v_marker'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }
}
