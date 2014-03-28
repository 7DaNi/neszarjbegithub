<?php
require_once('head.php');
?>
<?php
$dbc = mysqli_connect(host,user,pw,db) or die('Nem sikerült!');
mysqli_query ( $dbc, "SET NAMES utf8" );
$query = "SELECT * FROM termekek WHERE kategoria='pizzák'";
$lekerdezes = mysqli_query($dbc,$query);
$sorokszama = mysqli_num_rows($lekerdezes);
$termekszam=$sorokszama;

		
$dbc = mysqli_connect(host,user,pw,db) or die('Nem sikerült!');
mysqli_query ( $dbc, "SET NAMES utf8" );
$query = "SELECT * FROM termekek WHERE kategoria='pizzák'";
$lekerdezes = mysqli_query($dbc,$query);
echo '<table class="product_list" id = "pizzak_list_1"><tbody><tr>';
$i = 1;

while ( $result = mysqli_fetch_assoc ( $lekerdezes ) ) {

	
	for($k=2;$k<$termekszam;$k++){
		if ($i == 1 || $i == 2 || $i == 3){
	echo '
	 <td style="background-image: url(&#39;' . $result["kep"] . '&#39;)" class="classic_pizza">
	  	 <div class="product_info_panel">
	  	 		<h3>
				' . $result["etelnev"] . '
				</h3>
	     		<p>
				' . $result["leiras"] . '
				</p>
	  			<div class="pizza_size_button">
	   			' . $result["leiras"] . ' CM <b>' . $result["etelnev"] . ' Ft</b>
		 		</div>
		    	<div class="pizza_size_button">
       			' . $result["leiras"] . ' CM <b>' . $result["etelnev"] . ' Ft</b>
       			</div>
	     </div>
    </td>';
	  $k++;}
	  if ($i == 4) {
		echo '</tr><tr>';
		$i = 1;
	} else{
		$i ++;}
	   
	  }	
}
echo '<td></td><td></td>                  </tr></tbody></table>     ';
?>
<?php
require_once('footer.php');
?>