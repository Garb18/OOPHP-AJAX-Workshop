<?php
    class users {
        protected $db = null;

	    public function __construct($db){
			$this->db = $db;
		}
        
        public function checkUser($email, $password){
            //lets get user
            $query = "SELECT * FROM users WHERE user_email = :email";
            $pdo = $this->db->prepare($query);
            $pdo->bindParam(':email', $email);
            $pdo->execute();
    
            $user = $pdo->fetch(PDO::FETCH_ASSOC);
    
            if(empty($user)){
                return false;
            }else if(password_verify($password, $user[‘user_password’])){
                return $user;
            }else{
                return false;
            }
    }
}

?>
