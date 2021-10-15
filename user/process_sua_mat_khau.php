<?php

    $ma = $_POST['ma'];
    $mat_khau_cu = $_POST["mat_khau_cu"];
    $mat_khau_moi = $_POST["mat_khau_moi"];
    $nhap_lai_mat_khau = $_POST['nhap_lai_mat_khau'];

    $connect = mysqli_connect('localhost','root','','do_an');
    mysqli_set_charset($connect,'utf8');

    $sql = "select * from users where password = '$mat_khau_cu' and ma = '$ma'";
    $result = mysqli_query($connect,$sql);

    $dem = mysqli_num_rows($result);
    
    if($dem == 1)
        {
            if ($mat_khau_moi == $nhap_lai_mat_khau)
                {
                    $sql = "update users 
                        set 
                        password = '$mat_khau_moi' 
                        where 
                        ma = '$ma'";
                    mysqli_query($connect,$sql);
                    mysqli_close($connect);
                    header("location:../index.php");
                } else
                    {
                        header("location:thay_doi_mat_khau.php?error= *mật khẩu mới và nhập lại mật khẩu không trùng nhau");
                    }
        } else
            {
                header("location:thay_doi_mat_khau.php?error=*mật khẩu cũ khong chính xác!");
            }
        