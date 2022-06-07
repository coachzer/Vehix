<?php
class Rating_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_ratings()
    {
        $query = $this->db->get('ratings');
        return $query->result_array();
    }

    public function create($topic_id)
    {
        if ($this->session->userdata('user_id') != NULL) {
            $id = $this->session->userdata('user_id');
        } else {
            $id = 0;
        }

        $data = array(
            'category_id' => $this->input->post('category'),
            'rating_id' => $this->input->post('rating'),
            'topic_id' => $topic_id,
            'user_id' => $id
        );
        return $this->db->insert('ratings_of_member', $data);
    }
}
