<?php
        include'config.php';
        if(isset($_POST['addProduct-btn'])){
            $productname = $_POST['productname'];
            $productimg = $_FILES['productimg']['name'];
            $productimg_tmp = $_FILES['productimg']['tmp_name'];
            $productprice = $_POST['productprice'];
            $productquantity = $_POST['productquantity'];
            $producttype = $_POST['producttype'];
            $productdescription = $_POST['productdescription'];
            $path = './uploads/';  

            $sql ="INSERT INTO tbl_product(name,image,price) VALUES ('$productname','$productimg','$productprice')";
            move_uploaded_file($productimg_tmp,$path.$productimg);
            $query = mysqli_query($conn,$sql);
            header('location:admin.php');
        }

       
    ?>