<?php
session_start();
if(isset($_SESSION['mySession'])){
    unset($_SESSION['mySession']);
}
header('location:index.php');
?>

<div class="modal__detail-bill">
            <div class="modal__detail-bill-overlay" onclick="hideModalDetail();"></div>

            <?php
        include_once 'config.php';
        $detail = "SELECT * from tbl_sanpham,tbl_chitietdonhang where tbl_sanpham.MaSanPham = tbl_chitietdonhang.MaSanPham where tbl_chitietdonhang.MaDonHang = ".$_GET['id'];
        $result = mysqli_query($conn,$detail);  
        $stt = 0;
            while($row = mysqli_fetch_assoc($result)){
                $stt +=1;
                ?>

            <div class="modal__detail-bill-content">
                <div class="modal__detail-bill-header">
                    <p>Chi tiết đơn hàng</p>
                </div>

                <div class="modal__detail-bill-id">
                    <p>Mã đơn hàng: hihi</p>
                </div>

                <div class="modal__detail-bill-product">

                    <div class="modal__detail-bill-product-header">
                        <p>Sản phẩm</p>
                    </div>

                    <div class="modal__detail-bill-title">
                        <div class="modal__detail-bill-product-id-title">
                            <p>STT</p>
                        </div>
    
                        <div class="modal__detail-bill-product-name-title">
                            <p>Tên sản phẩm</p>
                        </div>
    
                        <div class="modal__detail-bill-product-img-title">
                            <p>Ảnh</p>
                        </div>
    
                        <div class="modal__detaill-bill-product-prices-title">
                            <p>Giá</p>
                        </div>

                        <div class="modal__detaill-bill-product-quantify-title">
                            <p>SL</p>
                        </div>
                    </div>
                    <div class="modal__detail-bill-product-content">
                    <div class="modal__detail-bill-product-id">
            <p><?php echo $stt; ?></p>
        </div>

        <div class="modal__detail-bill-product-name">
            <p><?php echo $row['TenSanPham'];?></p>
        </div>

        <div class="modal__detail-bill-product-img">
            <img src="./uploads/<?php echo $row['HinhAnhSanPham']; ?>" alt="">
        </div>

        <div class="modal__detaill-bill-product-prices">
            <p><?php echo $row['GiaSanPham']; ?></p>
        </div>

        <div class="modal__detaill-bill-product-quantify">
            <p><?php echo $row['SoLuongSanPham'];?></p>
        </div>
                    
                    </div>

                    <div class="modal__detail-bill-product-time">
                        <p>Năm đặt hàng: 2021</p>
                    </div>

                    <div class="modal__detail-bill-product-total">
                        <p>Tổng tiền : 1200$</p>
                    </div>

                    <div class="modal__detail-close" onclick="hideModalDetail();">
                        <i class="fas fa-window-close"></i>
                    </div>
                </div>
            </div>
            <?php  }  
      
                        ?>
        </div>


