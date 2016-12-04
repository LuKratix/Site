<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 * @author Lukratix
 * @version 1.0
 *
 */

class Utilisateurs extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('Utilisateur_model');
    $this->load->helper('url_helper');
    $this->load->helper('security');
  }

  function index() {
    if($this->session->userdata('logged_in') == true) {
      $this->layout->view('home',$data =array("title" => "Accueil"));
    }else {
      redirect('utilisateurs/login');
    }
  }

  function login(){
    if($this->session->userdata('logged_in') == false){
      $this->load->helper('form');
      $this->layout->view('utilisateur/login', $data =array("title" => "Connexion"));
    }else {
      redirect($this);
    }
  }

  function log_out(){
    $this->session->sess_destroy();
    redirect($this);
  }

  function register() {
      if($this->session->userdata('logged_in') == false){
        $this->load->helper('form');
        $this->layout->view('utilisateur/register', $data = array("title" => "Inscription"));
      }else {
        redirect($this);
      }
    }

  function verify_register(){
    $this -> load ->library('form_validation');
    // Ajout de règles sur les champs du formulaire
    $this->form_validation->set_rules('username1', 'Username', 'trim|xss_clean|required');
    $this->form_validation->set_rules('password1', 'Password', 'trim|xss_clean|required');
    $this->form_validation->set_rules('password_confirmation', 'password_Confirmation', 'trim|xss_clean|required|matches[password]');
    $this->form_validation->set_rules('question', 'Question', 'trim|xss_clean|required');
    $this->form_validation->set_rules('answer', 'Réponse', 'trim|xss_clean|required');

    if($this->form_validation->run() == false){
      //Echec de la validation du formulaire
      $this->layout->view('utilisateur/register');
    } else {
        $data = $this-> input -> post();
        $test = $this-> Utilisateur_model -> add_user($data['username'],$data['password'],$data['email'],$data['question'],$data['answer']);
        redirect('utilisateurs');
    }
  }

  public function exist_username(){
    if(isset($_POST['username']))
      exit(json_encode(array('exist'=>$this->Utilisateur_model->exist_username($_POST['username'])), JSON_FORCE_OBJECT));
    return false;
  }

  public function exist_email(){
    if(isset($_POST['email'])){
      exit(json_encode(array('exist'=>$this->Utilisateur_model->exist_email($_POST['email'])), JSON_FORCE_OBJECT));
    }
    return false;
  }

  function verify_login() {
    $this -> load ->library('form_validation');
    // Ajout de règles sur les champs du formulaire
    $this->form_validation->set_rules('username', 'Username', 'trim|xss_clean|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required|callback_check_database'); //appelle la fonction check_database

    if($this->form_validation->run() == false){
      //Echec de la validation du formulaire
      $this->layout->view('Utilisateur/login');
    } else {
      //redirection vers la page de validation de la connexion
      redirect($this);
    }
  }

  public function check_database($password) {
    //Récupération de l'username du formulaire
    $username = $this->input->post('username');
    //verification dans la base de
    if ($result = $this -> Utilisateur_model -> get_user_auth($username,$password)) {
      // les informations de l'utilisateur sont ajouté à la variable de session
      $this->session->set_userdata('logged_in',array('id' => $result->id, 'username' => $result->username));
      return true;
    }else {
        $this->form_validation->set_message('check_database', 'Mauvais login ou mot de passe !');
        return false;
    }
  }
}?>
