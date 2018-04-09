<?php
	session_start();
	include("config.php");
	include("includes/db.php");
	include("includes/functions.php");
?>

<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<title>Gravity Online Store</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/global.css">
 	<link rel="stylesheet" href="http://vmj.gr/c/miltos.min.css" />
 	<link rel="stylesheet" href="http://vmj.gr/c/jquery.mobile.structure-1.2.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>

<script>	 
	 // Global declarations - assignments made in $(document).ready() below
   	var hdrMainvar = null;
    	var contentMainVar = null;
    	var ftrMainVar = null;
    	var contentTransitionVar = null;
	var contentDialogVar = null;
	var hdrConfirmationVar = null; 
    	var contentConfirmationVar = null;
    	var ftrConfirmationVar = null;
	var inputMapVar = null;	//We also define inputMapVar as a collection consisting of all input elements with _r in 			                              their name attribute (The function call $('input[name*="_r"]') selects all such elements).
	var form1var = null;
	var confirmationVar = null;       
    
    	// Constants
    	var MISSING = "missing";
    	var EMPTY = "";
    	var NO_STATE = "ZZ";
</script>
</head> 
<body> 

	<div data-role="page" id="EmailUs" data-theme="a">  
    
    		<!-- ====== main content starts here ===== -->  
  		<div data-role="header" id="hdrMain" name="hdrMain" style="padding-top:5px; border-bottom: 4px solid rgb(245, 240, 240);">
        		<a href="Gravity.php" rel="external" data-icon="home" data-iconpos="notext">Home</a>
            		<a href="#" data-role=”button” data-icon="back" data-rel="back" data-iconpos="notext" >Back</a>
			<h1>Email</h1>
        	</div>  
  		
  		<div data-role="content" id="contentMain" name="contentMain">  
    		
            		<h2 style= "font-size: 23px; border-bottom-style: groove; border-width: 4px;">Email</h2>
            		<!--<p>Please complete the form below and click the submit button at the bottom.
               			We will reply as soon as possible.
            		</p>-->
            
            		<form id="form1" method="post" action="mail.php" style="padding-top: 10px;" data-ajax="false">
            			<fieldset>
	            			<div id="nameDiv" data-role="fieldcontain" >
	            				<label for="name" id="nameLabel" name="nameLabel">Το όνομά σας (απαραίτητο):</label>
	    					<input type="text" data-theme="c" name="your-name_r" id="name" value="" size="40" />			           
	            			</div>
	            
					<div id="emailDiv" data-role="fieldcontain" >
	            				<label for="Email">Το e-mail σας (απαραίτητο):</label>
	    					<input type="email" data-theme="c" name="your-email_r" id="Email" value="" size="40" />			           
	            			</div>
	
					<div id="subjectDiv" data-role="fieldcontain" >
	            				<label for="subject">Θέμα :</label>
	    					<input type="text" data-theme="c" name="your-subject" id="subject" value="" size="60" />			           
	            			</div>
	
					<div id="messageDiv" data-role="fieldcontain" >
	            				<label for="message">Το μύνημά σας :</label>
	    					<textarea name="your-message" id="message" cols="40" rows="8" data-theme="c">
	            				</textarea>		           
	            			</div>  
	              
					<div id="submitDiv" align="right">
	            				<input type="submit" value="Αποστολή" data-inline="true"/>			            
	            			</div>
	            		</fieldset>
			</form>  
  		</div>  
  		
  		<div data-role="footer" id="ftrMain" name="ftrMain" data-position="fixed" style = "border-top: 4px solid rgb(245, 240, 240);">
        	</div>  
  		<!-- ====== main content ends here ===== --> 
     
     
  		<!-- ====== dialog content starts here ===== -->  
  		<div align="CENTER" data-role="content" id="contentDialog" name="contentDialog">  
    			<div>Παρακαλούμε συμπληρώστε τα απαραίτητα στοιχεία για να υποβάλλεται την φόρμα.</div>
	 		<a id="buttonOK" name="buttonOK" href="#page1" data-role="button" data-inline="true" data-corners="false">OK</a>  
  		</div>  
  		<!-- ====== dialog content ends here ===== -->  
  
  
  		<!-- ====== transition content page starts here.is displayed after the form is submitted until a response is received back. ===== -->  
  		<div data-role="content" id="contentTransition" name="contentTransition">  
    			<div align="CENTER"><h4>Το αίτημά σας έχει σταλεί. Παρακαλώ περιμένετε.</h4></div>
	 		<div align="CENTER"><img id="spin" name="spin" src="images/wait.gif"/></div>  
  		</div>  
  		<!-- ====== transition content ends here ===== -->  
  
  
  		<!-- ====== confirmation content starts here ===== -->  
  		<div data-role="header"  id="hdrConfirmation" name="hdrConfirmation" data-nobackbtn="true">
        		<h1>Το αίτημα δημιουργήθηκε.</h1>
        	</div>  
  			
  		<div data-role="content" id="contentConfirmation" name="contentConfirmation" align="center">  
    			<p>A new claim has been created based on data you have submitted.</p> 
    			<p>Your confirmation number is: <span id="confirmation" name="confirmation"></span>  </p>  
  		</div>  
  		<div data-role="footer" id="ftrConfirmation" name="ftrConfirmation">
        	</div>  
  		<!-- ====== confirmation content ends here ===== -->  
	
    
    		<script>
	 
			$(document).ready(function() 
			{			/*$('#EmailUs').live('pageinit',function(event) {*/														
			// Assign global variables
		      		hdrMainVar = $('#hdrMain');
		      		contentMainVar = $('#contentMain');
		      		ftrMainVar = $('#ftrMain');
		      		contentTransitionVar = $('#contentTransition');
			  	contentDialogVar = $('#contentDialog');
			  	hdrConfirmationVar = $('#hdrConfirmation');
		      		contentConfirmationVar = $('#contentConfirmation');
		      		ftrConfirmationVar = $('#ftrConfirmation');
			  	inputMapVar = $('input[name*="_r"]');
			  	form1Var = $('#form1');
			  	confirmationVar = $('#confirmation');
			  
			  	hideContentDialog();	//When the page is loaded, only the main content should be displayed. For this reason, other content pages are hidden
		      		hideContentTransition(); //When the page is loaded, only the main content should be displayed. For this reason, other content pages are hidden
		      		hideConfirmation();	//When the page is loaded, only the main content should be displayed. For this reason, other content pages are hidden

           
    			});


