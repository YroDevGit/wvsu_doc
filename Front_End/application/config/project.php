<?php

/* Don't delete this, this is just a referrence
defined('BASEPATH') OR exit('No direct script access allowed');

class project extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    // Function to add new project ($data is an array where input value are stored)
    public function insertProject($data) {
        $this->db->insert('projects', $data);
        if ($this->db->affected_rows() > 0) {
            return true; 
        } else {
            return false;
     }
    }

    // Function to show/search project. ($key is the value of the search input field)
    public function showProject($key){
        $this->db->group_start();
        $this->db->like("assignee",$key);
        $this->db->or_like("project",$key);
        $this->db-> group_end();
        $this->db->where("status","0");
        $query = $this->db->get('projects');
        return $query->result(); 
    }

    // Function to delete project ($key is the project unique ID) (I'm using not literal delete)
    public function deleteProject($key){
        $this->db->where('ID', $key);
        $this->db->update('projects',["status"=>"1"]);
        return true;
    }
    public function updateProject($data,$id){
        $this->db->where('ID', $id);
        $this->db->update('projects',$data);
        return true;
    }
}

 public function get_user($username, $password) { 
        $query = $this->db->get_where('users', array('username' => $username, 'password' => $password));
        return $query->row_array();
    }

*/
?>
