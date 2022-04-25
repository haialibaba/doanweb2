<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&amp;family=Satisfy&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/admin.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet"
        href="./assets/fonts/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="./assets/fonts/themify-icons/themify-icons.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
<?php
    include_once 'config.php';
    $id = $_GET['id'];
    $sql_up = "SELECT * from tbl_sanpham where MaSanPham = $id";
    $query_up = mysqli_query($conn,$sql_up);
    $row_up = mysqli_fetch_assoc($query_up);

    if(isset($_POST['editProduct-btn'])){
        $productname = $_POST['productname'];
        $path = './uploads/';  
        if($_FILES['productimg']['name'] != ''){
            $productimg = $_FILES['productimg']['name'];
            $productimg_tmp = $_FILES['productimg']['tmp_name'];
            move_uploaded_file($productimg_tmp,$path.$productimg);
        }
        $productprice = $_POST['productprice'];
        $productquantity = $_POST['productquantity'];
        $producttype = $_POST['producttype'];
        $productdescription = $_POST['productdescription'];


        $check = "SELECT * FROM tbl_sanpham WHERE TenSanPham = '$productname'";
        $result = mysqli_query($conn, $check);
        if( mysqli_num_rows($result) > 0){
            echo '<script language="javascript">swal({
                title: "The product already exists. ",
                icon: "warning",
              })</script>';
        }else
            if($productname == '' || $productquantity ==''  || $productdescription == '' || $productprice == '' || $_FILES['productimg']['name']==''){
                echo '<script language="javascript">swal({
                    title: "Do not let it empty. ",
                    icon: "warning",
                    text:"Please insert !",
                  })</script>';          
                    }
                else{
            echo '<script language="javascript">   swal({
                title: "Edit successfull",
                icon: "success",
              })
              .then((willDelete) => {
                if (willDelete) {
                  window.location ="admin.php";
                } 
              });
              </script>';
            

        $sql ="UPDATE tbl_sanpham SET TenSanPham = '$productname', HinhAnhSanPham = '$productimg', SoLuongSanPham ='$productquantity', MoTaSanPham =' $productdescription', GiaSanPham ='$productprice', LoaiSanPham = '$producttype' where MaSanPham = $id";
        $query = mysqli_query($conn,$sql);
            }
    }

?>
<form action="" method="POST" enctype="multipart/form-data" id="modal__addProduct">
<div class="modal__add-product" style="display:block; padding-top:100px">
    

                <div class="modal__edit-product-content">

                    <div class="modal__add-product-header">
                        <p class="modal__add-product-header-heading">Sửa sản phẩm</p>
                    </div>

                    <div class="modal__add-product-user">

                    </div>

                    <div class="modal__add-product-name">
                    <input title=' <?php echo $row_up['TenSanPham']; ?>' type="text" placeholder="Tên sản phẩm ....." value="<?php echo $row_up['TenSanPham']; ?>" name="productname">
                    </div>

                    <div class="modal__add-product-quantity">
                    <input type="text" placeholder="Số lượng sản phẩm" value="  <?php echo $row_up['SoLuongSanPham']; ?>" id="txtadminquantity" name="productquantity">
                    </div>

                    <div class="modal__add-product-type">
                    <select id="txtadmintype" name="producttype" >
                    <?php
        $brand = "SELECT * from tbl_loaisanpham ";
        $result = mysqli_query($conn,$brand);  
            
            while($rowd = mysqli_fetch_assoc($result)){
                ?>
                            <option value="<?php echo $rowd['MaLoai']; ?>"><?php echo $rowd['TenLoai']; ?></option>
                            <?php  }  ?>
                    </select>

                    </div>

                    <div class="modal__add-product-description">
                    <input title=' <?php echo $row_up['MoTaSanPham']; ?>' type="text" placeholder="Mô tả sản phẩm" value="<?php echo $row_up['MoTaSanPham']; ?>" id="txtadmindescription" name="productdescription">
                    </div>

                    <div class="modal__add-product-img">
                        <input type="file" name="productimg" id="fadminimg">
                    </div>

                    <div class="modal__add-product-prices">
                    <input type="text" placeholder="Giá sản phẩm" value="<?php echo $row_up['GiaSanPham']; ?>" id="txtadminprices" name="productprice">
                    </div>

                    <div class="modal__add-product-btn" id="btnadminupdate">
                        <button id="editProduct" name="editProduct-btn">Cập nhật</button>
                    </div>

                    
                </div>
            </div>
            </form>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="main.js"></script>
</html>