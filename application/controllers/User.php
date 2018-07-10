<?php
/**
 * Created by PhpStorm.
 * User: hasyim
 * Date: 5/4/17
 * Time: 1:23 PM
 */

/*This class just for learn pagination puposes*/
class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('url'));
        $this->load->model('user_test_model');
        $this->load->library('pagination');
    }

    public function index()
    {
        $this->load->database();
        $jumlah_data = $this->user_test_model->jumlah_data();
        $config['base_url'] = base_url() . 'user/index';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 10;
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['user'] = $this->user_test_model->data($config['per_page'], $from);

        $this->load->view('user_test', $data);
    }

}