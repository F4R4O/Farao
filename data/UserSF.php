<?php
require_once __DIR__ . '/../config/Database.php';

class UserDAO
{
    private $conn//Llamamos la coneccion 

    public function __construc()
    {
        $database = new Database();
        $this->conn = $database->getConnection(); // esto devuelve la conexion con mysql y esto permite que la clase pueda hacer consultas en SQL
    }

    //Método para obtener todos los usuarios 
    public function getAllUsers()
    {
        $query = "CALL GetAllUsers()";
        $stmt = $this->conn->prepare(query: $query);
        $stmt->execute();

        //creacion de variable para obtener el resultado
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

        //Se crea un array para obtener los resultados
        $users = [];

        //con foreach recorremos los resultados obtenidos y los recorremos por fila con la variable ROW
        foreach($result as $row){
            //la variable users almacena en forma de array los distintos usuarios los cuales son creados con la clase User creado en la carpeta domain para crear con la clase User enviamos parametros necesarios para crear los objetos
            $users[] = new User(username: $row['username'], password: $row['password'], email: $row['email'], state : $row['state'], cod_user: $row['cod_user']);
        }

        return $users;
    }

    //Metodo para obtener los datos del usuario para su validacion
    public function getUserByUsername($username):
    {
        $query = "CALL GetUserByUsername(:p_username)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':p_username', $username);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result){
            return new User($result['username'], $result○['password'], $result['cod_user']);
        }
        return null;
    }

    
}