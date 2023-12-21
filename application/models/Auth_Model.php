<?php 
defined('BASEPATH') or exit('No Direct Access Allowed');

class Auth_model extends CI_Model {
           
	
    function login($username, $password) {

        $this->db->select('*');
        $this->db->from('user a');
        $this->db->join('role b', 'a.`id_role`=b.`id_role`', 'left');
        $this->db->where('a.`username`', $username);
        $this->db->where('a.`password`', $password);
        $query = $this->db->get();

        ## cek data ditemukan tidak
        if ($query->num_rows() == 1) {
            
            $result = $query->result_array();
            
            ## cek data user sudah diaktifkan belum
            if ($result[0]['active']) {
                
                $_SESSION['userdata']['id_user'] = $result[0]['id_user'];
	            $_SESSION['userdata']['email'] = $result[0]['email'];
	            $_SESSION['userdata']['username'] = $result[0]['username'];
	            $_SESSION['userdata']['nama_user'] = $result[0]['nama_user'];
	            $_SESSION['userdata']['active'] = $result[0]['active'];
	            $_SESSION['userdata']['id_role'] = $result[0]['id_role'];
	            $_SESSION['userdata']['nama_role'] = $result[0]['nama_role'];
	            $_SESSION['userdata']['is_login'] = 1;
                
	            return 1;
	            
            } else {

            	return 0;

            }               

        } else {

            return 0;

        }
    }
    
    function check_login(){
        
    	if ( isset($_SESSION['userdata']['is_login']) && $_SESSION['userdata']['is_login'] == 1 ) {
    
    		return 1;
    		
    	} else {

    		return 0;

    	}

    }
}
 