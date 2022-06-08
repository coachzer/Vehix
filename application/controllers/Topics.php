<?php
class Topics extends CI_Controller
{
    public function index($offset = 0)
    {

        $data = array();

        // Pagination Configuration
        $config['base_url'] = base_url() . 'topics/index/';
        $config['total_rows'] = $this->db->count_all('topics');;
        $config['per_page'] = 3;
        $config['uri_segment'] = 3;
        $config['attributes'] = array('class' => 'p-links');

        // Initialization of pagination
        $this->pagination->initialize($config);

        $data['title'] = 'Latest Topics';

        $data['topics'] = $this->topic_model->get_topics(FALSE, $config['per_page'], $offset);

        $this->load->view('templates/header');
        $this->load->view('topics/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug = NULL)
    {
        $data['topic'] = $this->topic_model->get_topics($slug);
        $topic_id = $data['topic']['id'];
        $data['comments'] = $this->comment_model->get_comments($topic_id);

        if (empty($data['topic'])) {
            show_404();
        }

        $data['title'] = $data['topic']['title'];

        $this->load->view('templates/header');
        $this->load->view('topics/view', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        // Check Login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $data['title'] = 'Create a Topic';

        $data['categories'] = $this->topic_model->get_categories();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('vehicle', 'Vehicle', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('topics/create', $data);
            $this->load->view('templates/footer');
        } else {
            // Upload Image
            $config['upload_path'] = './assets/images/topics';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '20480';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
                $errors = array('error' => $this->upload->display_errors());
                $topic_image = 'noimage.jpg';
            } else {
                $data = array('upload_data' => $this->upload->data());
                $topic_image = $_FILES['userfile']['name'];
            }


            $this->topic_model->create_topic($topic_image);

            // Set Message
            $this->session->set_flashdata('topic_created', 'Your topic has been created.');

            redirect('topics');
        }
    }

    public function delete($id)
    {
        // Check Login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $this->topic_model->delete_topic($id);

        // Set Message
        $this->session->set_flashdata('topic_deleted', 'Your topic has been deleted.');

        redirect('topics');
    }

    public function edit($slug)
    {
        // Check Login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $data['topic'] = $this->topic_model->get_topics($slug);

        // Check User
        if ($this->session->userdata('user_id') != $data['topic']['user_id']) {
            redirect('topics');
        }

        $data['categories'] = $this->topic_model->get_categories();

        if (empty($data['topic'])) {
            show_404();
        }

        $data['title'] = 'Edit Topic';

        $this->load->view('templates/header');
        $this->load->view('topics/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        // Check Login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $this->topic_model->update_topic();

        // Set Message
        $this->session->set_flashdata('topic_updated', 'Your topic has been updated.');

        redirect('topics');
    }

    // Update rating
    public function updateRating()
    {

        // user_id
        $user_id = $this->session->userdata('user_id');

        // POST values
        $topic_id = $this->input->post('topic_id');
        $rating = $this->input->post('rating');

        // Update user rating and get Average rating of a post
        $averageRating = $this->topic_model->user_rating($user_id, $topic_id, $rating);

        // Set Message
        $this->session->set_flashdata('rating_posted', 'Your rating has been updated.');

        echo $averageRating;
        exit;
    }
}
