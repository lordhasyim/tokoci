<?php
/**
 * Created by PhpStorm.
 * User: hasyim
 * Date: 5/4/17
 * Time: 1:36 PM
 */

class User_test_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function data($number, $offset)
    {
        return $query = $this->db->get('user_test', $number, $offset)->result();
    }

    public function jumlah_data()
    {
        return $this->db->get('user_test')->num_rows();
    }
}