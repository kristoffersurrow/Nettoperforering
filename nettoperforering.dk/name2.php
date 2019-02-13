
<?php 
	$matName = $_POST['titleText'];	//alt tekst fra det klikkede billede
    $levering = $_POST['altText'];
	$matName = explode("-",$matName);
	
		        
			$form = $matName[1];
			$delty = $matName[2];
			$hulstr = $matName[3];

			
			include('login.php');
			
			if ($levering == 'Omg.'){
				$sql = "SELECT DISTINCT Del FROM Perforerede_Plader WHERE Mat='$matName[0]' AND Form='$form' AND Delty='$delty' AND Hulstr='$hulstr' AND Levering='$levering' ORDER BY Del";
				}
			else{
			$sql = "SELECT DISTINCT Del FROM Perforerede_Plader WHERE Mat='$matName[0]' AND Form='$form' AND Delty='$delty' AND Hulstr='$hulstr' ORDER BY Del";
			}
			
			$result = $conn->query($sql); 
			
			
    
    	  	while($row = $result->fetch_assoc()) { // for hver unikt materiale laves html nedenunder 
			
			$filename = "../../uploads/billeder/". $form . $hulstr . ' ' . $delty . $row['Del'] .".png";
			if (file_exists($filename)){ 
			
			?>
	        <figure>
            <img src="http://beringpetersen.dk/netto-2017/wp-content/uploads/billeder/<?php echo $form . $hulstr . ' ' . $delty . $row['Del']; ?>.png" id="billedeViser4" class="billedeViser" title="<?php echo $matName[0] . '-' . $form. '-' . $hulstr . '-' . $delty . '-' . $row['Del']; ?>" alt="<?php echo $levering;?>" onclick="Choose(this,'name25.php', 4);smoothScroll('pladevalg')"> 
            <figcaption><?php echo $row['Del'] . 'mm'; ?></figcaption>
            </figure>
            
            
         
						
			<?php
			}
			else {
			?>
			<figure>
            <img src="http://beringpetersen.dk/netto-2017/wp-content/uploads/billeder/mangler.png" id="billedeViser4" class="billedeViser" title="<?php echo $matName[0] . '-' . $form. '-' . $hulstr . '-' . $delty . '-' . $row['Del']; ?>" alt="<?php echo $levering;?>" onclick="Choose(this,'name25.php', 4);smoothScroll('pladevalg')">
            <figcaption><?php echo $row['Del'] . 'mm'; ?></figcaption>
            </figure>
			<?php
			}
			}
			?> 
       
       		<script src="http://beringpetersen.dk/netto-2017/wp-content/themes/generatepress-child/scripts/main.js">
			</script>
           