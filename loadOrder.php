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
<div id="order-noti"></div>
<div class="app__content-container-title hide-on-mobile">
                        <div class="app__content-title">
                            <div class="app__content-title_order-id">
                                <p>ID</p>
                            </div>

                            <div class="app__content-title_order-user">
                                <p>Mã Khách Hàng</p>
                            </div>

                            <div class="app__content-title_order-date">
                                <p>Ngày đặt</p>
                            </div>

                            <div class="app__content-title_order-total">
                                <p>Tổng tiền</p>
                            </div>

                            <div class="app__content-title_order-status">
                                <p>Trạng thái</p>
                            </div>

                            <div class="app__content-title_order-detail">
                                <p>Chi tiết đơn hàng</p>
                            </div>

                            <div class="app__content-title-tools">
                                <p>Công cụ</p>
                            </div>
                        </div>
                    </div>
<div class="app__content-container-show hide-on-mobile-admin">
    
                  <?php
                   include_once 'config.php';
                    $order = "SELECT * from tbl_donhang,tbl_trangthaidonhang where tbl_donhang.TrangThai = tbl_trangthaidonhang.MaTrangThai ORDER by MaDonHang ASC";
        $result = mysqli_query($conn,$order);  
        $stt = 0;
            while($row = mysqli_fetch_assoc($result)){
                $stt +=1;
                
                ?>
                        <div class="app__content-view">
                            <div class="app__content-view_order-id">
                                <p>
                                    <?php echo $stt; ?>
                                </p>
                            </div>
                            <div class="app__content-view_order-user">
                                <p title=' <?php echo $row['MaKhachHang']; ?>'>
                                <?php echo $row['MaDonHang']; ?></p>
                            </div>

                            <div class="app__content-view_order-date">
                                <p title=' <?php echo $row['NgayDat']; ?>'>
                                <?php echo $row['NgayDat']; ?></p>
                            </div>

                            <div class="app__content-view_order-total">
                                <p title=' <?php echo $row['TongTien']; ?>'>
                                <?php echo $row['TongTien']; ?></p>
                            </div>

                            <div class="app__content-view_order-status">
                                <p>
                                    <?php echo $row['TenTrangThai']; ?>
                                </p>
                                
                            </div>

                            <div class="app__content-view_order-detail">
                                <button  href="" onclick="showModalDetail();">Xem chi tiết</button>
                            </div>

                            <div class="app__content-view-tools">
                            <a href="editOrder.php?id=<?php echo $row['MaDonHang']; ?>">
                            <button class="app__content-view-tools-update edit-order" name="edit-order" value="<?php echo $row['MaDonHang']; ?>">
                                    <i class="fas fa-pen"></i>
            </button>
            </a>
                               
                                <button  class="app__content-view-tools-delete del-order" name="delete-order" value="<?php echo $row['MaDonHang']; ?>"> 
                                    <i class="fas fa-trash-alt"></i>
                          </button>
          
                            </div>
                        </div>
                        <?php  }  
                        
                    ?>

                    </div>

                    <div class="app__content-mobile hide-on-pc display-on-mobile">
                    <?php
                    $order = "SELECT * from tbl_donhang,tbl_trangthaidonhang where tbl_donhang.TrangThai = tbl_trangthaidonhang.MaTrangThai ORDER by MaDonHang ASC";
        $result = mysqli_query($conn,$order);  
        $stt = 0;
            while($row = mysqli_fetch_assoc($result)){
                $stt +=1;
                ?>
                        <div class="app__content-mobile-view">
                            <div class="app__content-mobile-view_order-id">
                                <p>
                                <i class="fas fa-radiation-alt"></i> ID: <span>
                                <?php echo $stt; ?>
                                    </span></p>
                                </p>
                            </div>
                            <div class="app__content-mobile-view_order-user">
                            <p><i class="fas fa-user"></i> Mã Khách Hàng: <span>
                            <?php echo $row['MaKhachHang']; ?>
                                    </span></p>
                            </div>

                            <div class="app__content-mobile-view_order-date">
                            <p><i class="ti-calendar"></i> Ngày đặt: <span>
                            <?php echo $row['NgayDat']; ?></p>
                                    </span></p>
                                
                            </div>

                            <div class="app__content-mobile-view_order-total">
                            <p><i class="ti-money"></i> Tổng tiền: <span>
                            <?php echo $row['TongTien']; ?></p>
                                    </span></p>
                            </div>

                            <div class="app__content-mobile-view_order-status">
                            <p><i class="ti-bookmark-alt"></i> Trạng thái: <span>
                            <?php echo $row['TenTrangThai']; ?></p>
                                    </span></p>
                            </div>

                            
                            <button class="app__content-mobile-view_order-tools-detail">Xem chi tiết</button>
                            
                            <div class="app__content-mobile-view-tools">
                            <a href="editOrder.php?id=<?php echo $row['MaDonHang']; ?>">
                                <button class="app__content-mobile-view-tools-update update-order" name="edit-order" value="<?php echo $row['MaDonHang']; ?>">
                                    <i class="fas fa-pen"></i>
            </button>
            </a>
                                <button class="app__content-mobile-view-tools-delete del-order" name="delete-order" value="<?php echo $row['MaDonHang']; ?>">
                                    <i class="fas fa-trash-alt"></i>
            </button>
                                
                            </div>
                        </div>
                        <?php  }  
                        
                    ?>   

                    </div>

                    <div class="pagination">
                        <div class="pagination__list">
                            <a href="admin.html" class="pagination__list-link">
                                <div class="pagination__list-item">Home</div>
                            </a>
                            <a href="admin.html?manager=product&amp;page=1#" id="prePage" class="pagination__list-link">
                                <div class="pagination__list-item">Prev</div>
                            </a>
                            <a href="admin.html?manager=product&amp;page=1" class="pagination__list-link" id="page1">
                                <div class="pagination__list-item">1</div>
                            </a>
                            <a href="admin.html?manager=product&amp;page=2" class="pagination__list-link" id="page2">
                                <div class="pagination__list-item">2</div>
                            </a>
                            <a href="admin.html?manager=product&amp;page=3" class="pagination__list-link" id="page3">
                                <div class="pagination__list-item">3</div>
                            </a>
                            <a href="admin.html?manager=product&amp;page=2" id="nextPage" class="pagination__list-link">
                                <div class="pagination__list-item">Next</div>
                            </a>
                        </div>
                    </div>
</body>
</html>