<?php
class Crud
{

    private $host;
    private $dbusername;
    private $dbpassword;
    private $dbname;


    protected function connect()
    {
        $this->host = "localhost";
        $this->dbusername = "root";
        $this->dbpassword = "";
        $this->dbname = "oop_crud";

        $con = new mysqli($this->host, $this->dbusername, $this->dbpassword, $this->dbname);
        return $con;
    }

}
class query extends Crud
{
    public function getData($table,$field='*',$condition_arr='', $order_by_field='', $order_by_type='DESC',$limit='')
    {
        $sqli = "SELECT $field FROM $table";
         
        if ($condition_arr!='') {
            $sqli.=' where ';
            $c=count($condition_arr);
            $i=1;
            foreach($condition_arr as $key=>$val) {
                if ($i==$c) {
                    $sqli.=" $key ='$val'";
                }else{
                $sqli.=" $key ='$val' and ";
                }
                $i++;

            }

        }
      
        if ($order_by_field!='') {
            $sqli.= " order by $order_by_field $order_by_type ";
        }
          
        if ($limit!='') {
            $sqli.= " limit $limit ";
        }
         
        $result = $this->connect()->query($sqli);
        if ($result->num_rows > 0) {
            $arr = array();
            while($row= $result->fetch_assoc()) {
                $arr [] = $row;

            }
            return $arr;
        }else{
            return 0;
        }
    }

     public function insertData($table,$condition_arr='')
    {
        if ($condition_arr!='') {
            foreach($condition_arr as $key=>$val) {
               $fieldArr[]= $key;
               $valueArr[]= $val;
                

            }
            $field=implode(",",$fieldArr);
            $value=implode("','",$valueArr);
            $value = "'".$value."'";

            $sqli = "insert into $table($field) values($value) " ;

            $result = $this->connect()->query($sqli);    

        }
    }
      public function deleteData($table,$condition_arr='')
    {
        if ($condition_arr!='') {
             $sqli = "delete from $table where " ;
            
            $c=count($condition_arr);
            $i=1;
            foreach($condition_arr as $key=>$val) {
                if ($i==$c) {
                    $sqli.=" $key ='$val'";
                }else{
                $sqli.=" $key ='$val' and ";
                }
                $i++;

            }
           
           $result = $this->connect()->query($sqli);    

        }
    }
     public function updateData($table,$condition_arr, $where_field,$where_value)
    {
        if ($condition_arr!='') {
             $sqli = "update  $table set " ;
            
            $c=count($condition_arr);
            $i=1;
            foreach($condition_arr as $key=>$val) {
                if ($i==$c) {
                    $sqli.=" $key ='$val'";
                }else{
                $sqli.=" $key ='$val' , ";
                }
                $i++;

            }
           $sql= "where $where_field='$where_value'";
           //echo $sql;
           $result = $this->connect()->query($sqli);    

        }
    }
    public function get_safe_str($str){
        if ($str!='') {
            return mysqli_real_escape_string($this->connect(),$str);
        }
        
    }
}

/* select field from $table where $condition like $like order by $order_by_field $order_by_type limit $limit 1;

field * or name, email
$table->crud
*/
?>