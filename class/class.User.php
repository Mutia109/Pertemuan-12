<?php
class User extends Connection{
    public $userid=0;
    public $email = '';
    public $password = '';
    public $name = '';
    public $role = '';
    public $message = '';

    public function __get($atribute){ 
        if(property_exists($this,$atribute)){ 
            return $this->$atribute; 
        } 
    } 
    public function __set($atribut, $value){ 
        if(property_exists($this,$atribut)){ 
            $this->$atribut= $value; 
        } 
    }
    
    public function AddUser(){ 
        $sql = "INSERT INTO user(email, password, name, role) values('$this->email', '$this->password', '$this->name', '$this->role')"; 
        $this->hasil = mysqli_query($this->connection, $sql); 
        if($this->hasil) 
            $this->message ='Data berhasil ditambahkan!'; 
        else 
            $this->message ='Data gagal ditambahkan!'; 
    } 
        
    public function ValidateEmail($inputemail){ 
        $sql = "SELECT * FROM user WHERE email = '$inputemail'"; 
        $result = mysqli_query($this->connection, $sql); 
        if (mysqli_num_rows ($result) == 1){ 
            $this->hasil = true; 
            $data = mysqli_fetch_assoc($result); 
            $this->userid = $data['userid']; 
            $this->password = $data['password']; 
            $this->name=$data['name']; 
            $this->email=$data['email']; 
            $this->role=$data['role']; 
        } 
    }        
}
?>