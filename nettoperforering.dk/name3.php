            <?php				//Henter ID fra URL
        	
   		
		
		$id = $_POST['titleText'];		//alt tekst fra det klikkede billede
		 
			
          	include('login.php');
			
          $sql = "SELECT * FROM Perforerede_Plader WHERE ID = $id";	//vælge alle kolonner og én specifik række
          $result = $conn->query($sql);
          if ($result->num_rows > 0) 
    
    	while($row = $result->fetch_assoc()) {
	
		$form = $row['Form'];
		if ($row['Hulstr'] == "Kløver")		
		{$hulstr = "Kløver";}
		else {
		$hulstr = $row['Hulstr'];}
		$delty = $row['Delty'];
		$del = $row['Del'];
		$varenr = $row['Varenr'];
		$materiale = $row['Mat'];
		$bredde = $row['Brd'];
		$laengde = $row['Lgd'];
		$tykkelse = $row['Tyk'];
		$luft = $row['Luft'];
		$vaegt = $row['Vægt'];
		$leveringstid = $row['Levering'];
		
		//if (substr($hulstr,-2) == '00')
		//{ $hulstr = substr_replace($hulstr,"",-1);}
		
		
		//if (substr($del,-2) == '00')
		//{ $del = substr_replace($del,"",-1);}
		
		$filename = $form . $hulstr . " " . $delty . $del;
		}
		
		$filename = str_replace('.',',',$filename);
		$filename .= ".pdf";
		
		$filename2 = "../../../wp-content/uploads/moenster/".$filename;
		$filename3 = "../../../wp-content/uploads/billeder/".$form . $hulstr . ' ' . $delty . $del;
		$filename4 = "../../../wp-content/uploads/billeder/mangler.png";
	
			
			
           ?> 
           <div id="pdfdiv"  class="contentdiv">
           
		   
		   <?php 
		   if (file_exists($filename2)) {echo '<a href="'.$filename2.'" target="_blank"><img src="http://beringpetersen.dk/netto-2017/wp-content/uploads/billeder/View-PDF-button.png" alt="View PDF" /></a>'; }
		   else {?>
			
            <script> var div = document.getElementById('pdfdiv');
            		div.style.display = 'none';
            </script>
            
            <?php   
			}
		   ?>
			
            </div>
            
            <div id="entry-content">
            <div id="leftdiv" class="contentdiv" >
			<div id="infodiv">
            <table class="infotable">
            <th colspan="2">Plade</th>
            <tr>
            <td>Materiale:</td><td><?php echo $materiale; ?></td>
            </tr>
            <tr>
            <td>Pladebredde:</td><td><?php echo $bredde . " mm"; ?></td>
            </tr>
            <tr>
            <td>Pladelængde:</td><td><?php echo $laengde . " mm"; ?></td>
            </tr>
            <tr>
            <td>Pladetykkelse:</td><td><?php echo $tykkelse . " mm"; ?></td>
            </tr>
            <tr>
            <td>Vægt:</td><td><?php echo $vaegt . " kg"; ?></td>
            </tr>
            </table>
            
            <table class="infotable">
            <th colspan="2">Perforering</th>
            <tr>
            <td>Hultype:</td><td><?php 
			switch ($form) {
				
				case "R": echo "Runde"; break;
				case "C": echo "Firkantede"; break;
				case "LR": echo "Aflange"; break;
				case "Lv": echo "Rektangulære"; break;
				case "H": echo "Hexagonale"; break;	
				
				default: echo $form;
				}
					
			?></td>
            </tr>
            <tr>
            <td>Hulstørrelse:</td><td><?php 
			if ($hulstr == "Kløver")
				{echo $hulstr;}
			else { echo $hulstr . " mm";} ?></td>
            </tr>
            <tr>
            <td>Delingstype:</td><td><?php switch ($delty){
				case "T": echo "Triangulær"; break;
				case "U": echo "Kvadratisk"; break;
				case "Z": echo "Forsatte"; break;
				case "KZ": echo "Mønster"; break;
				case "M": echo "Mønster"; break;
				
				default: $delty;
				
				} 
			
			
			?></td>
            </tr>
            <tr>
            <td>Delingsstørrelse:</td><td><?php echo $del . " mm"; ?></td>
            </tr>
            <tr>
            <td>Luftprocent:</td><td><?php echo $luft . " %"; ?></td>
            </tr>
            </table>
            <table class="infotable">
            <th colspan="2">Levering</th>
            <tr>
            <td>Leveringstid:</td><td> <?php if ($leveringstid == "Omg.") 
												{echo "Omgående";}
											 else { echo $leveringstid ;} ?> 
            </td>
            </tr>
            </table>
            </div>
            </div>
            <div id="rightdiv" class="contentdiv" >
            <div id="formdiv">
            <?php 
		
		
		  	
			 echo '
			 
            <form id="form" action="formValidation.php" method="post">
            <table>
            <th colspan="2"> Send mig venligst en pris vedr. denne vare </th>
            
			<tr>
            <td><label for="fullName">Navn:<span class="error_form">*</span></label></td><td><input class="text" type="text" id="fullName" name="fullName" />
			<span class="error_form" id="username_error_message"></span></td>
            </tr>
			
            <tr>
            <td><label for="company">Firma:</label></td><td><input class="text" type="text" id="company" name="company" /></td>
            </tr>
			
			<tr>
            <td><label for="email">Email:<span class="error_form">*</span></label></td><td><input class="text" type="text" id="email" name="email" />
					
			<span class="error_form" id="email_error_message"></span></td>
            </tr>
			
			<tr>
            <td><label for="phone">Telefonnr.<span class="error_form">*</span></label></td><td><input class="text" type="text" id="phone" name="phone" />
			<span class="error_form" id="phone_error_message"></span></td>
            </tr>
			
			<tr>
            <td><label for="numberOfItems">Antal Plader:</label></td><td><input class="text" type="number" min="0" id="numberOfItems" name="numberOfItems" />
			</td>
            </tr>
            
			<tr>
            <td><label for="comments">Kommentar:</label></td><td rowspan="2"  id="textarea"><textarea name="comments" id="comments" cols="20" rows="4"></textarea>	 			
			</td>
            </tr>
            
			<tr><td><input id="submit" type="submit" name="submit" value="Send" /></td></tr>
            </table>
            
            
            <input type="hidden" name="varenummer" value="'.$varenr.'" />
            <input type="hidden" name="materiale" value="'.$materiale.'" />
            <input type="hidden" name="bredde" value="'.$bredde.'" />
            <input type="hidden" name="laengde" value="'.$laengde.'" />
            <input type="hidden" name="tykkelse" value="'.$tykkelse.'" />
            <input type="hidden" name="hultype" value="'.$form.'" />
            <input type="hidden" name="hulstr" value="'.$hulstr.'" />
            <input type="hidden" name="delingstype" value="'.$delty.'" />
            <input type="hidden" name="delingsstr" value="'.$del.'" />
            <input type="hidden" name="luftprocent" value="'.$luft.'" />
			<input type="hidden" name="leveringstid" value="'.$leveringstid.'"/>
            
            </form>
           '; 
		   $conn->close();
		   ?>
            </div>
          	</div>
            </div>



	<script src="https://code.jquery.com/jquery-3.2.1.min.js"> </script>
	<script src="http://beringpetersen.dk/netto-2017/wp-content/themes/generatepress-child/scripts/main.js"></script>
    
	<script>
	
	formValidation();

	</script>

