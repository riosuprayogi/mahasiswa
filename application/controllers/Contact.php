<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        $this->load->helper('url');   
        $this->load->helper('form');   
        $this->load->library('session');
        $this->load->library('form_validation');
        $user = $this->session->email;
	    if(empty($user)){
		$this->session->set_flashdata('message','<div class=
		"alert-success" role="alert">You must be login!</div>');
		 redirect('auth');
	  } 
    }
    
    public function index(){
        $data = $formData = array();
        
        // If contact request is submitted
        if($this->input->post('contactSubmit')){
            
            // Get the form data
            $formData = $this->input->post();
            
            // Form field validation rules
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('subject', 'Subject', 'required');
            $this->form_validation->set_rules('message', 'Message', 'required');
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                
                // Define email data
                $mailData = array(
                    'name' => $formData['name'],
                    'email' => $formData['email'],
                    'subject' => $formData['subject'],
                    'message' => $formData['message']
                );
                
                // Send an email to the site admin
                $send = $this->sendEmail($mailData);
                
                // Check email sending status
                if($send){
                    // Unset form data
                    $formData = array();
                    
                    $data['status'] = array(
                        'type' => 'success',
                        'msg' => 'Your contact request has been submitted successfully.'
                    );
                }else{
                    $data['status'] = array(
                        'type' => 'error',
                        'msg' => 'Some problems occured, please try again.'
                    );
                }
            }
        }
        
        // Pass POST data to view
        $data['postData'] = $formData;
        $data['title'] = 'Contact-US';
        $this->load->view('partial/head',$data);
        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('partial/header',$data);
        $this->load->view('partial/leftbar',$data);
        $this->load->view('contact/index',$data);
        $this->load->view('partial/rightbar',$data);
        $this->load->view('partial/footer');

    }
    
    private function sendEmail($mailData){
        // Load the email library
        $this->load->library('email');
        
        // Mail config
        $to = 'yudasiswoko@gmail.com';
        $from = 'testingtestest765@gmail.com';
        $fromName = 'Testing';
        $mailSubject = 'Contact Request Submitted by '.$mailData['name'];
        
        // Mail content
        $mailContent = '
            <h2>Contact Request Submitted</h2>
            <p><b>Name: </b>'.$mailData['name'].'</p>
            <p><b>Email: </b>'.$mailData['email'].'</p>
            <p><b>Subject: </b>'.$mailData['subject'].'</p>
            <p><b>Message: </b>'.$mailData['message'].'</p>
        ';
            
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->to($to);
        $this->email->from($from, $fromName);
        $this->email->subject($mailSubject);
        $this->email->message($mailContent);
        
        // Send email & return status
        return $this->email->send()?true:false;
    }
    
}