<?php
    require('open-connection.php');
    $strsql = "SELECT * FROM product_lists";
    function viewRS($con, $strsql){
        $rs = [];
        $i = 0;
        if($stmt = mysqli_query($con, $strsql)){

            if(mysqli_num_rows($stmt) == 1){
                $record = mysqli_fetch_array($stmt);
                foreach($record as $key => $value){
                    $rs[$key] = $value;
                }
            }
            elseif(mysqli_num_rows($stmt) > 1){
                while($record = mysqli_fetch_array($stmt)){
                    foreach($record as $key => $value){
                        $rs[$i][$key] = $value;
                    }
                    $i++;
                }
            }
        }
        return $rs;
    }
    $products = viewRS($con, $strsql);
    require('close-connection.php');
?>