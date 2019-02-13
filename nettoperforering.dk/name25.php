<?php 
	$levering = $_POST['altText'];
	$matName = $_POST['titleText'];	//alt tekst fra det klikkede billede
    $matName = explode("-",$matName);
	
		        
			$form = $matName[1];
			$hulstr = $matName[2];
			$delty = $matName[3];
			$del = $matName[4];

			
			include('login.php');
			
			if ($levering == 'Omg.'){
				$sql = "SELECT * FROM Perforerede_Plader WHERE Mat='$matName[0]' AND Form='$form' AND Delty='$delty' AND Hulstr=$hulstr AND Del=$del AND Levering='$levering'";
				}
			else{
			$sql = "SELECT * FROM Perforerede_Plader WHERE Mat='$matName[0]' AND Form='$form' AND Delty='$delty' AND Hulstr=$hulstr AND Del=$del ORDER BY Levering DESC";
			}
			
			$result = $conn->query($sql); 
			?>
            <div id="beforeTableText"><p>Disse plader matcher dit valg</p><p>Vælg pladen du ønsker</p></div>
            <table id="pladeTable">
            	<thead>
            	<tr>
                	<th>Materale</th>
                    <th>Bredde</th>
                    <th>Længde</th>
                    <th>Tykkelse</th>
                    <th class="mobileHide">Hultype</th>
                    <th class="mobileHide">Hulstørrelse</th>
                    <th class="mobileHide">Delingstype</th>
                    <th class="mobileHide">Deling</th>
                    <th class="mobileHide">Luftprocent</th>
                    <th class="tabletHide">Vægt</th>
                    <th>Levering</th>
                </tr>
                </thead>
               <tbody>                     
    		<?php
    	  	while($row = $result->fetch_assoc()) { // for hver unikt materiale laves html nedenunder 
			?>
            	
            	  <tr id="billedeViser5" title="<?php echo $row['ID']; ?>" onclick="Choose(this,'name3.php', '5');smoothScroll('pladeinfo')">
                	<td><?php echo $row['Mat']; ?></td>
                    <td><?php echo $row['Brd']; ?></td>
                    <td><?php echo $row['Lgd']; ?></td>
                    <td><?php echo $row['Tyk']; ?></td>
                    <td class="mobileHide"><?php echo $row['Form']; ?></td>
                    <td class="mobileHide"><?php echo $row['Hulstr']; ?></td>
                    <td class="mobileHide"><?php echo $row['Delty']; ?></td>
                    <td class="mobileHide"><?php echo $row['Del']; ?></td>
                    <td class="mobileHide"><?php echo $row['Luft']; ?></td>
                    <td class="tabletHide"><?php echo $row['Vægt']; ?></td>
                    <td><?php echo $row['Levering']; ?></td>
               </tr>    
         
         
						
			<?php
			}
			
			?> 
            </tbody>
       		</table>
           
           
           <script src="http://beringpetersen.dk/netto-2017/wp-content/themes/generatepress-child/scripts/main.js">
			</script>
            <script>
           