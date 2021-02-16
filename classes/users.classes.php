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
            }else if(password_verify($password, $user['user_password'])){
                return $user;
            }else{
                return false;
            }
    }

    public function getUser($userid){
        //Let's get the users information
        $query = "SELECT * FROM users WHERE user_id = :userid";
        $pdo = $this->db->prepare($query);
        $pdo->bindParam(':userid', $userid);
        $pdo->execute();
    
        return $pdo->fetch(PDO::FETCH_ASSOC);
    }  

    public function updateUser($userid, $name, $country, $hobbies, $gender, $quote, $colour, $profileImage = null){
        //Update a users record
        if(isset($target_file))
            {
                $query = "UPDATE users SET user_forename = :forename, user_country = :country, user_hobbies = :hobbies, user_gender = :gender, user_favorite_quote = :favorite_quote, user_favorite_colour = :favorite_colour, user_profile_image = :profile_image WHERE user_id = :userid";
            }else{
                $query = "UPDATE users SET user_forename = :forename, country = :country, user_hobbies = :hobbies, user_gender = :gender, user_favorite_quote = :favorite_quote, user_favorite_colour = :favorite_colour WHERE user_id = :userid";
            }
            
        $pdo = $this->db->prepare($query);
        $pdo->bindParam(':forename', $name);
        $pdo->bindParam(':country', $country);
        $pdo->bindParam(':hobbies', $hobbies);
        $pdo->bindParam(':gender', $gender);
        $pdo->bindParam(':favorite_quote', $quote);
        $pdo->bindParam(':favorite_colour', $colour);
        if(isset($target_file))
        {
            $pdo->bindParam(':profile_image', $newFilename);
        }            
        $pdo->bindParam(':userid', $userid);
                
        if($pdo->execute()){
            return true;
        }else{
            return false;
        }
    }

}

?>
