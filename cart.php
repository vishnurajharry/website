<?php
session_start();
?>
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
<h1>Your Shopping Cart</h1>
<?php
//$check = -1;
$check = $_POST["row-delete"];
//if(isset($check))
//$k++;
if(empty($_SESSION["food"]))
{
	$_SESSION["food"] = array();
}
$id = $_GET["id"];
$name = $_GET["name"]; 
$price = $_GET["cost"]; 
array_push($_SESSION['food'], array("id" => $id, "name" => $name,"price" => $price));
$max = count($_SESSION['food']);
print $max;
$i=0;
$f=0;
echo '<table class="table">';
   echo '<caption>shopping cart</caption>';
   echo '<thead>';
      echo '<tr>';
         echo '<th>item</th>';
         echo '<th>price</th>';
      echo '</tr>';
   echo '</thead>';
echo '<tbody>';
//$_SESSION['food'][$i]['name']
//echo '<div class = "container">';

      /*if($i==$check)
      {
      unset($_SESSION["food"][$i]);
      print $i;
      $i++;
      $max--;
      continue;
      }*/
      if(isset($check)&&$check!="")
{
if(count($_SESSION["food"])<=1)
{
unset($_SESSION["food"]);
session_destroy();
header("Location: http://localhost/html/test.php");
exit;
}
else
{
print $check;
unset($_SESSION["food"]["$check"]);
sort($_SESSION["food"]);
}
}
      foreach ( $_SESSION["food"] as $subarray ) 
{
  //beginning of the loop where you do things with your array
//if(isset($check))
//{
  //if ( $subarray["name"] == $check ) 
//{
//print 'hello';
//unset($_SESSION["food"][$i]);
//continue;
//}
//}
if($subarray["name"]==""&&$subarray["price"]=="")
{
$f=1;
$i++;
continue;
}
  //iterate your stuff
      echo '<tr>';
         echo '<td>';
	 print $subarray["name"];
	 echo '</td>';
         echo '<td>';
	 print $subarray["price"];
	 echo '</td>';
	 echo '<td>';

	 print '<form action = "cart.php" method = "POST"><input name = "deletebtn'.$id.'" type = "submit" value = "X"/><input name = "row-delete" type = "hidden" value="' . $i . '"/></form>';
	 echo '</td>';
      echo '</tr>';
$f=0;
$i++;
      //$i++;
//else
//{
//unset($_SESSION["food"][$i]);
//$i++;
//$max--;
//}
}
if($f==1)
print 'Your Cart is empty';
/*else
{
foreach ( $_SESSION["food"] as $subarray ) {

  //beginning of the loop where you do things with your array
 // if ( $subarray->$id == '$check' ) continue;
  //iterate your stuff
      echo '<tr>';
         echo '<td>';
	 print $subarray["name"];
	 echo '</td>';
         echo '<td>';
	 print $subarray["price"];
	 echo '</td>';
	 echo '<td>';
	 print '<a href="cart.php?action='.$_SESSION["food"][$i]["name"].'" class="btn btn-warning btn-xs">Delete the item</a>';
	 echo '</td>';
      echo '</tr>';
$i++;
}
}*/
echo '</tbody>';
//print_r($_SESSION["food"]);
//foreach ($_SESSION["food"] as $key => $value) {
  //  echo "Key: $key; Value: $value[0]\n";
//}

//array_push($_SESSION["food"][$id],$_GET['cost'],$_GET['name']);
//echo '<a href = "display_cart.php?id='.$id.'">';
//echo 'displaycart';
//echo '</a>';
//session_destroy();
?>
</body>
</html>
