
<?php 
	$matName = $_POST['titleText'];	//alt tekst fra det klikkede billede
    $levering = $_POST['altText'];        
			include('login.php'); 
			
			if ($levering == 'Omg.'){
			$sql = "SELECT DISTINCT Form, Delty FROM Perforerede_Plader WHERE Mat='$matName' AND Levering='$levering'";
			}
			else {
			$sql = "SELECT DISTINCT Form, Delty FROM Perforerede_Plader WHERE Mat='$matName'";	
			}
			$result = $conn->query($sql);  
    
    	  	while($row = $result->fetch_assoc()) {
			
			$filename = "../../uploads/billeder/" . $row['Form'] . $row['Delty'] . ".png";
			if (file_exists($filename)){ 
			
			?>
			<figure>
            <img src="http://beringpetersen.dk/netto-2017/wp-content/uploads/billeder/<?php echo $row['Form'] . $row['Delty'] ?>.png" id="billedeViser2" class="billedeViser" title="<?php echo $matName . '-' . $row['Form'] . '-' . $row['Delty']?>" onclick="Choose(this,'name15.php', 2);smoothScroll('stoerrelsevalg')" alt="<?php echo $levering;?>" />	
            <figcaption><?php echo $row['Form'] . $row['Delty'] ?></figcaption>
            </figure>
			
       	
			<?php
			}
			else { ?>
			<figure>
            <img src="http://beringpetersen.dk/netto-2017/wp-content/uploads/billeder/mangler.png" id="billedeViser2" class="billedeViser" title="<?php echo $matName . '-' . $row['Form'] . '-' . $row['Delty']?>" onclick="Choose(this,'name15.php', 2);smoothScroll('stoerrelsevalg')" alt="<?php echo $levering;?>" />	
            <figcaption><?php echo $row['Form'] . $row['Delty'] ?></figcaption>
            </figure>
			<?php
			}
			}
			?> 
       		
            <script src="http://beringpetersen.dk/netto-2017/wp-content/themes/generatepress-child/scripts/main.js">
			</script>
           