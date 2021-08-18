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

    
    <style>
        div{
            border: 1px solid red;
        }
    
    </style>
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
        <div class="col-md-10">
        <h1>Danh sach san pham</h1>

        <?php
        //1. Tao ket noi
        include_once __DIR__.'/../../../dbconnect.php';
        //2. Chuan bi cau lenh
        $sql = <<<EOT
            SELECT * FROM sanpham
EOT;

        //3. Yeu cau thuc thi
        $result = mysqli_query($conn, $sql);
        //4.Phan tich du lieu tra ve
        $danhsachsanpham = [];
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
           $danhsachsanpham[] = [
                'sp_ma' =>$row['sp_ma'],
                'sp_ten' =>$row['sp_ten'],
                'sp_gia' =>$row['sp_gia'],
                'sp_gia' =>$row['sp_gia'],
                'sp_giacu' =>$row['sp_giacu'],
                'sp_mota_ngan' =>$row['sp_mota_ngan'],
                'sp_mota_chitiet' =>$row['sp_mota_chitiet'],
                'sp_ngaycapnhat' =>$row['sp_ngaycapnhat'],
                'lsp_ma' =>$row['sp_soluong'],
                'nsx_ma' =>$row['sp_soluong'],
                'km_ma' =>$row['sp_soluong'],
           ];
        }
        ?>
        <a class="btn btn-primary" href="create.php">Thêm mới</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã SP</th>
                    <th>Tên SP</th>
                    <th>Giá SP</th>
                    <th>Mô tả ngắn</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($danhsachsanpham as $sp):?>
                <tr>
                    <td><?php echo $sp['sp_ma']; ?></td>
                    <td><?= $sp['sp_ten'];?></td>
                    <td class='text-right'><?=number_format($sp['sp_gia'],0,'.',',');?> vnđ</td>
                    <td><?= $sp['sp_mota_ngan'];?></td>
                    <td>
                        <a class='btn btn-success' href="edit.php?sp_ma=<?=$sp['sp_ma']?>">Sửa</a>
                        <button class='btn btn-danger btn-delete' data-sp-ma="<?=$sp['sp_ma']?>">Xóa</button>
                    </td> 
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


        </div>
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


<!-- file script dành riêng cho trang index, liên kết tại đây -->
<script src="/D21057/assets/vendor/sweetalert/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function(){

        
        $('.btn-delete').on('click', function(){
            var sp_ma = $(this).attr('data-sp-ma');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "delete.php?sp_ma=" + sp_ma;
                }
            })
        })



    });
</script>

</body>
</html>