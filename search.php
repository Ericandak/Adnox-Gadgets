<?php
    include('connection.php');
    session_start();
    if(isset($_POST['text'])){
        $text= $_POST['text'];
        $query = "SELECT * FROM pro_tbl WHERE `product_name` LIKE '%$text%' OR `product_price` LIKE '%$text%' OR `product_desc` LIKE '%$text%'";
        $result = mysqli_query($con, $query);

        if($result){
            if(mysqli_num_rows($result) > 0){
                while($q = mysqli_fetch_array($result)){
                    $prod_id = $q['product_id'];
                    $prod_name= $q['product_name'];
                    $prod_img= $q['product_image'];
                    $prod_price= $q['product_price'];
                    $prod_description= $q['product_desc'];
                    
              
                    echo '
                      <div class="search_row">
                          <a href="product-single.php?id='.$prod_id.'" target="_blank">
                              <div class="db_img"><img src="main/images/products/'.$prod_img.'" alt="'.$prod_name.'"></div>
                              <div class="db_pname">'.$prod_name.'</div>
                          </a>
                      </div>
                      ';
                  }
            }
            else{
                echo '
                <div class="search_row">
                    <a href="#">
                        <div class="db_pname">No Results.</div>
                    </a>
                </div>
                ';
            }
          }
    }
?>