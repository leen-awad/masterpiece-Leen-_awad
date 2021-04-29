<?php
require 'includes/connection.php';
include 'includes/public_header.php';
$id = $_GET["id"];
?>

<div class="bg0 m-t-23 p-b-140">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            
            
           
        </div>
        <div class="row isotope-grid">
            <?php
            $product_query = "SELECT * FROM products where vendor_id = $id";
            $product_result = mysqli_query($conn, $product_query);

            
            while ($product_row = mysqli_fetch_assoc($product_result)) {

                $perPrice = "" ;

                if ($product_row['discount'] > 0) {
                    $Newprice =   ((int)$product_row["product_price"] - ((int)$product_row["product_price"] * ((int)$product_row['discount'] / 100)));
                    $perPrice =  "<p style=' text-decoration: line-through'>". $product_row["product_price"] . " JOD". "</p>" ;
                } else {
                    $Newprice = $product_row["product_price"];
                    $perPrice = "" ;
                }

                echo '
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">

                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="../admin/' . $product_row["product_image"] . '" alt="IMG-PRODUCT" style="height:17rem;width:20rem">
                        <a href="product_detail.php?id=' . $product_row["product_id"] . '" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
                            Quick View
                        </a>
                    </div>
                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="product_detail.php?id=' . $product_row["product_id"] . '" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            ' . $product_row["product_name"] . '
                            </a>
                            <span class="stext-105 cl3">
                                ' .  $perPrice .   $Newprice . " JOD"  . '
                            </span>
                        </div>
                 
                    </div>
                </div>
            </div>
                ';
            }

            ?>

        </div>

       
    </div>
</div>



<?php include 'includes/public_footer.php' ?>