<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){

      $data = [];

      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [];

      $this->view('pages/about', $data);
    }
   
    public function contact() {

      // Start session if not already started
      if (session_status() === PHP_SESSION_NONE) {
          session_start();
      }
      
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // Sanitize post data
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

          // Check for user ID in session
          $sessionVariable = $_SESSION['user_id']?? "";
        
          $data = [
              'full_name' => trim($_POST['full_name']),
              'email' => trim($_POST['email']),
              'subject' => trim($_POST['subject']),
              'message' => trim($_POST['message']),
              'user_id' => $sessionVariable,
              'full_name_err' => '',
              'email_err' => '',
              'subject_err' => '',
              'message_err' => ''
          ];

          // Validate full name
          if (empty($data['full_name'])) {
              $data['full_name_err'] = 'Please enter your full name';
          }

          // Validate email
          if (empty($data['email'])) {
              $data['email_err'] = 'Please enter your email';
          }

          // Validate subject
          if (empty($data['subject'])) {
              $data['subject_err'] = 'Please enter the subject';
          }

          // Validate message
          if (empty($data['message'])) {
              $data['message_err'] = 'Please enter the message';
          }

          // Check if all errors are empty
          if (empty($data['full_name_err']) && empty($data['email_err']) &&
              empty($data['subject_err']) && empty($data['message_err'])) {

              
              $userModel = $this->model('ContactUs');
              $userModel->contactInfo($data);

              $this->view('pages/index', $data);
          } else {
              $this->view('pages/contact', $data);
          }
      } else {
          // Load the contact form if the request is not POST
          $data = [];
          $this->view('pages/contact', $data);
      }
  }
  
      public function blog(){
          $data = [];

          $this->view('pages/blog', $data);
      }
      public function shop(){
          $data = [];

          $this->view('pages/shop', $data);
      }
      public function cart(){
          $data = [];

          $this->view('pages/cart', $data);
      }
      public function checkout(){
          $data = [];

          $this->view('pages/checkout', $data);
      }
  }