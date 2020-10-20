<?php
	
	class UserDTO {

        private $id;
        private $name;
        private $lastName;
        private $email;
        private $phone;
        private $register_date;
        private $password;
        private $state;
        private $rol_id;
		
		public function __construct($id, $name, $lastName, $email, $phone, $register_date, $password, $state, $rol_id){
            $this->id = $id;
            $this->name = $name;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->phone = $phone;
            $this->register_date = $register_date;
            $this->password = $password;
            $this->state = $state;
            $this->rol_id = $rol_id;

		}
		
		public function getId(){
            return $this->id;
        }

        public function getName(){
            return $this->name;
        }

        public function getLastName(){
            return $this->lastName;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getPhone(){
            return $this->phone;
        }

        public function getRegisterDate(){
            return $this->register_date;
        }

        public function getPassword(){
            return $this->password;
        }

        public function getState(){
            return $this->state;
        }

        public function getRolId(){
            return $this->rol_id;
        }
    }
?>