<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller 
{
	public function __construct( )
	{
		parent::__construct();
		//$this->load->library('form_validation');
 		$this->load->model('Mdl_user','user');
	}  
 	public function index()
	{
  		$this->load->view('header');
		$this->load->view('register');
		$this->load->view('footer');
	}
	public function edit_invoice($id)
	{
		die($id);
  		$this->load->view('header');
		$this->load->view('edit_invoice');
		$this->load->view('footer');
	}
 	public function login()
	{
		if (isset($_SESSION['login']['id'])) 
		{
	redirect('user/dashboard');
	   } else {
	   $this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}
 }

	public function getLogin()
	{
		/*Data that we receive from ajax*/
        $username = $this->input->post('UserName');
        $Password = $this->input->post('Password');
        if (!isset($username) || $username == '' || $username == 'undefined') {
            /*If Username that we recieved is invalid, go here, and return 2 as output*/
            echo 2;
            exit();
        }
        if (!isset($Password) || $Password == '' || $Password == 'undefined') {
            /*If Password that we recieved is invalid, go here, and return 3 as output*/
            echo 3;
            exit();
        }
        $this->form_validation->set_rules('UserName', 'UserName', 'required');
        $this->form_validation->set_rules('Password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            /*If Both Username &  Password that we recieved is invalid, go here, and return 4 as output*/
            echo 4;
            exit();
        } else {
            /*Create object of model MLogin.php file under models folder*/
            $Login = new Mdl_user();
            /*validate($username, $Password) is the function in Mlogin.php*/
            $result = $Login->validate($username, $Password);
// echo $this->db->last_query(); die();
            if (count($result) == 1) {
                /*If everything is fine, then go here, and return 1 as output and set session*/
                $data = array(
                    'id' => $result[0]->id,
                    'username' => $result[0]->username
                );

                $this->session->set_userdata('login', $data);
                echo 1;
            } else {
                /*If Both Username &  Password that we recieved is invalid, go here, and return 5 as output*/
                echo 5;
            }
        }
	}

	public function create_invoice()
	{
		if (isset($_SESSION['login']['id'])) 
		{

			$this->load->view('header');
		$this->load->view('invoice');
		$this->load->view('footer');
 	   } else {
	       redirect('user/login');
	}
 	}
	public function insert_invoice()
	{

     	$result=$this->user->insert_invoice();
    	if($result)
    	{
    		$this->session->set_flashdata('msg','Invoice Added Successfully');
    		redirect('user/dashboard');
    	}
    	else
    	{
    		$this->session->set_flashdata('Msg','Invoice Adding Failed ');
    		redirect('user/dashboard');
    	}
	}
	public function dashboard()
	{	
		if (isset($_SESSION['login']['id'])) 
		{
			 $user= $this->session->userdata('login')['id'];

 	    	$data['invoice']=$this->user->get_details($user);
 		 //print_r($data['invoice']);die();
 		 	$this->load->view('header');
			$this->load->view('dashboard',$data);
			$this->load->view('footer');
	   } else {
	       redirect('user/login');
	 	}
	}
	public function logout()
	{   //$this->session->sess_destroy();
           
		unset($_SESSION["login"]);
		redirect('user/login');
	}
 	public function dataInsert()
	{
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|alpha|max_length[20]');
		$this->form_validation->set_rules('lastname', 'Last Name ', 'trim|required|alpha|max_length[20]');
     	$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]',array('is_unique' => 'This %s is already taken'));
		$this->form_validation->set_rules('password', 'Password ', 'trim|required');
		if($this->form_validation->run() == FALSE){
			     $array = array(
				    'error'   => true,
				    'firstname_error' => form_error('firstname'),
				    'lastname_error' => form_error('lastname'),
				    'username_error' => form_error('username'),
				    'password_error' => form_error('password'),
				   
				    );
 	            echo json_encode($array);     // echo json_encode(['error'=>$array]);
         }else
         {
          	$data  = array(
				'firstname' =>$this->input->post('firstname'),
				'lastname' =>$this->input->post('lastname'),
				'username' =>$this->input->post('username'),
				'password' =>md5($this->input->post('password'))
				);  
 
            	$this->user->insert_reg('users',$data);
  	     	  	$id = $this->db->insert_id();
  	     	  	if ($id>0) {
  	     	  		$array = array('success' => '<div class="alert alert-success">Thank you for Register </div>');
		   	  	}else{
 					$array = array('error' => '<div class="alert alert-danger">Something Went wrong </div>','errors'=>'<div class="alert 	alert-danger">Something Went wrong.. </div>');
			   	}
	 				  echo json_encode($array);
	 		}
	}
}?>	