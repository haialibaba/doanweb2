<?php
    include_once 'config.php';
    //xóa
    $id = $_POST['id'];
    $sql = "DELETE FROM tbl_sanpham WHERE MaSanPham = $id";
    $query = mysqli_query($conn,$sql);
    if($query){
        echo '<script language="javascript">
            swal({
                title: "Delete success",
                icon: "success",
              })</script>';
    }else{
        echo '<script language="javascript">
            swal({
                title: "Delete fail",
                icon: "warning",
              })</script>';
    }

   
?>
