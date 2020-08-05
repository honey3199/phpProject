<?php include("header.php");
require_once('config/connection.php');

	if(isset($_GET['id']))
	{
		$cid = $_GET['id'];
	}
											
	if($cid == 1)
	{
		$sql1="select * from part p join product_image pi WHERE pi.PART_ID = p.PART_ID and pi.cover_image = 1";
	}
											
	else
	{	
		$sql1="select * from product p join product_image pi WHERE p.PRODUCT_ID = pi.PRODUCT_ID and pi.cover_image = 1
		and	p.CATEGORY_ID='".$cid."'";												
	}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$price=$_POST['amount'];
	$amt = (explode("-",$price));	
	
	$start = $amt[0];
	$end = $amt[1];
	
	if($cid == 1)
	{
		$sql1="select * from part p join product_image pi WHERE pi.PART_ID = p.PART_ID and pi.cover_image = 1
		and PRICE between $start and $end";
	}
											
	else
	{	
		$sql1="select * from product p join product_image pi WHERE p.PRODUCT_ID = pi.PRODUCT_ID and pi.cover_image = 1
		and	p.CATEGORY_ID='".$cid."' and PRICE between $start and $end";												
	}
}	
 ?>
 
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <ul class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li class="current"><a>Shop</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> 

        <!-- Main Wrapper Start -->
        <main id="content" class="main-content-wrapper">
            <div class="shop-area pt--40 pb--80 pt-sm--30 pb-sm--60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 order-lg-2 mb-md--40">
                            <!-- Shop Toolbar Start -->
                            <div class="shop-toolbar">
                                <div class="shop-toolbar__grid-list">
                                    <ul class="nav">
                                        <li>
                                            <a class="active" data-toggle="tab" href="#grid"><i class="fa fa-th"></i></a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#list"><i class="fa fa-list"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="shop-toolbar__shorter">
                                    <label>Short By:</label>
                                    <select class="short-select nice-select">
                                        <option value="1">Relevance</option>
                                        <option value="2">Name, A to Z</option>
                                        <option value="3">Name, Z to A</option>
                                        <option value="4">Price, low to high</option>
                                        <option value="5">Price, high to low</option>
                                    </select>
                                </div>
                                <span class="shop-toolbar__product-count">There Are 13 Products.</span>
                            </div>
                            <!-- Shop Toolbar End -->

                            <!-- Shop Layout Start -->
                            <div class="main-shop-wrapper">
                                <div class="tab-content" id="myTabContent-2">
                                    <div class="tab-pane show active" id="grid">
                                        <div class="product-grid-view three-column">
                                            <div class="row no-gutters">
											<?php 
									        
									        $result1=mysqli_query($conn,$sql1);
									        while($row=mysqli_fetch_array($result1))
									        {
												if($cid ==1)
												{
													$partid = $row['PART_ID'];
												}
												else
												{
													$pid=$row['PRODUCT_ID'];
												}
											?>
									
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="product-box  bg--white color-1">
                                                        <div class="product-box__img">
                                                            <img src="imagess/<?php echo $row['IMAGE_PATH']?>" height="200" width="200" alt="product" >
                                                            
                                                           
                                                        </div>
                                                        <div class="product-box__content">
                                                            <h3 class="product-box__title"><a href="viewdetails.php?<?php if($cid==1){?>partid=<?php echo $partid; }else{?>productid=<?php echo $pid;}?>&cid=<?php echo $cid?>"><?php if($cid==1){echo $row['PA_NAME']; } else {echo $row['P_NAME'];}?></a></h3>
                                                            
                                                            <div class="product-box__price">
                                                               
                                                                <span class="sale-price">₹<?php echo$row['PRICE']?></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-box__action action-2">
                                                            
                                                            <a href="viewdetails.php?id=<?php echo $pid;?>" class="add-to-cart" data-toggle="tooltip" data-placement="top" title="Add to cart"><i class="fa fa-shopping-bag"></i> add to cart</a>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
											<?php 
									        }
									        ?>
                                            </div>
                                            
                                        </div>
                                    </div>
									<div class="tab-pane" id="list">
                                        <div class="product-list-view">
                                            <div class="product-box product-box--list bg--white">
											
                                                <div class="row">
												<?php 
									        
												$result1=mysqli_query($conn,$sql1);
												while($row=mysqli_fetch_array($result1))
												{
												if($cid ==1)
												{
													$partid = $row['PART_ID'];
												}
												else
												{
													$pid=$row['PRODUCT_ID'];
												}
												?>
                                                    <div class="col-md-4">
                                                        <div class="product-box__img">
                                                            <img src="imagess/<?php echo $row['IMAGE_PATH']?>" height="200" width="200" alt="product">
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="product-box__content">
                                                            <h3 class="product-box__title"><a href="viewdetails.php?<?php if($cid==1){?>partid=<?php echo $partid; }else{?>productid=<?php echo $pid;}?>&cid=<?php echo $cid?>"><?php if($cid==1){echo $row['PA_NAME']; } else {echo $row['P_NAME'];}?></a></h3>
                                                            
                                                            <div class="product-box__price">
                                                               
                                                                <span class="sale-price">₹<?php echo$row['PRICE']?></span>
                                                            </div>
                                                            
                                                            <div class="product-box__action action-4">
                                                               <a href="viewdetails.php?<?php if($cid==1){?>partid=<?php echo $partid; }else{?>productid=<?php echo $pid;}?>&cid=<?php echo $cid?>" class="add-to-cart" data-toggle="tooltip" data-placement="top" title="View Details"><i class="fa fa-shopping-bag"></i>View Details</a>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
													<?php
													}
													?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Shop Layout End -->
                        </div>
                        <div class="col-lg-3 order-lg-1">
                            <aside class="sidebar">

   
		<!-- Price Filter Widget Start -->
                                <div class="sidebar-widget product-widget product-price-widget">
                                    <h3 class="widget-title">Filter By Price</h3>
                                    <div class="widget_conent">
                                        <form method="post">
                                            <div id="slider-range" class="price-slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                          
                                                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 16.6667%;">    
                                                </span>
                                                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 95.8333%;">
                                                </span>
                                            </div>
                                            <div class="filter-price">
                                                <div class="filter-price__count">
                                                    <div class="filter-price__input-group">
                                                        <span>Price: ₹</span>
                                                        <input type="text" id="amount" name="amount" class="amount-range" readonly="">
                                                    </div>
                                                    <button type="submit" class="sidebar-btn" name="filter">
                                                        filter
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Price Filter Widget End -->

                               
                                
                                
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Main Wrapper End -->

		
<?php include("footer.php"); ?>
        