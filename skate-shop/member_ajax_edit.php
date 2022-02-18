<?php 
include('admin/condb.php'); 


if(isset($_POST['function']) && $_POST['function'] == 'provinces'){
    $province_id = $_POST['id'];
    $sql = "SELECT * FROM amphures WHERE province_id = '$province_id'";
    $query = mysqli_query($con,$sql);
    echo '<option selected ><?=$am_name_th;?> </option>';
    foreach($query as $value){
        echo '<option value="'.$value['id'].'">'.$value['am_name_th'].'</option>';
    }
exit();
}

if(isset($_POST['function']) && $_POST['function'] == 'amphures'){
    $amphure_id = $_POST['id'];
    $sql = "SELECT * FROM districts WHERE amphure_id = '$amphure_id'";
    $query = mysqli_query($con,$sql);
    echo '<option selected ><?=$dis_name_th;?> </option>';
    foreach($query as $value){
        echo '<option value="'.$value['id'].'">'.$value['dis_name_th'].'</option>';
    }
exit();
}

if(isset($_POST['function']) && $_POST['function'] == 'districts'){
    $id = $_POST['id'];
    $sql = "SELECT * FROM districts WHERE id = '$id'";
    $query = mysqli_query($con,$sql);
    $result = mysqli_fetch_assoc($query);
    echo $result['zip_code'];
exit();
}


?>