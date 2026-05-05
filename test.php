<?php
include('database.php');


$obj = new query();
$condition_arr = array('name'=> 'xyz','email'=>'xyz2gmail.com', 'mobile'=>'1284747');
//$result=$obj->getData('crud','*','','id','', 7) ;
//$result=$obj->insertData('crud',$condition_arr) ;
//$result=$obj->deleteData('crud',$condition_arr) ;
$result=$obj->updateData('crud',$condition_arr,'id',27) ;




?>

