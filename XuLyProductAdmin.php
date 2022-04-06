
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

            $check = "SELECT * FROM tbl_sanpham WHERE TenSanPham = '$productname'";
            $result = mysqli_query($conn, $check);
            if( mysqli_num_rows($result) > 0){
                
                echo '<script language="javascript">swal({
                    title: "The product already exists. ",
                    icon: "warning",
                  })</script>';
            }else{
                echo '<script language="javascript">
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Your product has been saved",
                        showConfirmButton: false,
                        timer: 1500
                      
                  })</script>';
                }

            $sql ="INSERT INTO tbl_sanpham(TenSanPham,HinhAnhSanPham,SoLuongSanPham,MieuTaSanPham,GiaSanPham,LoaiSanPham) VALUES ('$productname','$productimg','$productquantity',' $productdescription','$productprice','$producttype')";
            move_uploaded_file($productimg_tmp,$path.$productimg);
            $query = mysqli_query($conn,$sql);
            header('location:admin.php');
        }

    ?>