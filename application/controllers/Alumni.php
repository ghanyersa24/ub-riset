<?php 
class Alumni extends CI_Controller{

    function __construct()
	{
		parent::__construct();
		if ($this->session->logged_in) {
			redirect('admin');
		}
	}
    public function login()
    {
        $data = array(
            'title' => 'Login Alumni'
        );
        $this->load->view('account/alumni-login', $data);
    }
    public function register()
    {
        $data = array(
            'title' => 'Register Alumni'
        );
        $this->load->view('account/alumni-register', $data);
    }
}
?>