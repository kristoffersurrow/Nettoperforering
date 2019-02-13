
<?php

	     	
			
			if	(($_POST['fullName'] == '') ||			//tjekker om felter er udfyldt
        		($_POST['email'] == '') ||
        		($_POST['phone'] == ''))
				 {
        		die('<p>Du mangler noget i din indtastning</p>
				<p>Vælg varen igen ovenfor, eller ring på <a href:"tel:70221333">70221333</a></p>');       
    			}
				
			elseif (($_POST['email'] != '' ) &&
        		($_POST['phone'] != '') &&
				($_POST['fullName'] != '')
				){
				
          
		  //definerer posts
		  $name = $_POST["fullName"];			
		  $firma = $_POST["company"];
		  $email = $_POST["email"];
		  $phone = $_POST["phone"];
		  $antalvarer = $_POST["numberOfItems"];
		  $comments = $_POST["comments"];
		  $varenr = $_POST["varenummer"];
		  $materiale = $_POST["materiale"];
		  $bredde = $_POST["bredde"];
		  $laengde = $_POST["laengde"];
		  $tykkelse = $_POST["tykkelse"];
		  $hultype = $_POST["hultype"];
		  $hulstr = $_POST["hulstr"];
		  $delingstype = $_POST["delingstype"];
		  $delingsstr = $_POST["delingsstr"];
		  $luftprocent = $_POST["luftprocent"];
		  
		  include('login.php');
    
		  //Indsætter værdier i tabel
		  $sql = "INSERT INTO Formular (Tid, Navn, Firma, Email, Telefon, Kommentarer, Varenummer, Materiale, Laengde, Bredde, Tykkelse, Hulstorrelse, Delingstype, Delingsstorrelse, Luftprocent, Antal)
		  VALUES ( CURRENT_TIMESTAMP, '$name', '$firma', '$email', '$phone', '$comments', '$varenr', '$materiale', '$laengde', '$bredde', '$tykkelse', '$hulstr', '$delingstype', '$delingsstr', '$luftprocent', '$antalvarer')";
		  
		  
		  //Tjekker om data indsættes
		  if ($conn->query($sql) == TRUE) {
      
	  	

    		$email_subject = "Ny indtastning i form"; //indgående mail

    		$email_body = "Ny indtastning i hjemmesideformularen \n 
			Navn : $name\n
			Firma : $firma  \n
			Email : $email  \n
			Telefon : $phone  \n
			Kommentarer : $comments  \n
			Varenummer : $varenr \n
			Filnavn : $filename  \n
			Materiale : $materiale \n
			Længde X Bredde : $laengde X $bredde \n
			Tykkelse : $tykkelse \n
			Hulstørrelse : $hulstr \n
			Delingstype : $delingstype \n
			Delingsstørrelse : $delingsstr \n
			Luftprocent : $luftprocent \n
			Antal : $antalvarer ";
			
			mail("michael@nettoperforering.dk",$email_subject,$email_body, "From: website@nettoperforering.dk");


			//udgående mail
			$email_subject2 = "Tak for din indtastning";		

    		$email_body2 = "
			<html>
			<head>
			<title>Tak for din indtastning</title>
			</head>
			<body>
			<p>Her er en oversigt over din indtastning</p>
			<table>
			<tr><td>Navn:</td> <td>$name</td></tr>
			<tr><td>Firma:</td> <td>$firma</td></tr>
			<tr><td>Email:</td> <td>$email</td></tr>
			<tr><td>Telefon:</td> <td>$phone</td></tr>
			<tr><td>Kommentar:</td> <td>$comments</td></tr>
			<tr><td>Varenummer:</td> <td>$varenr</td></tr>
			<tr><td>Materiale:</td> <td>$materiale</td></tr>
			<tr><td>Længde x Bredde:</td> <td>$laengde x $bredde</td></tr>
			<tr><td>Tykkelse:</td> <td>$tykkelse</td></tr>
			<tr><td>Hulstørrelse:</td> <td>$hulstr</td></tr>
			<tr><td>Hultype:</td> <td>$hultype</td></tr>
			<tr><td>Delingstype:</td> <td>$delingstype</td></tr>
			<tr><td>Deling:</td> <td>$delingsstr</td></tr>
			<tr><td>Luftprocent:</td> <td>$luftprocent</td></tr>
			<tr><td>Antal:</td> <td>$antalvarer</td></tr>
			</table>
			</body>
			</html>";
			
			mail($email,$email_subject2,$email_body2, "From: salg@nettoperforering.dk" . "\r\n" . 'MIME-Version: 1.0'. 'Content-type: text/html; charset=iso-8859-1');              


			echo '<div id="resultdiv"><br/><br/>Din indtastning er modtaget <br/> Vi vil kontakte dig snarest!</div>';
	  
	  
	  
		  }
		  }
		  else { 'Error: '. $conn->error; /*echo '<p>Der gik noget galt</p> <p>Prøv igen senere, eller ring på <a href:"tel:70221333">70221333</a></p>';*/}
		  
		  ?>