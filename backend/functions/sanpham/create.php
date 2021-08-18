<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- seo meta start -->
    <?php
        include_once __DIR__.'/../../layouts/meta.php'
    ?>
    <!-- seo meta end -->

   

    <!-- CSS BootStrap su dung cho toan he thong start -->
    <?php
        include_once __DIR__.'/../../layouts/styles.php'
    ?>
    <!-- CSS BootStrap su dung cho toan he thong end -->

    
    <!-- <style>
        div{
            border: 1px solid red;
        }
    
    </style> -->
</head>
<body>
<!-- header Start -->
<?php
include_once __DIR__.'/../../layouts/partials/header.php';
?>
<!-- header end -->


<!-- content start -->
<div class="container-fluid">
    <div class="row">
        <!-- sidebar start -->
        <?php
            include_once __DIR__.'/../../layouts/partials/sidebar.php';
        ?>
        <!-- sidebar end -->

        
        <!-- main content start -->
        <main role="main" class="col-md-10 ml-sm-auto">
        <!-- Block content -->
        <?php
        //1. Tao ket noi
        include_once __DIR__.'/../../../dbconnect.php';
        
        
        
        
        //Truy vấn lấy ra LOAI SAN PHAM
        //2. Chuan bi cau lenh
        $sqlLoaiSanPham = <<<EOT
            SELECT * FROM loaisanpham
EOT;

        //3. Yeu cau thuc thi
        $resultLoaiSanPham = mysqli_query($conn, $sqlLoaiSanPham);
        //4.Phan tich du lieu tra ve
        $danhsachLoaiSanPham = [];
        while($row = mysqli_fetch_array($resultLoaiSanPham, MYSQLI_ASSOC)){
           $danhsachLoaiSanPham[] = [
                'lsp_ma' =>$row['lsp_ma'],
                'lsp_ten' =>$row['lsp_ten'],
                'lsp_mota' =>$row['lsp_mota'],
           ];
        }

         //Truy vấn lấy ra NHA SAN XUAT
        //2. Chuan bi cau lenh
        $sqlNhaSanXuat = <<<EOT
            SELECT * FROM nhasanxuat
EOT;

        //3. Yeu cau thuc thi
        $resultNhaSanXuat= mysqli_query($conn, $sqlNhaSanXuat);
        //4.Phan tich du lieu tra ve
        $danhsachNhaSanXuat = [];
        while($row = mysqli_fetch_array($resultNhaSanXuat, MYSQLI_ASSOC)){
           $danhsachNhaSanXuat[] = [
                'nsx_ma' =>$row['nsx_ma'],
                'nsx_ten' =>$row['nsx_ten'],
           ];
        }
        

        //Truy vấn lấy ra KUYEN MAI
        //2. Chuan bi cau lenh
        $sqlKhuyenMai = <<<EOT
            SELECT * FROM khuyenmai
