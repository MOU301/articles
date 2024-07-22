<?php 
class database{
    private $host=DB_host;
    private $user=DB_user;
    private $pass=DB_pass;
    private $dbname=DB_name;
    private $conn;
    public function __construct(){
       $this->conn=new mysqli($this->host,$this->user,$this->pass,$this->dbname);
    }

    public function getconn(){
        return $this->conn;
    }

    public function seletsignle($q){
     $conn=$this->getconn();
     $result=mysqli_query($conn,$q);
     if($result){
        $rows=[];
        if(mysqli_num_rows($result)>0){
            $rows[]=mysqli_fetch_assoc($result);
           }
            return $rows[0];
         }

    }
    public function seletmulti($q){
        $conn=$this->getconn();
        $result=mysqli_query($conn,$q);
        if($result){
           $rows=[];
           if(mysqli_num_rows($result)>0){
               while($row=mysqli_fetch_assoc($result)){
                $rows[]=$row;
                }
            }
            return $rows;
            }
       }
    
       public function insert($q){
        $conn=$this->getconn();
        $result=mysqli_query($conn,$q);
        if($result){
            return true;

        }
        else{
            return false;
        }

       }

       public function update($q){
        $conn=$this->getconn();
        $result=mysqli_query($conn,$q);
        if($result){
            return true;

        }
        else{
            return false;
        }
    }
        public function delete($q){
            $conn=$this->getconn();
            $result=mysqli_query($conn,$q);
            if($result){
                return true;
    
            }
            else{
                return false;
            }
        
       }


}





?>