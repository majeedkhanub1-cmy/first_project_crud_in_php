<?php
include('database.php');
$obj = new query();

if(isset($_GET['type']) && $_GET['type']=='delete'){
    $id =$obj->get_safe_str($_GET['id']);
    $condition_arr = array('id'=> $id);
    $obj->deleteData('crud',$condition_arr);
}


$result = $obj->getData('crud', '*','','id','desc' );


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
    <a href="usermanage.php" class="btn btn-info">
    <i class="fa fa-fw fa-plus"></i> Add User
</a>
</div>


            <form  method="POST">
                <table class="table table-border">
                    <tr>
                        <th>SR#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>mobile</th>
                        <th>Action</th>

                    </tr>
                    <?php
                    if (isset($result['0'])) {
                        $id=1;
                        foreach ($result as $list) {
                            ?>
                            <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $list['name'] ?></td>
                                <td><?php echo $list['email'] ?></td>
                                <td><?php echo $list['mobile'] ?></td>

                                <td><a href="usermanage.php?id=<?php echo $list['id'] ?>" class="btn btn-info">Edit</a>
                                    <a href="?type=delete&id=<?php echo $list['id'] ?>" class="btn btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</a>
                                </td>

                            </tr>
                        <?php 
                        $id++;}
                        
                    } else { ?>
                        <tr>
                            <td colspan="6" align="center">No Record Found!</td>
                        </tr>
                    <?php } ?>
                </table>
            </form>
        </div>
    </div>
</body>

</html>