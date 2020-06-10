<?php

class Usuario{
        private $id;
	      private $name;
        private $rg;
        private $cpf;
        private $email;
        private $telephone;
        private $city;
        private $state;
        private $category;
        private $profession;
        private $performance;
        //vari�vel que recebe do form se envia ou nao
        private $submitwork;
        private $dtcadastro;
        private $payment;
        private $status;
        //variavel de confirma��o de recebimento de trabalho
        private $confirmwork;
        //vari�vel de confirma��o de estudante
        private $confirmstudent;
        //vari�vel de confirma��o do sbfa
        private $confirmsbfa;
        private $sbfa;
        private $entry;

        function getId(){
            return $this->id;
        }

        function getName() {
            return $this->name;
        }

        function getRg() {
            return $this->rg;
        }

        function getCpf() {
            return $this->cpf;
        }

        function getEmail() {
            return $this->email;
        }

        function getTelephone() {
            return $this->telephone;
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
        
        function getSubmitwork(){
            return $this->submitwork;
        }

        function getConfirmwork(){
            return $this->confirmwork;
        }

        function getPerformance() {
            return $this->performance;
        }

        function getDtcadastro() {
            return $this->dtcadastro;
        }

        function getPayment(){
            return $this->payment;
        }

        function getStatus(){
            return $this->status;
        }

        function getConfirmstudent(){
            return $this->confirmstudent;
        }

        function getConfirmsbfa(){
            return $this->confirmsbfa;
        }

        function getSbfa(){
            return $this->sbfa;
        }

        function getEntry(){
            return $this->entry;
        }

        function setId($id){
            $this->id = $id;
        }

        function setName($name) {
            $this->name = $name;
        }

        function setConfirmwork($confirmwork){
            $this->confirmwork = $confirmwork;
        }

        function setRg($rg) {
            $this->rg = $rg;
        }

        function setCpf($cpf) {
            $this->cpf = $cpf;
        }

        function setEmail($email) {
            $this->email = $email;
        }

        function setTelephone($telephone) {
            $this->telephone = $telephone;
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
        
        function setSubmitwork($submitwork){
            $this->submitwork = $submitwork;
        }

        function setDtcadastro($dtcadastro) {
            $this->dtcadastro = $dtcadastro;
        }

        function setPayment($payment){
            $this->payment = $payment;
        }

        function setStatus($status){
            $this->status = $status;
        }

        function setConfirmstudent($confirmstudent){
            $this->confirmstudent = $confirmstudent;
        }

        function setConfirmsbfa($confirmsbfa){
            $this->confirmsbfa = $confirmsbfa;
        }

        function setSbfa($sbfa){
            $this->sbfa = $sbfa;
        }
        
        function setEntry($entry){
            $this->entry = $entry;
        }
       
       public function loadById($id){

           $sql = new Sql();

           $results = $sql->select("SELECT * FROM tb_registrations WHERE id = :ID", array(
               ":ID"=>$id,
           ));

           if(isset($results[0])){

           	$this->setData($results[0]);
           }
       }

       public static function getList(){

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_registrations ORDER BY desname;");

       }

       public static function api(){

        $sql = new Sql();

        return $sql->select("SELECT id, desname, category, payment, entry FROM tb_registrations WHERE payment = 1 ORDER BY id;");

       }

       public static function search ($cpf){

        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
          ":SEARCH"=>"%".$login."%"
        ));
       }
       
