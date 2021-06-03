<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rende du lieu dang dang danh sach array bang php</title>
</head>
<body>
    <!-- tim hieu them ve thacsess -->
    <?php

    $sinhvien1= array(
        'hoten' => 'Duong Nguyen Phu Cuong',
        'gioitinh' => 'Nam',
        'diemlt' => 8,
        'diemth' => 7,
    );
    $sinhvien2 = [
        'hoten' => 'Tran Thi B',
        'gioitinh' => 'Nu',
        'diemlt' => 6,
        'diemth' => 7,
    ];
    $sinhvien3 = array(
        'hoten' => 'Pham Van C',
        'gioitinh' => 'Nam',
        'diemlt' => 8,
        'diemth' => 7,
    );

    $danhsachsv=[
        $sinhvien1, //dat ten alias kh
        $sinhvien2,
        $sinhvien3,

    ];


    ?>




    render foreach {}
    <div>
    <table border="1">
        <tr>
            <td>Ho Ten </td>
            <td>Gioi Tinh</td>
            <td>Diem LT</td>
            <td>Diem TH</td>
        </tr>
        <?php foreach($danhsachsv as $sv){ ?>
        <tr>
            <td><?php echo $sv['hoten'];?></td>
            <td><?php echo $sv['gioitinh'];?></td>
            <td><?= $sv['diemlt']?></td>
            <td><?= $sv['diemth']?></td>
        </tr>
        <?php } ?>

    </table>
    </div>


    render foreach :
    <div>
    <table border="1">
        <tr>
            <td>Ho Ten </td>
            <td>Gioi Tinh</td>
            <td>Diem LT</td>
            <td>Diem TH</td>
        </tr>
        <?php foreach($danhsachsv as $sv): ?>
        <tr>
            <td><?php echo $sv['hoten'];?></td>
            <td><?php echo $sv['gioitinh'];?></td>
            <td><?= $sv['diemlt']?></td>
            <td><?= $sv['diemth']?></td>
        </tr>
        <?php endforeach; ?>

    </table>
    </div>



    render for :
    <div>
    <table border="1">
        <tr>
            <td>Ho Ten </td>
            <td>Gioi Tinh</td>
            <td>Diem LT</td>
            <td>Diem TH</td>
        </tr>
        <?php for ($index =0;$index<count($danhsachsv);$index++): ?>
        <tr>
            <td><?php echo $danhsachsv[$index]['hoten'];?></td>
            <td><?php echo $danhsachsv[$index]['gioitinh'];?></td>
            <td><?= $danhsachsv[$index]['diemlt']?></td>
            <td><?= $danhsachsv[$index]['diemth']?></td>
        </tr>
        <?php endfor; ?>

    </table>
    </div>

    render for {}
    <div>
    <table border="1">
        <tr>
            <td>Ho Ten </td>
            <td>Gioi Tinh</td>
            <td>Diem LT</td>
            <td>Diem TH</td>
        </tr>
        <?php for ($index =0;$index<count($danhsachsv);$index++){ ?>
        <tr>
            <td><?php echo $danhsachsv[$index]['hoten'];?></td>
            <td><?php echo $danhsachsv[$index]['gioitinh'];?></td>
            <td><?= $danhsachsv[$index]['diemlt']?></td>
            <td><?= $danhsachsv[$index]['diemth']?></td>
        </tr>
        <?php }; ?>

    </table>
    </div>












</body>
</html>




