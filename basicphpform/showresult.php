<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>ของขวัญที่คุณสามารถซื้อได้คือ</h2>
    
    <?php
    $myname = $_POST["myname"];
    $mymoney = $_POST["mymoney"];
    echo"สวัสดีครับ คุณ $myname <br>";
    if ($mymoney>=500){
        echo "ซื้อหูฟัง";
    }elseif($mymoney>=200){
        echo "เคสโทรศัพท์";
    }elseif($mymoney>=100){
        echo "ซื้อขนม";
    }else{
        echo"ไม่ซื้ออะไรเลย";
    }

    
    ?>

</body>

</html>