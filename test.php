<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
</head>
<body>
<nav class="navbar navbar-inverse navbar-float-top">
			<div class="container">
				<div class="navbar-header">
					<a href="" class="navbar-brand">3 ACES</a>
				</div>
				<div>
				<ul class = "nav navbar-nav">	
				<li class = "active"><a href = #>home</a></li>	
				<li><a>about us</a></li>
				<li><a>Our Specialities</a></li>
				<li><a>Brands</a></li>	
				</ul>
				<ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
				</div>
			</div>

	</nav>
<?php
$error = $_GET["val"];
	
		$dom = simplexml_load_file("try1.xml");
		//echo '<div id="main" style="position: absolute; top: 100px; left: 120px; height: 100%;">';
		
		echo '<div class = "container">';
		
		echo '<div class = "col-md-3">';
		echo '<strong><b><div style="color:green;font-size:30px;">Categories</div></b></strong>';
		foreach($dom->xpath("/menu/category") as $item)
		{
			echo '<div style = "background-color:lavender">';
			//echo '<div style="float:left">';
			echo '<div class = "row-md-4">';
			
			$item1 = $item["type"]; 
			echo '<div style="color:black">';
			print '<strong><a href="test.php?val='.$item1.'">'.$item["type"].'</strong>';
			print '</a>';
			echo '</br>';
			//echo '</br>';
			echo '</div>';
			echo '</div>';	
			echo '</div>';	
			//echo '</div>';
		}
		echo '</div>';
		//echo '<div class = "container">';
		echo '<div class = "col-md-9">';
		if(isset($error))
		{echo '<strong><b><div style="color:green;font-size:30px;">'.$error.'</div></b></strong>';
		 echo '</br>';
echo '</br>';
			foreach($dom->xpath("/menu/category/item[@id = '$error']") as $item)
			{
				
				//echo '<div class = "row">';
				echo '<div class = "row">';
				//print '<li>';
				echo '<div class = "col-md-4">';
				print $item->name;
				echo '</div>';
				//echo '<div class = "col-md-4">';
				echo '<div class = "col-md-4">';
				print $item->cost;
				echo '</div>';
				echo '<div class = "col-md-4">';
				echo '<a href="cart.php?name='.$item->name.'&cost='.$item->cost.'&id='.$item['no'].'" class="btn btn-warning btn-xs">Add to cart</a>';
				echo '</div>';
				echo '</div>';
				echo '</br>';
				//print '</li>';
			}
		}
		else
		{
			foreach($dom->xpath("/menu/category/item") as $item)
			{
				//echo '<div class = "row">';
				echo '<div class = "row">';
			//print '<li>';
				echo '<div class = "col-md-3">';
				print $item->name;
				echo '</div>';
				//echo '<div class = "col-md-4">';
				echo '<div class = "col-md-3">';
				print $item->cost;
				
				echo '</div>';
				echo '<div class = "col-md-3">';
				print '<input type = "text" style="width: 40px">';
				echo '</div>';
				echo '<div class = "col-md-3">';
				print '<a href="" class="btn btn-warning btn-xs">Add to cart</a>';
				echo '</div>';
				echo '</div>';
				echo '</br>';
				//print '</li>';
			}
		}
		echo '</div>';
		echo '</div>';
		?>
<footer>
		<div class="container">
			<hr>

			<p>
				<small><a href="">Like me</a> On facebook</small></p>
			<p>	<small><a href="">Ask whatever </a> On Twitter</small></p>
			<p>	<small><a href="">Subscribe me</a> On Youtube</small>
				
			</p>
		</div> <!-- end container -->
	</footer>

</body>
</html>
