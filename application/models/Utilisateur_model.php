<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * La classe permet d'effectuer des requète sur la table utilisateur
 *
 * @author Lukratix
 * @version 1.0
 */

class Utilisateur_model extends CI_Model{

  function get_user_auth($username,$password) {
    $this->db->select('id,login,mdp');
    $this->db->from('Utilisateur');
    $this->db->where('login',$username);
    $this->db->limit(1);

    $query = $this->db->get();

    if($query->num_rows() == 1 && password_verify($password, $query->row()->mdp))
      return $query->row();
    else
      return FALSE;
  }

  function add_user($username,$password, $email, $id_question, $reponse){
    $data = array(
        'login' => $username,
        'mdp' => password_hash($password,PASSWORD_DEFAULT),
        'mail' => $email,
        'Question_secrète_id' => $id_question,
        'Réponse' => password_hash($reponse,PASSWORD_DEFAULT),
        'Dernière_ip' => $this->input->ip_address()
    );

    if(! $this->db->insert('Utilisateur', $data))
      return $this -> db -> error()['code']; //Erreur 1062 = duplication de l'username
    else
      return -1;
  }

  private function exist($name,$data){
    $this->db->select('login');
    $this->db->from('Utilisateur');
    $this->db->where($name, $data);
    $this->db->limit(1);
    $query = $this->db->get();
    if($query -> num_rows() > 0)
      return true;
    else
      return false;
  }

  function exist_username($username) {
    return $this-> exist('login',$username);
  }

  function exist_email($email) {
    return $this-> exist('mail',$email);
  }

}?>
