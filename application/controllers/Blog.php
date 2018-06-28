<?php 

class Blog extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();	

		//Load models 
		$this->load->model('Post_model','post');
		$this->load->model('Login_database');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load libraries
        $this->load->database();

		//Load helpers
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->helper('form');
	
	}

	/**
	 * Show login page
	 */
	public function index() {
		$this->load->view('login_form');
	}

	/**
	 * Show registration page
	 */
	public function user_registration_show() {
		$this->load->view('registration_form');
	}

	/**
	 *Validate and store registration data in database
	 */
	public function new_user_registration() {

				// Check validation for user input in SignUp form
				$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
				$this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('registration_form');
				} else {
					$data = array(
					'user_name' => $this->input->post('username'),
					'user_email' => $this->input->post('email_value'),
					'user_password' => $this->input->post('password')
				);

				$result = $this->Login_database->registration_insert($data);

				if ($result == TRUE) {
					$data['message_display'] = 'Registration Successfully !';
					$this->load->view('login_form', $data);
				} else {
					$data['message_display'] = 'Username already exist!';
					$this->load->view('registration_form', $data);
			}
		}
	}

	/**
	 * Check for user login process
	 */
	public function user_login_process() {

				$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

				if ($this->form_validation->run() == FALSE) {

					if(isset($this->session->userdata['logged_in'])){
						$this->blogposts();
					}else{
						$this->load->view('login_form');
						
					}
					} else {
						$data = array(
						'username' => $this->input->post('username'),
						'password' => $this->input->post('password')
						);
						$result = $this->Login_database->login($data);
					if ($result == TRUE) {

						$username = $this->input->post('username');
						$result = $this->Login_database->read_user_information($username);
					if ($result != false) {
						$session_data = array(
						'username' => $result[0]->user_name,
						'email' => $result[0]->user_email,
						);
						
						// Add user data in session
						$this->session->set_userdata('logged_in', $session_data);
						$this->blogposts();
				}
				} else {
					$data = array(
					'error_message' => 'Invalid Username or Password'
					);
					$this->load->view('login_form', $data);
			}
		}
	}

	/**
	 * Logout from admin page
	 */
	public function logout() 
	{

		// Removing session data
		$sess_array = array(
		'username' => ''
		);

		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		$this->load->view('login_form', $data);
	}

	/**
	 * Show all Blog Posts for User
	 */
	public function blogposts()
	{
		//Get data from the model
		$data['posts'] = $this->post->getAll();
		$data['username'] = $this->session->userdata();

		//Load views
		$this->load->view('header', $data);
		$this->load->view('index', $data);
		$this->load->view('footer');
	}

	/**
	 * Show Single post
	 */
	public function read()
	{
		//Get id from uri
		$id = $this->uri->segment(3);

		//Get data from model
		$data['post'] = $this->post->getById($id);

		//Load Views
		$this->load->view('header');
		$this->load->view('read', $data);
		$this->load->view('footer'); 
	}

	/**
	 * Create a new post
	 */
	public function create() 
	{
		if($_POST)
		{
			//Build post object 
			$post = new Post_model();
			$post->title = $this->input->post('title', TRUE);
			$post->content = $this->input->post('content', TRUE);
			$post->addby = $_SESSION['logged_in']['username'];
		

			if ($post->save()) {
				redirect(base_url(), 'location');
			}

		}

		//Load helpers 
		$this->load->helper('form');

		//Initialize form
		$data['action'] = base_url('index.php/blog/create');
		$data['title'] = NULL;
		$data['content'] = NULL;

		//Load views
		$this->load->view('header');
		$this->load->view('upsert', $data);
		$this->load->view('footer'); 
	}

	/**
	 * Update an exsisting post.
	 */
	public function update()
	{

		if ($_POST)
		{
			// Build post object 
				$post = new Post_model();
				$post->id = $this->uri->segment(3);
				$post->title = $this->input->post('title', TRUE);
				$post->content = $this->input->post('content', TRUE);
				//Save post to database
				if ($post->save()) {
					redirect(base_url(), 'location');
				}
		}

			//Get post from the database 
			$id = $this->uri->segment(3);
			$post = $this->post->getById($id);

			//Initialise form
			$this->load->helper('form');
			$data['action'] = base_url('index.php/blog/update/' .$id);
			$data['title'] = $post->title;
			$data['content'] = $post->content;

			//Load views
			$this->load->view('header');
			$this->load->view('upsert', $data);
			$this->load->view('footer'); 	
	}

	/**
	 * Delete a post
	 */
	public function delete()
		{
			$post = new Post_model();
			$post->id = $this->uri->segment(3);
			if ($post->delete()) {
				redirect(base_url(),'location');
			}

		}

	/**
	 * Show about page.
	 */
	public function about()
	{
			//Load views
			$this->load->view('header');
			$this->load->view('about');
			$this->load->view('footer'); 		
	}	

}
