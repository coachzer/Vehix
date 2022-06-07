<?php
class Topic_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_topics($slug = FALSE, $limit = FALSE, $offset = FALSE)
    {
        if ($limit) {
            $this->db->limit($limit, $offset);
        }

        if ($slug === FALSE) {
            $this->db->order_by('topics.id', 'DESC');
            $this->db->join('categories', 'categories.id = topics.category_id');
            $query = $this->db->get('topics');
            return $query->result_array();
        }

        $query = $this->db->get_where('topics', array('slug' => $slug));
        return $query->row_array();
    }

    public function create_topic($topic_image)
    {
        // form values
        $slug = url_title($this->input->post('title'));

        $url = $this->input->post('url');

        // stackoverflow - https://stackoverflow.com/questions/412467/how-to-embed-youtube-videos-in-php

        $ytarray = explode("/", $url);
        $ytendstring = end($ytarray);
        $ytendarray = explode("?v=", $ytendstring);
        $ytendstring = end($ytendarray);
        $ytendarray = explode("&", $ytendstring);
        $ytcode = $ytendarray[0];

        $url = "https://www.youtube.com/embed/$ytcode";

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'vehicle' => $this->input->post('vehicle'),
            'url' => $url,
            'body' => $this->input->post('body'),
            'category_id' => $this->input->post('category_id'),
            'user_id' => $this->session->userdata('user_id'),
            'topic_image' => $topic_image,
        );

        return $this->db->insert('topics', $data);
    }

    public function delete_topic($id)
    {
        $image_file_name = $this->db->select('topic_image')->get_where('topics', array('id' => $id))->row()->topic_iamge;
        $cwd = getcwd();
        $image_file_name = $cwd . "\\assets\\images\\topics\\";
        chdir($image_file_name);
        unlink($image_file_name);
        chdir($cwd);
        $this->db->where('id', $id);
        $this->db->delete('topics');
        return true;
    }

    public function update_topic()
    {
        // form values
        $slug = url_title($this->input->post('title'));

        $url = $this->input->post('url');

        $ytarray = explode("/", $url);
        $ytendstring = end($ytarray);
        $ytendarray = explode("?v=", $ytendstring);
        $ytendstring = end($ytendarray);
        $ytendarray = explode("&", $ytendstring);
        $ytcode = $ytendarray[0];

        $url = "https://www.youtube.com/embed/$ytcode";

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'vehicle' => $this->input->post('vehicle'),
            'url' => $url,
            'body' => $this->input->post('body'),
            'category_id' => $this->input->post('category_id'),
        );

        $this->db->where('id', $this->input->post('id'));

        return $this->db->update('topics', $data);
    }

    public function get_categories()
    {
        $this->db->order_by('name');
        $query = $this->db->get('categories');
        return $query->result_array();
    }

    public function get_topics_by_category($category_id)
    {
        $this->db->order_by('topics.id', 'DESC');
        $this->db->join('categories', 'categories.id = topics.category_id');
        $query = $this->db->get_where('topics', array('category_id' => $category_id));
        return $query->result_array();
    }

    // Save user rating
    public function userRating($user_id, $topic_id, $rating)
    {
        $this->db->select('*');
        $this->db->from('ratings');
        $this->db->where("topic_id", $topic_id);
        $this->db->where("user_id", $user_id);
        $userRatingquery = $this->db->get();

        $userRatingResult = $userRatingquery->result_array();
        if (count($userRatingResult) > 0) {

            $postRating_id = $userRatingResult[0]['id'];
            // Update
            $value = array('rating' => $rating);
            $this->db->where('id', $postRating_id);
            $this->db->update('ratings', $value);
        } else {
            $userRating = array(
                "topic_id" => $topic_id,
                "user_id" => $user_id,
                "rating" => $rating
            );

            $this->db->insert('ratings', $userRating);
        }

        // Average rating
        $this->db->select('ROUND(AVG(rating),1) as averageRating');
        $this->db->from('rating');
        $this->db->where("topic_id", $topic_id);
        $ratingquery = $this->db->get();

        $topicResult = $ratingquery->result_array();

        $rating = $topicResult[0]['averageRating'];

        if ($rating == '') {
            $rating = 0;
        }

        return $rating;
    }
}
