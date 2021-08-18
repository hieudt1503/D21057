<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- seo meta start -->
    <?php
        include_once __DIR__.'/meta.php'
    ?>
    <!-- seo meta end -->

   

    <!-- CSS BootStrap su dung cho toan he thong start -->
    <?php
        include_once __DIR__.'/styles.php'
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
include_once __DIR__.'/partials/header.php';
?>
<!-- header end -->
<!-- content start -->
<div class="container-fluid">
    <div class="row">
        <!-- sidebar start -->
        <?php
            include_once __DIR__.'/partials/sidebar.php';
        ?>
        <!-- sidebar end -->
        <!-- main content start -->
        <div class="col-md-9">
        MAIN CONTENT




        </div>
        <!-- main content end -->
    </div>
    <!-- footer start -->
    <?php
    include_once __DIR__.'/partials/footer.php'
    ?>
    <!-- footer end -->
</div>
<!-- content end -->





<!-- jquery va bootstrap start-->
<?php
    include_once __DIR__.'/scripts.php'
?>
<!-- jquery va bootstrap end-->


</body>
</html>