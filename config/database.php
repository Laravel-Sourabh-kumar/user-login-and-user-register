<?php 
class Database
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
   
    protected  function connect(){

        $this->servername="localhost";
        $this->username="root";
        $this->password="";
        $this->dbname="oops_admin";
        $conn=new mysqli(
            $this->servername,
            $this->username,
            $this->password,
            $this->dbname,
        );
        return $conn;
    }

}

class Query extends Database
{

    public function getData($tablename,$fields)
    {

        $sql ="SELECT $fields From $tablename";
        $result= $this->connect()->query($sql);
        return $result;
        
    }
    public function insertData($table,$per)
    {

        $fields=array();
        $value=array();
        foreach($per as $key=>$val){
            $fields[]=$key;
            $value[]=$val;

        }
        $fil=implode(',',$fields);
      
        $vals=implode("','",$value);
          $v="'".$vals."'";
         // echo($v);
         // exit;
        $sql ="INSERT INTO $table ($fil) 
                VALUES($v)";
       
        
        $result= $this->connect()->query($sql);
        return $result;
        // var_dump($result);
        // exit;
       //print_r($result);
    }
    public function deleteData($table,$id,$key)
    {

        $sql ="DELETE  From $table WHERE $key=$id";
       
        
        $result= $this->connect()->query($sql);
        // var_dump($result);
        return  $result;
       //print_r($result);
    }
    public function getDataById($table,$fields,$wherefield,$id)
    {

       
        $sql ="SELECT $fields FROM $table WHERE $wherefield = $id";
        $result= $this->connect()->query($sql);
        //print_r($result->fetch_assoc());
        //exit;
         return $result;
       //print_r($result);
    }
    public function updateData($table,$per,$id,$p)
    {

        
        
        $sql ="UPDATE $table SET";

        $length= count($per);
        $i=1;

        foreach($per as $key=>$val){
            if($i== $length){
                $sql .= " $key='$val'";
            }
           else{

            $sql .= " $key='$val' , ";
           }
            $i++;
        }

        $sql .= " WHERE  $id = $p";
        
        $result= $this->connect()->query($sql);
         return $result;
        // var_dump($result);
        // exit;
        print_r($result);
    }
}


?>