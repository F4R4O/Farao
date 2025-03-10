<?php
class User{
    private $cod_user;
    private $username;
    private $password;
    private $email;
    private $state;


    //al trabajar con constructor se debe de cargar si o si
    public function __construct($username, $password, $id=null){
        $this->cod_user = $cod_user;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->state = $state;
    }

    //metodos Getters para extraer
    public function getCod_user(){
        return $this->cod_user;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getState(){
        return $this->State;
    }


    //Setters para poner datos
    public function setCod_user($cod_user){
        $this->cod_user = $cod_user;
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setState($state){
        $this->state = $state;
    }
};
?>