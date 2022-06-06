<?php
class User_model extends CI_Model
{
    public function register($enc_password)
    {
        // User data array 
        $data = array(
            'name' => $this->input->post('name'),
            'surname' => $this->input->post('surname'),
            'vehicle' => $this->input->post('vehicle'),
            'zipcode' => $this->input->post('zipcode'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $enc_password
        );

        // Insert user
        return $this->db->insert('users', $data);
    }

    public function login($username, $password)
    {
        // Validate
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('users');

        if ($result->num_rows() == 1) {
            return $result->row(0)->id;
        } else {
            return false;
        }
    }

    // Check if the username already exists in the database
    public function check_username_exists($username)
    {
        $query = $this->db->get_where('users', array('username' => $username));

        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }

    // Check if the email already exists in the database
    public function check_email_exists($email)
    {
        $query = $this->db->get_where('users', array('email' => $email));

        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }

    public function get_topic_user($user_id, $topic_id)
    {
        $this->db->where('id', $user_id);
        $query = $this->db->get_where('topics', array('id' => $topic_id))->row_array;

        $result = $this->db->get('users');

        if ($result->num_rows() == 1) {
            print_r($result->row(0)->$query['id']);
            $this->db->where('id', $result->row(0)->RID);
            $res = $this->db->get('topics');
            if ($res->num_rows() == 1) {
                return $res->row(0)->$query['slug'];
            } else return false;
        } else {
            return false;
        }
    }
}
