<?php
include('database.php');
$obj = new query();

     $name ='';
     $email ='';
     $mobile ='';

if (isset($_GET['id']) && $_GET['id']!='') {
     $id=$obj ->get_safe_str ($_GET['id']);
     $condition_arr = array('id'=> $id);
     $result = $obj->getData('crud','*', $condition_arr);
    
     $name = $result[0]['name'];
     $email = $result[0]['email'];
     $mobile = $result[0]['mobile'];

}

if(isset($_POST['submit'])){

 $name=$obj ->get_safe_str ($_POST['name']);
 $email=$obj ->get_safe_str ($_POST['email']);
 $mobile=$obj ->get_safe_str ($_POST['mobile']);

  $condition_arr = array('name'=> $name,'email'=> $email,'mobile'=> $mobile);

  if($id==''){
    $obj->insertData('crud',$condition_arr);

  }else{
    $obj->updateData('crud',$condition_arr,'id',$id);
  }
 
header('location:user.php');
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    
    <title>Document</title>
    <link rel="stylesheet" href="style.css">




</head>

<body>
    <div class="container bg-darkyellow">
        <div class="card mx-auto mt-5" style="max-width:360px max-height:70% bg-white">
            <form action="usermanage.php" method="POST">
                <div class="mb-3">
                    <label for="">Name<span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Please  Inter your name"
                        required value="<?php echo $name ?>">
                </div>
                <div class="mb-3">
                    <label for="">Email<span class="text-danger">*</span></label>
                    <input type="email" name="email" id="email" class="form-control"
                        placeholder="Please  Inter your email" required value="<?php echo $email ?>">
                </div>
                <div class="mb-3">
                    <label for="">Mobile<span class="text-danger">*</span></label>
                    <input type="tel" name="mobile" id="mobile" class="form-control"
                        placeholder="Please  Inter your Mobile" required value="<?php echo $mobile ?>">
                </div>
                <div class="mb-3">
                    
                    <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i
                            class="fa fa-fw fa-plus-circle"></i>Manage User</button>
                </div>

            </form>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
</body>

</html>



