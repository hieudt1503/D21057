<?php
    echo'Xin chao PHP';

    $hoten = 'Dinh Trong Hieu';
    echo 'Ten cua ban la: <b>'.$hoten.'</b>';
    //nhay '' va "" khong hieu xuong dong
    //Nhay kep "
    echo "Ten cua ban la <b>$hoten</b>";


    $tukhoa='Dien thoai';
    $sql1 = <<<EOT
    SELECT lsp.lsp_ten, COUNT(*)
    FROM sanpham sp
    WHERE sp.sp_ten LIKE % $tukhoa%
    JOIN loaisanpham lsp ON sp.lsp_ma = lsp.lsp_ma
    GROUP BY lsp.lsp_ten
    HAVING COUNT(*) > 1
EOT;
    echo $sql1;

    $ten='Dinh Trong Hieu';
    $cmnd='212239343403';
    $sdt='12345567898';
    //render or Print ra man hinh
    //Giao het tat ca viec in cho webserver
    // echo '<ul>';
    // echo '<li>Ten là: '.$ten.'</li>';
    // echo '<li>cmnd là: '.$cmnd.'</li>';
    // echo '<li>sdt là: '.$sdt.'</li>';
    // echo '</ul>';

    //xem truoc jagged array
    // 1 dong tuong tuong 1 record
    //key => 


    $khachhangRow = array(
        'kh_hoten' => 'Hieu',
        'kh_cmnd' => '12345',
        'kh_sdt' => '567890'

    );
    $khachhangRow2 = array(
        'kh_hoten' => 'Hieuafadf',
        'kh_cmnd' => '1234aad5',
        'kh_sdt' => '56789adf0'

    );
    $khachhangRow3 = array(
        'kh_hoten' => 'Hieadfasdu',
        'kh_cmnd' => '123431235',
        'kh_sdt' => '56782342390'

    );

    $mangdanhsach=[
        $khachhangRow, //dat ten alias kh
        $khachhangRow2,
        $khachhangRow3,

    ];


?>

<div>
    <table border="1">
        <tr>
            <td>Ten </td>
            <td>Cmnd</td>
            <td>Sdt</td>
        </tr>
        <?php foreach($mangdanhsach as $kh){ ?>
        <tr>
            <td><?php echo $kh['kh_hoten'];?></td>
            <td><?php echo $kh['kh_cmnd'];?></td>
            <td><?= $kh['kh_sdt']?></td>
        </tr>
        <?php } ?>
    </table>
</div>

