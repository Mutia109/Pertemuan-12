<?php
    include 'class.Employee.php';
    class Department extends Connection
    {
        private $dnumber='';
        private $dname = '';
        private $mgr_start_date = '';
        private $mgr;
        private $message ='';

        public function __get($atribute) {
            if (property_exists($this, $atribute)) {
                return $this->$atribute;
            }
        }

        public function __set($atribut, $value){
            if (property_exists($this, $atribut)) {
                $this->$atribut = $value;
             }
        }
        function __construct() {
            parent::__construct();
            $this->mgr = new Employee();
        }

        public function AddDepartment(){
            $sql = "INSERT INTO department (dname, dnumber, mgr_ssn, mgr_start_date)
            VALUES ($this->dname, '$this->dnumber', '$this->mgr_ssn', ".$this->mgr_start_date.")";
            echo $sql;
            $this->hasil = mysqli_query($this->connection, $sql);
            if($this->hasil)
                $this->message ='Data berhasil ditambahkan!';
            else
                $this->message ='Data gagal ditambahkan!';
        }

        public function UpdateDepartment(){
            $sql = "UPDATE department
            SET dname ='$this->dname',
            dnumber = '$this->dnumber',
            mgr_ssn='$this->mgr_ssn',
            mgr_start_date = '$this->mgr_start_date'
            WHERE pnumber = $this->pnumber";
            $this->hasil = mysqli_query($this->connection, $sql);
            if($this->hasil)
            $this->message ='Data berhasil diubah!';
            else
            $this->message ='Data gagal diubah!';
        }

        public function SelectOneDepartment(){
            $sql = "SELECT * FROM departement WHERE dnumber=$this->dnumber";
            $resultOne = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));
            if(mysqli_num_rows($resultOne) == 1){
                $this->hasil = true;
                $data = mysqli_fetch_assoc($resultOne);
                $this->dnumber=$data['dnumber'];
                $this->dname=$data['dname'];
                $this->mgr_ssn=$data['mgr_ssn'];
                $this->mgr_start_date =$data['mgr_start_date'];
            }
        }

        public function DeleteDepartment(){
            $sql = "DELETE FROM department WHERE dnumber=$this->dnumber";
            $this->hasil = mysqli_query($this->connection, $sql);
            if($this->hasil)
            $this->message ='Data berhasil dihapus!';
            else
            $this->message ='Data gagal dihapus!';
        }

        public function SelectAllDepartment(){
            $sql = "SELECT d.*, e.ssn,
            concat(e.fname, ' ', e.minit, ' ', e.lname)
            as mgr_name
            FROM department d INNER JOIN employee e
            ON d.mgr_ssn = e.ssn";
            $result = mysqli_query($this->connection, $sql);
            $arrResult = Array();
            $cnt=0;
            if(mysqli_num_rows($result) > 0){
                while ($data = mysqli_fetch_array($result)){
                $objDepartment = new Department();
                $objDepartment->dnumber=$data['dnumber'];
                $objDepartment->dname=$data['dname'];
                $objDepartment->mgr->ssn=$data['ssn'];
                $objDepartment->mgr->fname=$data['mgr_name'];
                $objDepartment->mgr_start_date =
                $data['mgr_start_date'];
                $arrResult[$cnt] = $objDepartment;
                $cnt++;
            }
        }
        return $arrResult;
    }
}