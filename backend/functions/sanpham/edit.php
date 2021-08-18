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
        //1. Mở kết nối đến database
        include_once __DIR__.'/../../../dbconnect.php';
        

        //2. Chuẩn bị câu lệnh láy dữ liệu cũ
        $sp_ma = $_GET['sp_ma'];
        $sqlEditRecord = <<<EOT
            SELECT * FROM sanpham WHERE sp_ma = $sp_ma
EOT;

        //3.Thực thi câu lệnh
        $resultEditRecord = mysqli_query($conn, $sqlEditRecord);
        //Phân tích dữ liệu trả về
        $dataEditRecord = mysqli_fetch_array($resultEditRecord, MYSQLI_ASSOC);



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

        





        <h1>Sửa sản phẩm</h1>
        <form name="frmEditRecord" id="frmEditRecord" method="post" action="">
            <div class="form-group">
                <label for="sp_ten">Tên sản phẩm</label>
                <input type="text" name="sp_ten" id="sp_ten" class="form-control" value="<?=$dataEditRecord['sp_ten']?>">
            </div>
            <div class="form-group">
                <label for="sp_gia">Giá</label>
                <input type="text" name="sp_gia" id="sp_gia" class="form-control" value="<?=$dataEditRecord['sp_gia']?>">
            </div>
            <div class="form-group">
                <label for="sp_giacu">Giá cũ</label>
                <input type="text" name="sp_giacu" id="sp_giacu" class="form-control" value="<?=$dataEditRecord['sp_giacu']?>">
            </div>
            <div class="form-group">
                <label for="sp_mota_ngan">Mô tả ngắn</label>
                <textarea name="sp_mota_ngan" id="sp_mota_ngan" class="form-control"><?=$dataEditRecord['sp_mota_ngan']?></textarea>
            </div>
            <div class="form-group">
                <label for="sp_mota_chitiet">Mô tả chi tiết</label>
                <textarea name="sp_mota_chitiet" id="sp_mota_chitiet" class="form-control"><?=$dataEditRecord['sp_mota_chitiet']?></textarea>
            </div>
            <div class="form-group">
                <label for="sp_ngaycapnhat">Ngày cập nhật</label>
                <input type="text" name="sp_ngaycapnhat" id="sp_mota_ngan" readonly class="form-control" value="<?=$dataEditRecord['sp_ngaycapnhat']?>">
            </div>
            <div class="form-group">
                <label for="sp_soluong">Số lượng</label>
                <input type="text" name="sp_soluong" id="sp_soluong" class="form-control" value="<?=$dataEditRecord['sp_soluong']?>">
            </div>
            <div class="form-group">
                <label for="">Loại sản phẩm</label>
                <select name="lsp_ma" id="lsp_ma" class="form-control">
                   
                    <?php foreach($danhsachLoaiSanPham as $lsp): ?>
                    
                    <?php $lspSelected='';
                         if($lsp['lsp_ma']==$dataEditRecord['lsp_ma']){
                            $lspSelected = 'selected';
                        }   
                    ?>

                    <option value="<?=$lsp['lsp_ma']?>" <?=$lspSelected?>><?=$lsp['lsp_ten']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Nhà sản xuất</label>
                <select name="nsx_ma" id="nsx_ten" class="form-control">
                    <?php foreach($danhsachNhaSanXuat as $nsx): ?>
                    <option value="<?=$nsx['nsx_ma']?>" <?php echo($nsx['nsx_ma']==$dataEditRecord['nsx_ma'] ? 'selected' : '') ?>  ><?=$nsx['nsx_ten']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Khuyến mãi</label>
                <select name="km_ma" id="km_ten" class="form-control">
                    <option value="">Không chọn khuyến mãi</option>
                    <?php foreach($danhsachKhuyenMai as $km): ?>
                    <option value="<?=$km['km_ma']?>" <?php echo($km['km_ma']==$dataEditRecord['km_ma'] ? 'selected' : '') ?>                >
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
            if( isset($_POST['btnSave']) ){
                $sp_ten = $_POST['sp_ten'];
                $sp_gia = $_POST['sp_gia'];
                $sp_giacu = $_POST['sp_giacu'];
                $sp_mota_ngan = $_POST['sp_mota_ngan'];
                $sp_mota_chitiet= $_POST['sp_mota_chitiet'];
                $sp_ngaycapnhat = date('Y-m-d H:i:s');
                $sp_soluong = $_POST['sp_soluong'];
                $lsp_ma = $_POST['lsp_ma'];
                $nsx_ma = $_POST['nsx_ma'];
                $km_ma = empty($_POST['km_ma']) ? 'NULL' : $_POST['km_ma'];

                //Chuẩn bị câu lệnh update
                $sqlUpdate = <<<EOT
                    UPDATE sanpham
                    SET
                        sp_ten = '$sp_ten',
                        sp_gia = $sp_gia,
                        sp_giacu = $sp_giacu,
                        sp_mota_ngan = '$sp_mota_ngan',
                        sp_mota_chitiet = '$sp_mota_chitiet',
                        sp_ngaycapnhat = '$sp_ngaycapnhat',
                        sp_soluong= $sp_soluong,
                        lsp_ma = $lsp_ma,
                        nsx_ma = $nsx_ma,
                        km_ma = $km_ma
                    WHERE sp_ma = $sp_ma 
EOT;
                //Thực thi
                mysqli_query($conn, $sqlUpdate);

                //Điều hướng về trang index.php
                echo('<script>location.href = "index.php" </script>');
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