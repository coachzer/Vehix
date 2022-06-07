<?php
class Comments extends CI_Controller
{
    public function create($topic_id)
    {
        $slug = $this->input->post('slug');
        $data['topic'] = $this->topic_model->get_topics($slug);

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('topics/view', $data);
            $this->load->view('templates/footer');
        } else {
            $this->comment_model->create_comment($topic_id);
            redirect('topics/' . $slug);
        }
    }

    public function delete($id)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $this->comment_model->delete_comment($id);

        // Set Message
        $this->session->set_flashdata('comment_deleted', 'Comment has been deleted successfully.');
        redirect('topics');
    }
}
