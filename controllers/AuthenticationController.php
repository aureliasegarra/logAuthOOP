<?php 
include('config/app.php');

class AuthenticationController {
    public function __construct(){
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
        $this->checkIsLoggedIn();
    }

    private function checkIsLoggedIn(){
        if (!isset($_SESSION['authenticated'])) {
            redirect("Login to Access the page", "login.php");
            return false;
        } else {
            return true;
        }
    }

    public function authUserDetail(){
        $checkAuth = $this->checkIsLoggedIn();
        if($checkAuth){
            $user_id = $_SESSION['auth_user']['user_id'];

            $getUserData = "SELECT * FROM user WHERE id='$user_id' LIMIT 1";
            $result = $this->conn->query($getUserData);
            if ($result->num_rows > 0) {
                $data = $result->fetch_assoc();
                return $data;
            } else {
                redirect("Something went wrong","login.php");
            }
        } else {
            return false;
        }
    }

}

$authenticated =  new AuthenticationController;



?>