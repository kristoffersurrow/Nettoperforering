

	  	
	// definerer title og alt text som variabler der via AJAX postes til et php site, og resultatet modtages
	function Choose(element, site, i) {		
	
	 var title = '';
	 var alt = '';
	 var returnData = '';
	 
	 title = $(element).attr('title');
	 
	 alt = $(element).attr('alt'); 
	
	
	    $.ajax({
        	type: "POST",
        	url: "http://beringpetersen.dk/netto-2017/wp-content/themes/generatepress-child/"+site,
        	data:{ altText: alt, titleText : title },
			success: function(data){
			returnData = data;
			$('.viser'+i).html(returnData);
			}
    	})
		 
		$('.viser'+i).addClass('open');
		$('.vaelger'+i).addClass('active');
		$('.arrow-down'+i).addClass('opacity');	
		
		//Alle visere 2 fremme deaktiveres hvis der klikkes på en forrig viser
		var j = i;
		while( j < 5 ) {
			j++;
			
			$('.viser'+j).removeClass('open');
			$('.vaelger'+j).removeClass('active');
			$('.arrow-down'+j).removeClass('opacity');
		
		
		}
		
		//blå border toggle på buttons
		if ($(element).is('button')){					
		$(element).addClass('selected').siblings().removeClass('selected');	
		}
		else if ($(element).is('tr')){
		$(element).addClass('selected').siblings().removeClass('selected');
		}
		
		//blå border toggle på DOM siblings billeder
		else {											
		$(element).addClass('selected').parent().siblings().find('img').removeClass('selected');
		
		}
	
	}
	
	//glidende scrolling
	function smoothScroll(ID) {

	$('html, body').animate({
        	scrollTop: $('#'+ID).offset().top
      		}, 800)
	  		}

	
	//form validation
	
	function formValidation(e) {
		$('#form').submit(function(e){
		e.preventDefault();
		
		error_username = false;
		error_phone = false;
		error_email = false;
											
		check_username();
		check_phone();
		check_email();
		
		if(error_username == false && error_phone == false && error_email == false) {
			
		
		var details = $('#form').serialize();
		$.post('http://beringpetersen.dk/netto-2017/wp-content/themes/generatepress-child/formValidation.php', details ,function(data) {
			$('#entry-content').html(data)
		})	
		return true;
		
		}
		
		else {
			return false;	
		}
		
		})
		
			
		$("#username_error_message").hide();
		$("#phone_error_message").hide();
		$("#email_error_message").hide();

		var error_username = false;
		var error_phone = false;
		var error_email = false;

		$("#fullName").focusout(function() {

			check_username();
			
		});

		$("#phone").focusout(function() {

			check_phone();
			
		});


		$("#email").focusout(function() {

			check_email();
			
		});

		function check_username() {
		
			var username_length = $("#fullName").val().length;
			
			if(username_length < 2) {
				$("#username_error_message").html("Skal være udfyldt");
				$("#username_error_message").show();      
				error_username = true;
			} else {
				$("#username_error_message").hide();
		
			}
		
		}

		function check_phone() {
		
			var phone_length = $("#phone").val().length;
			var phone_numeric = $.isNumeric( $('#phone').val());
			
			if((phone_length != 8) || (!phone_numeric)) {
				$("#phone_error_message").html("Skal være 8 tal");
				$("#phone_error_message").show();
				error_phone = true;
			} else {
				$("#phone_error_message").hide();
				
			}
		
		}


		function check_email() {

			var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
		
			if(pattern.test($("#email").val())) {
				$("#email_error_message").hide();
			} else {
				$("#email_error_message").html("Ugyldig email");
				$("#email_error_message").show();
				error_email = true;
			}
		
		}
	}

 	//luftprocentberegner på siden perfplader.html
	function hideDiv(){
		var formValue = document.getElementById('selectForm').value;
		var overskrift = document.getElementById('beregnerOverskrift');
		var beregner = document.getElementById('beregner');
		
		if((formValue == 'RT') || (formValue =='RR') || (formValue =='FR')) {
		
			beregner.style.display = 'block';
		
			switch (formValue) {
			case 'RT': overskrift.innerHTML = '<span>Runde Huller Triangulær Deling</span>'; break;
			case 'RR': overskrift.innerHTML = '<span>Runde Huller Kvadratisk Deling</span>'; break;
			case 'FR': overskrift.innerHTML = '<span>Firkantede Huller Kvadratisk Deling</span>'; break;
			default: overskrift.innerHTML = ''; 		
			}
		}
		else {
			beregner.style.display = 'none';
		}
	}
	
	
	
	//luftprocentberegner på siden perfplader.html
	function calculate() {
		
		var formValue = document.getElementById('selectForm').value;
		var a = document.getElementById('hulstoerrelse').value;
		var b = document.getElementById('deling').value;
		var c = document.getElementById('luftprocent');
		
		
		switch (formValue) {		
		case 'RT':
		c.value = (parseInt(a)*parseInt(a)*90)/(parseInt(b)*parseInt(b)); break;
		
		case 'RR':
		c.value = (parseInt(a)*parseInt(a)*79)/(parseInt(b)*parseInt(b)); break;
		
		case 'FR':
		c.value = (parseInt(a)*parseInt(a)*100)/(parseInt(b)*parseInt(b)); break;
		
		}
		
	}