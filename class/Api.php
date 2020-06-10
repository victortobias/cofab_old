<?php

class Usuario{
        private $id;
	    private $name;
        private $city;
        private $state;
        private $category;
        private $profession;
        private $performance;
        private $submitwork;
        private $payment;
        private $sbfa;

        function getId() {
            return $this->id;
        }
    
        function getName() {
            return $this->name;
        }
    
        function getCity() {
            return $this->city;
        }
    
        function getState() {
            return $this->state;
        }
    
        function getCategory() {
            return $this->category;
        }
    
        function getProfession() {
            return $this->profession;
        }
    
        function getPerformance() {
            return $this->performance;
        }
    
        function getSubmitwork() {
            return $this->submitwork;
        }
    
        function getPayment() {
            return $this->payment;
        }
    
        function getSbfa() {
            return $this->sbfa;
        }
    
        function setId($id) {
            $this->id = $id;
        }
    
        function setName($name) {
            $this->name = $name;
        }
    
        function setCity($city) {
            $this->city = $city;
        }
    
        function setState($state) {
            $this->state = $state;
        }
    
        function setCategory($category) {
            $this->category = $category;
        }
    
        function setProfession($profession) {
            $this->profession = $profession;
        }
    
        function setPerformance($performance) {
            $this->performance = $performance;
        }
    
        function setSubmitwork($submitwork) {
            $this->submitwork = $submitwork;
        }
    
        function setPayment($payment) {
            $this->payment = $payment;
        }
    
        function setSbfa($sbfa) {
            $this->sbfa = $sbfa;
        }
    	
       
       
       public static function api(){

        $sql = new Sql();

        return $sql->select("SELECT id, desname, category FROM tb_registrations WHERE payment = 1 ORDER BY id;");

       }

       public static function search ($id){

        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
          ":SEARCH"=>"%".$id."%"
        ));
       }
       
       public function setData($data){

            $this->setId($data['id']);
            $this->setName($data['desname']);
            $this->setCity($data['city']);
            $this->setState($data['state']);
            $this->setCategory($data['category']);
            $this->setProfession($data['profession']);
            $this->setPerformance($data['performance']);
            $this->setSubmitwork($data['submitwork']);
            $this->setPayment($data['payment']);
            $this->setSbfa($data['sbfa']);

       }


       
       public function updatePayment($up_payment){

        $this->setPayment($up_payment);

        $sql = new Sql();

        $sql->query("UPDATE tb_registrations SET payment = :PAYMENT WHERE id = :ID", array(
          ':PAYMENT'=>$this->getPayment(),
          ":ID"=>$this->getId()
        ));
       }

       public function __construct($name="",  $rg="",  $cpf="",  $email="",  $telephone="",  $city="",  $state="",  $category="",  $profession="",  $performance="",  $submitwork="",  $dtcadastro="", $sbfa=""){

        $this->setName($name);
        $this->setCity($city);
        $this->setState($state);
        $this->setCategory($category);
        $this->setProfession($profession);
        $this->setPerformance($performance);
        $this->setSubmitwork($submitwork);
        $this->setSbfa($sbfa);

       }



       public function __toString(){
       	return json_encode(array(
                "Id"=>$this->getId(),
                "Nome:"=>$this->getName(),
                "Cidade"=>$this->getCity(),
                "Estado"=>$this->getState(),
                "Categoria"=>$this->getProfession(),
                "Atua��o"=>$this->getPerformance(),
                
       	));
       }
}


 ?>