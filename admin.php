<?php
include'config.php';
session_start();
if(!isset($_SESSION['mySession'])){
    header('location:index.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Document</title>
</head>

<body>
    <div class="app" >
    <?php
       require_once('header.php');
    ?>
    <?php
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
            }else
                if($productname == '' || $productquantity ==''  || $productdescription == '' || $productprice == ''){
                    echo '<script language="javascript">swal({
                        title: "Do not let it empty. ",
                        icon: "warning",
                        text:"Please insert !",
                      })</script>';          
                        }
                    else{
                echo '<script language="javascript">swal({
                    title: "Add product successfull. ",
                    icon: "success",
                  })</script>';
                

            $sql ="INSERT INTO tbl_sanpham(TenSanPham,HinhAnhSanPham,SoLuongSanPham,MoTaSanPham,GiaSanPham,LoaiSanPham) VALUES ('$productname','$productimg','$productquantity',' $productdescription','$productprice','$producttype')";
            move_uploaded_file($productimg_tmp,$path.$productimg);
            $query = mysqli_query($conn,$sql);
                }
        }

       
       
    ?>
   
        

        <form action="" method="POST" enctype="multipart/form-data" id="modal__addProduct">
            <div class="modal__add-product">
                <div class="modal__add-product-overlay" onclick="hideModalAdd();"></div>

                <div class="modal__add-product-content">

                    <div class="modal__add-product-header">
                        <p class="modal__add-product-header-heading">Thêm mới sản phẩm</p>
                    </div>

                    <div class="modal__add-product-user">

                    </div>

                    <div class="modal__add-product-name">

                    </div>

                    <div class="modal__add-product-quantity">

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

                    </div>

                    <div class="modal__add-product-img">
                        <input type="file" name="" id="fadminimg">
                    </div>

                    <div class="modal__add-product-prices">

                    </div>

                    <div class="modal__add-product-btn" id="btnadminadd">
                        <button class='rounded-md'>Thêm mới</button>
                    </div>

                    <div class="modal__add-product-btn" style="display: none;" id="btnadminupdate">
                        <button id="editProduct" name="editProduct-btn">Cập nhật</button>
                    </div>

                    <div class="modal__add-product-btn-close" onclick="hideModalAdd();">
                        <i class="fas fa-window-close"></i>
                    </div>
                </div>
            </div>
        </form>


      
    

        <div class="app__container" >

      
            <div class="app__category">

                <div class="app__category-header">
                    <a class="app__category-heading">
                        <img src="./assets/img/main.jpg" alt="">
                        <div class="app__category-text">
                            <p class="app__category-text--big">Nam Hải</p>
                            <p class="app__category-text--small">Project Manager</p>
                        </div>
                        <i class="app__category-heading--icon ti-check-box"></i>
                    </a>
                </div>

                <ul class="app__category-list">
                    <a href="">
                        <li class="app__category-list-item" id="managerProduct" style="text-align: left;"><i
                                class="fab fa-product-hunt"></i> <span id="quanlysp" style="display: inline;">Quản lý
                                sản phẩm</span></li>
                    </a>
                    <a href="">
                        <li class="app__category-list-item" id="managerUser" style="text-align: left;"><i
                                class="fas fa-users"></i> <span id="quanlynd" style="display: inline;">Quản lý người
                                dùng</span></li>
                    </a>
                    <a href="xulydonhang.php">
                        <li class="app__category-list-item" id="managerCart" style="text-align: left;"><i
                                class="fas fa-cart-arrow-down"></i> <span id="xulydonhang" style="display: inline;">Xử
                                lý đơn hàng</span></li>
                    </a>
                    <a href="">
                        <li class="app__category-list-item" id="managerStatistic" style="text-align: left;"><i
                                class="fas fa-chart-bar"></i> <span id="thongkedoanhthu" style="display: inline;">Thống
                                kê doanh thu</span></li>
                    </a>
                </ul>
            </div>

            <div class="app__content" onclick="hideAdminBar();">

                <div class="app__content-header">
                    <div class="app__content-heading">
                        <p class="app__content-heading-content">Danh sách</p>
                    </div>

                    <div class="app__content-add-product"> <button onclick="addAdminProduct();"><i
                                class="fas fa-cart-plus"></i> Thêm mới</button></div>
                </div>

                <div class="app__content-container"  id="loadProduct-pc">

                  

                    
                    <div id="del-noti"></div>
                    <div id="edit-noti"></div>
                    

                </div>

            </div>

        </div>

    </div>
            </div>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="main.js"></script>
<script type="text/javascript">
     $(document).ready(function(){
        view_data();
        function view_data(){
            $.post("loadProduct.php",function(data){
                $("#loadProduct-pc").html(data);
                  
            })
        }

    $(document).on('click','.del-product',function(){
        var id = $(this).val();
        var check = confirm("xóa hay không");
              if(check == true ){
                $.post("XuLyProductAdmin.php",{id : id},function(data){
            $("#del-noti").html(data);
            view_data();
        })
              }
       
    });


    
     
})


</script>

</html>