EOT;

        //3. Yeu cau thuc thi
        $resultKhuyenMai= mysqli_query($conn, $sqlKhuyenMai);
        //4.Phan tich du lieu tra ve
        $danhsachKhuyenMai = [];
        while($row = mysqli_fetch_array($resultKhuyenMai, MYSQLI_ASSOC)){
           $danhsachKhuyenMai[] = [
                'km_ma' =>$row['km_ma'],
                'km_ten' =>$row['km_ten'],
                'km_noidung'=>$row['km_noidung'],
                'km_tungay' =>$row['km_tungay'],
                'km_denngay' =>$row['km_denngay'],
           ];
        }





        ?>

        





        <h1>Thêm sản phẩm</h1>
        <form name="frmCreate" id="frm Create" method="post" action="">
            <div class="form-group">
                <label for="sp_ten">Tên sản phẩm</label>
                <input type="text" name="sp_ten" id="sp_ten" class="form-control">
            </div>
            <div class="form-group">
                <label for="sp_gia">Giá</label>
                <input type="text" name="sp_gia" id="sp_gia" class="form-control">
            </div>
            <div class="form-group">
                <label for="sp_giacu">Giá cũ</label>
                <input type="text" name="sp_giacu" id="sp_giacu" class="form-control">
            </div>
            <div class="form-group">
                <label for="sp_mota_ngan">Mô tả ngắn</label>
                <input type="text" name="sp_mota_ngan" id="sp_mota_ngan" class="form-control">
            </div>
            <div class="form-group">
                <label for="sp_mota_chitiet">Mô tả chi tiết</label>
                <input type="text" name="sp_mota_chitiet" id="sp_mota_chitiet" class="form-control">
            </div>
            <div class="form-group">
                <label for="sp_ngaycapnhat">Ngày cập nhật</label>
                <input type="text" name="sp_ngaycapnhat" id="sp_mota_ngan" class="form-control">
            </div>
            <div class="form-group">
                <label for="sp_soluong">Số lượng</label>
                <input type="text" name="sp_soluong" id="sp_soluong" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Loại sản phẩm</label>
                <select name="lsp_ma" id="lsp_ma">
                    <?php foreach($danhsachLoaiSanPham as $lsp): ?>
                    <option value="<?=$lsp['lsp_ma']?>"><?=$lsp['lsp_ten']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Nhà sản xuất</label>
                <select name="nsx_ma" id="nsx_ten">
                    <?php foreach($danhsachNhaSanXuat as $nsx): ?>
                    <option value="<?=$nsx['nsx_ma']?>"><?=$nsx['nsx_ten']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Khuyến mãi</label>
                <select name="km_ma" id="km_ten">
                    <option value="">Không chọn khuyến mãi</option>
                    <?php foreach($danhsachKhuyenMai as $km): ?>
                    <option value="<?=$km['km_ma']?>">
                    Khuyến mãi: <?=$km['km_ten']?>;
                    Nội dung: <?=$km['km_noidung']?>;
                    Từ ngày: <?=date('d/m/Y', strtotime($km['km_tungay']))?>;
                    Đến ngày: <?=date('d/m/Y', strtotime($km['km_denngay']))?>;
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form">
                <button class="btn btn-primary" name="btnSave" id ="btnSave">Lưu dữ liệu</button>
            </div>
        </form>

        <?php
        if( isset($_POST['btnSave'])){
            //Xử lý Save (insert)
            //Thu thập dữ liệu người dùng gởi đến
            $sp_ten = $_POST['sp_ten'];//name="sp_ten"
            $sp_gia = $_POST['sp_gia'];
            $sp_giacu = $_POST['sp_giacu'];
            $sp_mota_ngan = $_POST['sp_mota_ngan'];
            $sp_mota_chitiet = $_POST['sp_mota_chitiet'];
            $sp_ngaycapnhat = $_POST['sp_ngaycapnhat'];
            $sp_soluong= $_POST['sp_soluong'];
            $lsp_ma = $_POST['lsp_ma'];
            $nsx_ma = $_POST['nsx_ma'];
            $km_ma = empty($_POST['km_ma']) ? 'NULL' : $_POST['km_ma'];
        
        //Chuẩn bị câu lệnh insert
        $sqlInsert=<<<EOT
        INSERT INTO sanpham
        (sp_ten, sp_gia, sp_giacu, sp_mota_ngan, sp_mota_chitiet, sp_ngaycapnhat, sp_soluong, lsp_ma, nsx_ma, km_ma)
        VALUES 
        ('$sp_ten', $sp_gia,  $sp_giacu, '$sp_mota_ngan', '$sp_mota_chitiet', '$sp_ngaycapnhat', $sp_soluong, $lsp_ma, $nsx_ma, $km_ma)
       
EOT;

        //Thực thi câu lệnh
        mysqli_query($conn, $sqlInsert);

        //nếu lưu thành công thì qquay về trang danh sách
        //Điều hướng (redirect) về trang index.php
        echo '<script>window.location = "index.php";</script>';

        }
        ?>

        <!-- End block content -->
        </main>
        <!-- main content end -->
    </div>
    <!-- footer start -->
    <?php
    include_once __DIR__.'/../../layouts/partials/footer.php'
    ?>
    <!-- footer end -->
</div>
<!-- content end -->





<!-- jquery va bootstrap start-->
<?php
    include_once __DIR__.'/../../layouts/scripts.php'
?>
<!-- jquery va bootstrap end-->


</body>
</html>