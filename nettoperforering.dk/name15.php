
<?php 
	$levering = $_POST['altText'];
	$matName = $_POST['titleText'];	//alt tekst fra det klikkede billede
    $matName = explode("-",$matName);
	
		        
			$form = $matName[1];
			$delty = $matName[2];

			
			include('login.php');
			
			if ($levering == 'Omg.'){
				$sql = "SELECT DISTINCT Hulstr FROM Perforerede_Plader WHERE Mat='$matName[0]' AND Form='$form' AND Delty='$delty' AND Levering='$levering' ORDER BY Hulstr";
				}
			else{
			$sql = "SELECT DISTINCT Hulstr FROM Perforerede_Plader WHERE Mat='$matName[0]' AND Form='$form' AND Delty='$delty' ORDER BY Hulstr";
			}
			 
			$result = $conn->query($sql); 
			
			
			
    
    	  	while($row = $result->fetch_assoc()) { // for hver unikt materiale laves html nedenunder 
			
			$filename = "../../uploads/billeder/". $form . $row['Hulstr'] . ' ' . $delty .".png";
			if (file_exists($filename)){ 
			
			?>
			
            <figure>
            <img src="http://beringpetersen.dk/netto-2017/wp-content/uploads/billeder/<?php echo $form . $row['Hulstr'] . ' ' . $delty; ?>.png" id="billedeViser3" class="billedeViser" title="<?php echo $matName[0] . '-' . $form . '-' . $delty . '-' . $row['Hulstr'] ; ?>" alt="<?php echo $levering; ?>" onclick="Choose(this,'name2.php', 3);smoothScroll('delingvalg')"> 
            <figcaption><?php echo $row['Hulstr'] . ' mm'; ?></figcaption>
            </figure>
            
            
       
						
			<?php
			}
			else { 
			?>
			<figure>
            <img src="http://beringpetersen.dk/netto-2017/wp-content/uploads/billeder/mangler.png" id="billedeViser3" class="billedeViser" title="<?php echo $matName[0] . '-' . $form . '-' . $delty . '-' . $row['Hulstr'] ; ?>" alt="<?php echo $levering; ?>" onclick="Choose(this,'name2.php', 3);smoothScroll('delingvalg')">
            <figcaption><?php echo $row['Hulstr'] . ' mm'; ?></figcaption>
            </figure>
			<?php
			}
			
			}
			?> 
       
       		<script src="http://beringpetersen.dk/netto-2017/wp-content/themes/generatepress-child/scripts/main.js">
			</script>
          