
<?php 
			$levering = $_POST['titleText']; 
            include('login.php'); 
			
			if ($levering == 'Omg.'){
			$sql = "SELECT DISTINCT Mat FROM Perforerede_Plader WHERE Levering='$levering'
			ORDER BY CASE Mat 
			WHEN 'Stål' THEN '0' 
			WHEN 'Sendz.g.' THEN '1'
			WHEN 'Varmgalv' THEN '2'
			ELSE Mat
			END";
			}
			else {
			$sql = "SELECT DISTINCT Mat FROM Perforerede_Plader 
			ORDER BY CASE Mat 
			WHEN 'Stål' THEN '0' 
			WHEN 'Sendz.g.' THEN '1'
			WHEN 'Varmgalv' THEN '2'
			ELSE Mat
			END"
			;	
			}
			$result = $conn->query($sql);  
    		
			?><div class="alignDiv"><?php
			
    	  	while($row = $result->fetch_assoc()) { 
			
			$filename = "../../uploads/billeder/" . $row['Mat'] . ".png";
			if (file_exists($filename)){ 
			
			?> 
            
            <figure>
           <img src="http://beringpetersen.dk/netto-2017/wp-content/uploads/billeder/<?php echo $row['Mat'] ?>.png"  id="billedeViser1" class="billedeViser" title="<?php echo $row['Mat'] ?>" onclick="Choose(this,'name1.php',1);smoothScroll('moenstervalg')" alt="<?php echo $levering ?>" />
            <figcaption><?php echo $row['Mat'] ?></figcaption>
            </figure>
       		<?php 
			}
			else {
				?>
			<figure>
            <a href="#moenstervalg" class="scrollTo"><img src="http://beringpetersen.dk/netto-2017/wp-content/uploads/billeder/mangler.png"  id="billedeViser1" class="billedeViser" title="<?php echo $row['Mat'] ?>" onclick="Choose(this,'name1.php',1)" alt="<?php echo $levering ?>" /></a>
            <figcaption><?php echo $row['Mat'] ?></figcaption>
            </figure>
			
			<?php
			}
			}
			?>
			</div>
            <script src="http://beringpetersen.dk/netto-2017/wp-content/themes/generatepress-child/scripts/main.js">
			</script>
            
            <script>
			
			</script>
			