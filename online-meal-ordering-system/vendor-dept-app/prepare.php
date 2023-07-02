<?php session_start();

include("base.php")?>


<div class="big">
	<nav class="navbar navbar-light ayoyolaoshi">
  		<a class="navbar-brand">Here you can view the item list that you have to prepare for customer!</a>
	</nav>
<div class="container">
<div class="overflow-hidden bigbig">
	<center>
		<img src="images/stall1.jpg" alt="Stall Profile Picture" class="img-thumbnail bigbigimg">
		<h3>
      <?php $lgowner = mysqli_real_escape_string($con, $_SESSION['login_owner']);
      echo "$lgowner"; ?>
    </h3>
		<div class="ava"><h5>Available Food:</h5></div>
		<div class="avava">
		<div>
			<table class="table aiyoaiyo">
				<thead></thead>
				<tbody>
                    <?php
                        $id = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
                        $lgcate = mysqli_real_escape_string($con, $_SESSION['login_category']);
                            $sql = "SELECT * FROM food WHERE Food_Category = '$lgcate'";
                            $result = mysqli_query($con, $sql);
                            if(mysqli_num_rows($result)<=0){
                                echo "<script>alert('No Food in the system now! Add more !');</script>";
                                echo "<tr>";
                                echo "<td>";
                                echo "No Food Now !";
                                echo "</td>";
                                echo "</tr>";
                            }
                            while($food = mysqli_fetch_array($result)){
                                if($food['Food_Status'] == 'available'){
                                    $name = $food['Food_Name'];
                                    echo "<tr>";
                                    echo "<td>";
                                    echo "".$name."";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            }
                    ?>
  				</tbody>
			</table>
		</div>
	</div>
	</center>
</div>
<div>
<div class="qeq">
	<div class="qeqweqw">

		<table class="table table-striped table-bordered">
			 <tbody><thead class="thead-dark">
					 <tr>
						 <th scope="col">Prepare Before</th>
						 <th scope="col" class="cenen">Order Remark</th>
						 <th scope="col">Food Name</th>
						 <th scope="col">Done</th>
					 </tr>
				 </thead>

		<?php
										function count_array_values($my_array, $match){
												$count = 0;

												foreach ($my_array as $key => $value){
														if ($value == $match){
																$count++;
														}
												}

												return $count;
										}

						$id = mysqli_real_escape_string($con, $_SESSION['login_stallid']);
						$caca = mysqli_real_escape_string($con, $_SESSION['login_category']);
						date_default_timezone_set("Asia/Kuala_Lumpur");
						$today_date = date("Y-m-d");
						$today_time = date("H:i:s");
						//echo $today_time;
						$sql1 = "SELECT * FROM orders WHERE DATE(Order_Prepare_Time) = '$today_date' and Time(Order_Prepare_Time) <= '$today_time'";
						$result1 = mysqli_query($con, $sql1);

						while($order = mysqli_fetch_array($result1)){
										

										$fidid = $order['Food_ID'];
										$order_id = $order['Order_ID'];
										$order_estimated = $order['Order_Estimated_Time'];
										$order_prepare = $order['Order_Prepare_Time'];
										$order_total = $order['Order_Total_Price'];
										$order_remark = $order['Order_Remark'];
										
										$check_sales = mysqli_query($con,"SELECT * FROM sales WHERE Stall_ID='$id' and Order_ID = '$order_id' " );

										// checking is stall owner have the food inside the order.
										$split_food_id2 = str_split($fidid, 4);
										$food_array2 =array();

										foreach($split_food_id2 as $f_id2){
										$get_food_id2 = mysqli_query($con, "SELECT * FROM food WHERE Food_ID = '$f_id2' and Food_Category = '$caca' and Stall_ID='$id' ");

										$food_name_row2 = mysqli_fetch_array($get_food_id2);
										$food_name2 = $food_name_row2['Food_Name'];
										array_push($food_array2, $food_name2);
								}

										if(mysqli_num_rows($check_sales)== 1){

										}elseif(mysqli_num_rows($check_sales)== 0 and !array_filter($food_array2)){

										}elseif(mysqli_num_rows($check_sales)== 0 and !is_null($food_array2) ){

											$split_food_id = str_split($fidid, 4);
											$food_array =array();
											$food_idarray = array();
											$food_priceprice = array();

											foreach($split_food_id as $f_id){
											$get_food_id = mysqli_query($con, "SELECT * FROM food WHERE Food_ID = '$f_id'
											and Food_Category = '$caca' and Stall_ID='$id' ");

											$food_name_row = mysqli_fetch_array($get_food_id);
											$food_id = $food_name_row['Food_ID'];
											$food_name = $food_name_row['Food_Name'];
											$food_ca = $food_name_row['Food_Category'];
											$food_price = $food_name_row['Unit_Price'];
											array_push($food_array, $food_name);
											array_push($food_idarray, $food_id);
											array_push($food_priceprice, $food_price);
									}
									// print_r($food_idarray);
									$foodididid = "";
									foreach($food_idarray as $f_id){

											$foodididid = $foodididid.$f_id;
									}
									// print($foodididid);

									// print_r($food_priceprice);
									$foodpriceprice = "";
									foreach($food_priceprice as $f_p){

											$foodpriceprice = $foodpriceprice + $f_p;
									}
									// print($foodpriceprice);
					echo "<form action='sales.php' method='post'>";
                    echo "<tr>";
                    echo "<td><div class='cenen'><a name='estimated' id='estimated'>$order_estimated</a></div></td>";

                    if($order_remark == NULL){
                    	echo "<td></td>";
                    }else{
                   		echo "<td><button type='button' class='btn btn-secondary' data-container='body' data-toggle='popover' data-placement='right' data-content='".$order_remark."'>i</button></td>";
                	}


                    echo "<td>";
                    $count_duplicated_food = "";
                    foreach (array_unique($food_array) as $key => $food_n) {
                        $count_duplicated_food = count_array_values($food_array, $food_n);

                        if (array_key_exists($key, $food_array) && is_null($food_array[$key])) {
                          // print("sadewq");
                        }else{
                          echo "<div>$count_duplicated_food x $food_n<input style='float:right' type='checkbox' required></div><br> ";
                        }

                    }

                    echo "</td>";

                                        
                    echo "<td><button type='submit' name='submit' id='submit'>Done</button>";
                    echo "</td>";
                    echo "<input type='hidden' value='".$order_id."' name='orderid' id='orderid'>";
                    echo "<input type='hidden' value='".$foodididid."' name='foodidid' id='foodidid'>";
                    echo "<input type='hidden' value='".$order_prepare."' name='prepare' id='prepare'>";
                    echo "<input type='hidden' value='".$foodpriceprice."' name='total' id='total'>";
                    echo "<input type='hidden' value='".$count_duplicated_food."' name='count' id='count'>";
                    echo "</tr>";
                    echo "</form>";
                    }
				}
                ?>
      <!-- </form> -->
    </tbody>
  </table>

	</div>
</div>
</div>

<div>
<nav class="navbar navbar-light wowowow">
	<div class="mmxx">
		<a class="navbar-brand leleft" >Note  :</a>
		<div class="card maxfull">
			<div class="card-body">
				<p class="card-text">This is the food order you have to prepare before the customer come and take their meal.<br>
    			The ordered meal have to done prepared for the customer 15 minutes before the time scheduled and after that, the order cannot be cancel anymore.
    		</p>
			</div>
		</div>
	</div>
</nav>
</div>
</div>

</div>

<script>
  $(function () {
  $('.example-popover').popover({
    container: 'body'
  })
})
</script>
<script>
  $(function () {
  $('[data-toggle="popover"]').popover()
})
</script>