       public static function validaCpf ($cpf){

        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_registrations WHERE cpf = :CPF ORDER BY id", array(
          ":CPF"=>$cpf
        ));
       }

       public function setData($data){

            $this->setId($data['id']);
            $this->setName($data['desname']);
            $this->setRg($data['rg']);
            $this->setCpf($data['cpf']);
            $this->setEmail($data['email']);
            $this->setTelephone($data['telephone']);
            $this->setCity($data['city']);
            $this->setState($data['state']);
            $this->setCategory($data['category']);
            $this->setProfession($data['profession']);
            $this->setPerformance($data['performance']);
            $this->setSubmitwork($data['submitwork']);
            $this->setDtcadastro($data['dtcadastro']);
            $this->setPayment($data['payment']);
            $this->setStatus($data['status']);
            $this->setConfirmwork($data['confirmwork']);
            $this->setConfirmstudent($data['confirmstudent']);
            $this->setConfirmsbfa($data['confirmsbfa']);
            $this->setSbfa($data['sbfa']);
            $this->setEntry($data['entry']);

       }


       public function insert(){

        $sql = new Sql();

        $results = $sql->select("INSERT INTO tb_registrations(desname, rg, cpf, email, telephone, city, state, category, profession, performance, submitwork, dtcadastro, sbfa) VALUES(:NAME, :RG, :CPF, :EMAIL, :TELEPHONE, :CITY, :STATE, :CATEGORY, :PROFESSION, :PERFOMANCE, :SUBMITWORK, :DTCADASTRO, :SBFA)", array(
  
          ":NAME"=>$this->getName(),
          ":RG"=>$this->getRg(),
          ":CPF"=>$this->getCpf(),
          ":EMAIL"=>$this->getEmail(),
          ":TELEPHONE"=>$this->getTelephone(),
          ":CITY"=>$this->getCity(),
          ":STATE"=>$this->getState(),
          ":CATEGORY"=>$this->getCategory(),
          ":PROFESSION"=>$this->getProfession(),
          ":PERFOMANCE"=>$this->getPerformance(),
          ":SUBMITWORK"=>$this->getSubmitwork(),
          ":DTCADASTRO"=>$this->getDtcadastro(),
          ":SBFA"=>$this->getSbfa()

        ));

        if(count($results) > 0){
          $this->setData($results[0]);
        }
       }

       public function updatePayment($up_payment){

        $this->setPayment($up_payment);

        $sql = new Sql();

        $sql->query("UPDATE tb_registrations SET payment = :PAYMENT WHERE id = :ID", array(
          ':PAYMENT'=>$this->getPayment(),
          ":ID"=>$this->getId()
        ));
       }

       public function updateEntry($up_entry){

        $this->setEntry($up_entry);

        $sql = new Sql();

        $sql->query("UPDATE tb_registrations SET entry = :ENTRY WHERE id = :ID", array(
          ':ENTRY'=>$this->getEntry(),
          ":ID"=>$this->getId()
        ));
       }

       public function updateConfirmwork($up_submitwork){

        $this->setConfirmwork($up_submitwork);

        $sql = new Sql();

        $sql->query("UPDATE tb_registrations SET confirmwork = :CONFIRMWORK WHERE id = :ID", array(
          ':CONFIRMWORK'=>$this->getConfirmwork(),
          ":ID"=>$this->getId()
        ));
       }

       public function updateConfirmstudent($up_student){

        $this->setConfirmstudent($up_student);

        $sql = new Sql();

        $sql->query("UPDATE tb_registrations SET confirmstudent = :CONFIRMSTUDENT WHERE id = :ID", array(
          ':CONFIRMSTUDENT'=>$this->getConfirmstudent(),
          ":ID"=>$this->getId()
        ));
       }

       public function updateConfirmsbfa($up_sbfa){

        $this->setConfirmsbfa($up_sbfa);

        $sql = new Sql();

        $sql->query("UPDATE tb_registrations SET confirmsbfa = :CONFIRMSBFA WHERE id = :ID", array(
          ':CONFIRMSBFA'=>$this->getConfirmsbfa(),
          ":ID"=>$this->getId()
        ));
       }

       public function updateStatus($up_status){

        $this->setStatus($up_status);

        $sql = new Sql();

        $sql->query("UPDATE tb_registrations SET status = :STATUS WHERE id = :ID", array(
          ':STATUS'=>$this->getStatus(),
          ":ID"=>$this->getId()
        ));
       }






       public function delete(){
        $sql = new Sql();
        $sql->query("DELETE FROM tb_usuarios WHERE idusuario = :ID", array(
          ':ID'=>$this->getIdusuario()
        ));

        $this->setIdusuario(0);
        $this->setDeslogin("");
        $this->setDessenha("");
        $this->setDtcadastro(new DateTime());
       }

       public function __construct($name="",  $rg="",  $cpf="",  $email="",  $telephone="",  $city="",  $state="",  $category="",  $profession="",  $performance="",  $submitwork="",  $dtcadastro="", $sbfa=""){

        $this->setName($name);
        $this->setRg($rg);
        $this->setCpf($cpf);
        $this->setEmail($email);
        $this->setTelephone($telephone);
        $this->setCity($city);
        $this->setState($state);
        $this->setCategory($category);
        $this->setProfession($profession);
        $this->setPerformance($performance);
        $this->setSubmitwork($submitwork);
        $this->setDtcadastro($dtcadastro);
        $this->setSbfa($sbfa);

       }



       public function __toString(){
       	return json_encode(array(
                "Id"=>$this->getId(),
     		        "Nome:"=>$this->getName(),
                "Rg:"=>$this->getRg(),
                "Cpf:"=>$this->getCpf(),
                "Email"=>$this->getEmail(),
                "Telefone"=>$this->getTelephone(),
                "Cidade"=>$this->getCity(),
                "Estado"=>$this->getState(),
                "Categoria"=>$this->getProfession(),
                "Atua��o"=>$this->getPerformance(),
                "Data de Cadastro"=>$this->getDtcadastro()
       	));
       }
}


 ?>