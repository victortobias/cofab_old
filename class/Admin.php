<?php

class Admin{
        private $id;
	    private $email;
        private $password;
        private $status;

        function getId(){
            return $this->id;
        }

        function getEmail() {
            return $this->email;
        }

        function getPassword() {
            return $this->password;
        }

        function getStatus(){
        	return $this->status;
        }

        function setId($id){
            $this->id = $id;
        }

        function setEmail($email) {
            $this->email = $email;
        }

        function setPassword($password) {
            $this->password = $password;
        }

        function setStatus($status){
        	$this->status = $status;
        }

        public static function search ($email){

        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_admin WHERE email LIKE :EMAIL ORDER BY id", array(
          ":SEARCH"=>"%".$email."%"
        ));
       }

        public function insert(){

        $sql = new Sql();

        $results = $sql->select("INSERT INTO tb_admin(email, password) VALUES(:EMAIL, :PASSWORD)", array(
  
          ":EMAIL"=>$this->getEmail(),
          ":PASSWORD"=>$this->getPassword()

        ));

        echo "<script>alert('Usuario cadastrado com sucesso! Peça para o Administrador ativar seu cadastro.')</script>";
        echo '<script>window.location.href = "index.php";</script>';

        if(count($results) > 0){
          $this->setData($results[0]);
          echo "<script>alert('Usuario cadastrado com sucesso! Peça para o Administrador ativar seu cadastro.')</script>";
          echo '<script>window.location.href = "index.php";</script>';
        }
       }
        	
       
       public function loadById($id){

           $sql = new Sql();

           $results = $sql->select("SELECT * FROM tb_admin WHERE id = :ID", array(
               ":ID"=>$id,
           ));

           if(isset($results[0])){
           	$this->setData($results[0]);
           }
       }

       public function login($email, $password){
           $sql = new Sql();

           $results = $sql->select("SELECT * FROM tb_admin WHERE email = :EMAIL AND password = :PASSWORD", array(
               ":EMAIL"=>$email,
               ":PASSWORD"=>$password,
           ));

           if(isset($results[0])){
            $this->setData($results[0]);
            if($this->getStatus() == 1){
	            $_SESSION['id'] = $this->getId();
	            header('location:list_users.php');
        	}else{
        		echo "<script>alert('Usuario Inativo!')</script>";
          	echo '<script>window.location.href = "index.php";</script>';
        	}
           }else{
            echo "<script>alert('Email/Senha Invalidos')</script>";
            echo '<script>window.location.href = "index.php";</script>';
           }

       }

       public function setData($data){

            $this->setId($data['id']);
            $this->setEmail($data['email']);
            $this->setPassword($data['password']);
            $this->setStatus($data['status']);

       }

       public function __construct($email="", $password=""){

        $this->setEmail($email);
        $this->setPassword($password);

       }



       public function __toString(){
       	return json_encode(array(
                "Id"=>$this->getId(),
                "Usuario"=>$this->getEmail(),
                "Senha"=>$this->getPassword()
       	));
       }
}


 ?>