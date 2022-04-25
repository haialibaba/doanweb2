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
<div id="del-noti"></div>
<div class="app__content-container-title hide-on-mobile">
                        <div class="app__content-title">
                            <div class="app__content-title-id">
                                <p>ID</p>
                            </div>

                            <div class="app__content-title-user">
                                <p>Người bán</p>
                            </div>

                            <div class="app__content-title-name">
                                <p>Tên sản phẩm</p>
                            </div>

                            <div class="app__content-title-quantity">
                                <p>Số lượng</p>
                            </div>

                            <div class="app__content-title-type">
                                <p>Loại</p>
                            </div>

                            <div class="app__content-title-description">
                                <p>Mô Tả</p>
                            </div>

                            <div class="app__content-title-img">
                                <p>Ảnh sản phẩm</p>
                            </div>

                            <div class="app__content-title-prices">
                                <p>Giá bán</p>
                            </div>

                            <div class="app__content-title-tools">
                                <p>Công cụ</p>
                            </div>
                        </div>
                    </div>
        <div class="app__content-container-show hide-on-mobile-admin">
                    <?php
        include_once 'config.php';
        $product_per_page = 10;
        if(isset($_GET['page'])){
            $page=$_GET['page'];
        }else{
            $page =1;
        }
        $start_from = ($page-1)*10;
        $product = "SELECT * from tbl_sanpham,tbl_loaisanpham where tbl_sanpham.LoaiSanPham = tbl_loaisanpham.MaLoai ";
        $result = mysqli_query($conn,$product);  

        
        $stt = 0;
            while($row = mysqli_fetch_array($result)){
                $stt +=1;
                ?>
                        <div class="app__content-view">
                            <div class="app__content-view-id">
                                <p>
                                    <?php echo $stt; ?>
                                </p>
                            </div>
                            <div class="app__content-view-user">
                                <p>ADMIN</p>
                            </div>
                            <div class="app__content-view-name">
                                <p title=' <?php echo $row['TenSanPham']; ?>'>
                                <?php echo $row['TenSanPham']; ?></p>
                            </div>

                            <div class="app__content-view-quantity">
                                <p>
                                    <?php echo $row['SoLuongSanPham']; ?>
                                </p>
                            </div>

                            <div class="app__content-view-type">
                                <p>
                                    <?php echo $row['TenLoai']; ?>
                                </p>
                            </div>

                            <div class="app__content-view-description">
                                <p title=' <?php echo $row['MoTaSanPham']; ?>'>
                                    <?php echo $row['MoTaSanPham']; ?>
                                </p>
                            </div>

                            <div class="app__content-view-img">
                                <img class='overflow-hidden object-cover aspect-video' src="./uploads/<?php echo $row['HinhAnhSanPham']; ?>" alt="">
                            </div>

                            <div class="app__content-view-prices">
                                <p>
                                    <?php echo $row['GiaSanPham']; ?>
                                </p>
                            </div>
                            
                            <div class="app__content-view-tools">
                            <a href="editProduct.php?id=<?php echo $row['MaSanPham']; ?>">
                                <button class="app__content-view-tools-update edit-product" name="edit-product"  value="<?php echo $row['MaSanPham']; ?>">
                                    <i class="fas fa-pen"></i>
            </button>
            </a>
                               
                                <button  class="app__content-view-tools-delete del-product" name="delete-product" value="<?php echo $row['MaSanPham']; ?>"> 
                                    <i class="fas fa-trash-alt"></i>
            </button>
          
                            </div>
                        </div>
                        <?php  }  
                        
                    
                        
                        
                        ?>

                        
                    </div>

                    <div class="app__content-mobile hide-on-pc display-on-mobile">
                        <?php 
                $product = "SELECT * from tbl_sanpham,tbl_loaisanpham where tbl_sanpham.LoaiSanPham = tbl_loaisanpham.MaLoai ORDER by MaSanPham ASC";
                $result = mysqli_query($conn,$product);  
                $stt = 0;
            
         
            while($row = mysqli_fetch_assoc($result)){
                $stt +=1;
                ?>
                        <div class="app__content-mobile-view">
                            <div class="app__content-mobile-view-id">
                                <p><i class="fas fa-radiation-alt"></i> ID: <span>
                                        <?php echo  $stt; ?>
                                    </span></p>
                            </div>

                            <div class="app__content-mobile-view-user">
                                <p><i class="fas fa-user"></i> Người bán: <span>ADMIN</span> </p>
                            </div>

                            <div class="app__content-mobile-view-name">
                                <p><i class="fab fa-product-hunt"></i> Tên sản phẩm: <span>
                                        <?php echo $row['TenSanPham']; ?>
                                    </span></p>
                            </div>

                            <div class="app__content-mobile-view-quantity">
                                <p><i class="ti-pie-chart"></i> Số Lượng: <span>
                                        <?php echo $row['SoLuongSanPham']; ?>
                                    </span></p>
                            </div>

                            <div class="app__content-mobile-view-type">
                                <p><i class="ti-info-alt"></i> Loại: <span>
                                        <?php echo $row['TenLoai']; ?>
                                    </span></p>
                            </div>

                            <div class="app__content-mobile-view-description">
                                <p><i class="ti-info-alt"></i> Mô tả: <span>
                                        <?php echo $row['MoTaSanPham']; ?>
                                    </span></p>
                            </div>

                     

                            <div class="app__content-mobile-view-img">
                                <div class="app__content-mobile-view-img-content">
                                    <p><i class="far fa-image"></i> Ảnh: </p>
                                </div>

                                <div class="app__content-mobile-view-img-img">
                                    <img src="./uploads/<?php echo $row['HinhAnhSanPham']; ?>" alt="">
                                </div>
                            </div>

                            <div class="app__content-mobile-view-prices">
                                <p><i class="fas fa-dollar-sign"></i> Giá: <span>
                                        <?php echo $row['GiaSanPham']; ?>
                                    </span></p>
                            </div>

                            <div class="app__content-mobile-view-tools">
                                <a href="editProduct.php?id=<?php echo $row['MaSanPham']; ?>">
                                <button class="app__content-mobile-view-tools-update" name="edit-product"  value="<?php echo $row['MaSanPham']; ?>" >
                                    <i class="fas fa-pen"></i>
            </button>
            </a>

                                <button class="app__content-mobile-view-tools-delete del-product" name="delete-product" value="<?php echo $row['MaSanPham']; ?>">
                                    <i class="fas fa-trash-alt"></i>
            </button>
                            </div>
                        </div>
                        <?php  }  ?>
                    </div>

                    <div class="pagination">
                        <div class="pagination__list">
                            <a href="admin.php" class="pagination__list-link">
                                <div class="pagination__list-item">Home</div>
                            </a>
                            <a href="" id="prePage" class="pagination__list-link">
                                <div class="pagination__list-item">Prev</div>
                            </a>
                    <?php
                    $sql ="SELECT * from tbl_sanpham,tbl_loaisanpham where tbl_sanpham.LoaiSanPham = tbl_loaisanpham.MaLoai ORDER by MaSanPham";
                    $rs_result = mysqli_query($conn,$sql);
                    $product_of_row = mysqli_num_rows($rs_result);
                    $number_of_page = ceil($product_of_row / $product_per_page);
                    for($i = 1; $i<= $number_of_page;$i++){
                        echo '
                        
                            <a href="admin.php?page='.$i.'" class="pagination__list-link" id="page1">
                                <div class="pagination__list-item">'.$i.'</div>
                            </a>
                        ';
                    }

                    ?>
                    <a href="" id="nextPage" class="pagination__list-link">
                                <div class="pagination__list-item">Next</div>
                            </a>
                        </div>
                    
                    </div>
</body>
</html>