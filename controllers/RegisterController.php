<?php 
//include('config/app/php');

class RegisterController {

    public function __construct(){
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    # Enregistrement d'un nouvel utilisateur en base de données
    public function registration($fname, $lname, $email, $password){
        $register_query = "INSERT INTO user (nom,prenom,email,mdp) VALUES ('$fname', '$lname', '$email', '$password')";
        $result = $this->conn->query($register_query);
        return $result;
    }

     # Vérification si l'utilisateur n'existe pas déja 
    public function isUserExist($email){
        $checkUser = "SELECT email FROM user WHERE email='$email' LIMIT 1";
        $result = $this->conn->query($checkUser);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

     # Vérification du mot de passe 
    public function confirmPassword($password, $c_password){
        if($password == $c_password){
            return true;
        } else {
            return false;
        }
    }

}

?>