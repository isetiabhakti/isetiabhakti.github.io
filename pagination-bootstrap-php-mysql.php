<?
$title = 'Pagination Wallpaper Naruto';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tugas-kuliah";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$n = 9;
$p = isset($_GET["p"]) ? (int)$_GET["p"] : 1;

$result = mysqli_query($conn,"SELECT * FROM gambar");
$total = mysqli_num_rows($result);
$pages = ceil($total/$n);    
        
$m = ($p>1) ? ($p * $n) - $n : 0;


$sql = "SELECT * FROM gambar LIMIT $m,$n";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><? echo $title; ?> | Sheva</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>

  <body>
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#"><? echo $title; ?></a>
    </nav>
    <main>
      <div class="jumbotron p-4 m-4" style="font-size:24px"><center>
		<?
		// $row = $result->fetch_assoc();
		// print_r($row);die();
		$i=1;
		
		while($row = $result->fetch_assoc()) {
			$br = $i%3;
			if($br==1){echo "\n".'<div class="row">';}
			
			echo "\n\t<div class='col-md-4 pt-3'>\n
			<a href='view?img=".	$row['img']	."'>
			<img class='img-fluid w-100' src='"	.	$row['thumb']	.	"'/>
			</a>"	.	
			"\n\t</div>\n";
			
			if($br==0){echo '</div>'."\n\n";}
			$i++;
		}
								
		?>
		<hr/>
		
		
		
<nav aria-label="...">
  <ul class="pagination justify-content-center pagination-lg">
<? 
for ($i=1; $i<=$pages ; $i++){
	if($p==$i){
	  echo '<li class="page-item active">
	  <a class="page-link" href="?p='. $i .'">'.$i.'</a>
	  </li>';
	}else{
	  echo '<li class="page-item">
	  <a class="page-link" href="?p='. $i .'">'.$i.'</a>
	  </li>';
	}
}
?>
  </ul>
</nav>
		

      </center></div>
    <footer class="container-fluid">
        <p class="text-muted">&copy; Sheva Setia.</p>
    </footer> 
    </main>
  </body>
</html>