//---------------------------------------------------------------------------------------------------------------	
			$('#buttonOK').click(function() {
		      		hideContentDialog();
		      		showMain();
		      		return false;      
    			});
		
	
//----------------------------------------------------------------------------------------------------------------	
//Below is the event handler for form submission. In typical jQuery notation, the identifier for form1 is passed to the jQuery object call to handle the submit event	
	
			$('#form1').submit(function() 					//$('#form1').click(function(event) 
			{
        			var err = false;		//We set an error flag to false
        
        			hideMain();				//and hide the Main content that contains the Form
        
        			// Reset the previously highlighted form elements on each member of the collection inputMapVar              
        			inputMapVar.each(function(index)
        			{              
          				$(this).prev().removeClass(MISSING); 
        			});
        
        			// Perform form validation
        			inputMapVar.each(function(index)
        			{  
        				if($(this).val()==null || $(this).val()==EMPTY)
        				{  
            					$(this).prev().addClass(MISSING);            
            					err = true;		//In addition, the error flag is set to true and the error dialog is shown
          				}          
        			});   
        
        			// If validation fails, show Dialog content
        			if(err == true)
        			{            
          				showContentDialog();
          				return false;
        			}        
        
        			// If validation passes, show Transition content
        			showContentTransition();
        
        			// Submit the form
        			$.post("/forms/requestProcessor.php", form1Var.serialize(), function(data)
        			{
          				confirmationVar.text(data);
          				hideContentTransition();
          				showConfirmation();
        			});        
        		return false;      
    			}); 
	
//-----------------------------------------Hide And Display Elements----------------------------------------------
	//hiding the Main content and its header/footer
	function hideMain(){
    	hdrMainVar.hide();
    	contentMainVar.hide();
    	ftrMainVar.hide();   
   	}
   	
	//displaying the Main content and its header/footer
  	function showMain(){
    	hdrMainVar.show();
    	contentMainVar.show();
    	ftrMainVar.show();
   	}
	
	//hiding the transition content
	function hideContentTransition(){
    	contentTransitionVar.hide();
   	}      
   	
	//displaying the transition content
   	function showContentTransition(){
    	contentTransitionVar.show();
   	}
	
	//hiding the Dialog content
	function hideContentDialog(){
    	contentDialogVar.hide();
   	}   
   
   	//displaying the Dialog content
   	function showContentDialog(){
    	contentDialogVar.show();
   	}
	
	//hiding the confirmation content and its header/footer
	function hideConfirmation(){
    	hdrConfirmationVar.hide();
    	contentConfirmationVar.hide();
    	ftrConfirmationVar.hide();
   	}  
   	
	//displaying the confirmation content and its header/footer
   	function showConfirmation(){
    	hdrConfirmationVar.show();
    	contentConfirmationVar.show();
    	ftrConfirmationVar.show();
   	}
	
	</script> 
	</div><!-- End of page1 --> 

</body>
</html>