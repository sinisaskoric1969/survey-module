<? ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Emre Hotels - Guest Survey</title>

		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="scripts/jquery/jquery.easing.1.3.min.js"></script>

		<link type="text/css" href="scripts/datepicker/css/ui-lightness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />		
		<script type="text/javascript" src="scripts/datepicker/jquery-ui-1.8.18.custom.min.js"></script>			

		<link href="style/stylesheet.css" rel="stylesheet" type="text/css" />
		<script language="JavaScript" src="scripts/formvalidation/gen_validatorv31.js" type="text/javascript"></script>
		
    <link rel="stylesheet" type="text/css" href="scripts/creativetable/style/creative.css">
    <script type="text/javascript" src="scripts/creativetable/creative_table_ajax-1.3.min.js"></script>		
		
		<script type="text/javascript" src="scripts/slidingtabs/jquery.slidingtabs.pack.js"></script>	
  	<link rel="stylesheet" type="text/css" href="scripts/slidingtabs/slidingtabs-horizontal.css" />	
		<script type="text/javascript">
    	
// START slidingtabs
$(document).ready(function() {
	$('div#report').slideTabs({			
		contentAnim: 'slideH',
		contentEasing: 'easeInOutExpo',
		tabsAnimTime: 300,
		contentAnimTime: 600,
		autoHeight: true
	});		  		  			
});		
// END slidingtabs

// START datepicker	
$(function() {
	
	$(".datepicker").datepicker({
		showButtonPanel: true, closeText: 'Clear',
	});
	$.datepicker._generateHTML_Old = $.datepicker._generateHTML; $.datepicker._generateHTML = function(inst) {
		res = this._generateHTML_Old(inst); res = res.replace("_hideDatepicker()","_clearDate('#"+inst.id+"')"); return res;
	} 
	
	var currentTime = new Date(),
	// cache your selection already
	$dateFields = $('#report1from, #report1to, #report2from1, #report2to1, #report2from2, #report2to2');

  // set all fields to readonly
  $dateFields.attr('readonly', 'readonly');

  // the options are the same for all instances
	var options = {
     showButtonPanel: true,
     changeMonth: true,
     changeYear: true,
     numberOfMonths: 1,
     closeText : "Reset",
     minDate: new Date(2010, 1 - 1, 1),
     maxDate: new Date(currentTime.getFullYear(), 11, 31),
     dateFormat: "yy-mm-dd",
     // set the date on open so the populated date is selected in the widget
     beforeShow: function(input, instance) {
			$(input).datepicker('setDate', $(input).val());
     }
  };
  
  // instanciate datepicker with the options for all the fields
  $dateFields.datepicker(options);  

  // apply separately the option 'altField' accordingly
  $('#report1from').datepicker('option', 'altField', '#report1to');    
  $('#report2from1').datepicker('option', 'altField', '#report2to1');
  $('#report2from2').datepicker('option', 'altField', '#report2to2'); 
  

	$('#addsurvey').attr('readonly','readonly');
	$( "#addsurvey" ).datepicker({
		changeMonth: true,
		numberOfMonths: 1,
  	dateFormat: "yy-mm-dd",    
  	minDate: new Date(currentTime.getFullYear(), 4 -1, 1),
		maxDate: new Date(currentTime.getFullYear(), 10, 30),
	});


	$('#checkin').attr('readonly','readonly');
	$('#checkout').attr('readonly','readonly');
  var dates = $("input[id$='checkin'], input[id$='checkout']").datepicker({ 
  	changeMonth: true,
  	numberOfMonths: 1,
  	dateFormat: "yy-mm-dd",    
  	minDate: new Date(currentTime.getFullYear(), 4 -1, 1),
  	maxDate: new Date(currentTime.getFullYear(), 10, 30),
  	onSelect: function(selectedDate) {
  		var option = this.id == $("input[id$='checkin']")[0].id ? "minDate" : "maxDate",
  			instance = $(this).data("datepicker"),
  			date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
      	dates.not(this).datepicker("option", option, date);
      	if ( this.id == "checkin" ) {
  				dates.not( this ).datepicker( "setDate", date );
  			}
  	}
	});

$('#clearDates').on('click', function(){
	dates.attr('value', '');
	$(dates[0]).datepicker( "option", "maxDate", null ).datepicker( "option", "minDate", null );
	$(dates[1]).datepicker( "option", "maxDate", null ).datepicker( "option", "minDate", null );
});

}); //end main JS function
// END datepicker
		</script>
	</head>
	<body>
		
<?php
function currentPage(){
	$currentFile = $_SERVER["PHP_SELF"];
	$parts = Explode('/', $currentFile);
	$parts = $parts[count($parts) - 1];
	$parts = str_ireplace(".php","",$parts);
	return $parts;
}


if (currentPage() == "member-index" || currentPage() == "login-form") {
	echo "<div id=\"header-narrow\">";
} else {
	echo "<div id=\"header\">";
}
?>
    
    <div id="title"><a href="member-index.php"><h1></h1></a></div>
    
    </div>
<?php
if (currentPage() == "member-index" || currentPage() == "login-form") {
	echo "<div id=\"main-narrow\">";
} else {
	echo "<div id=\"main\">";
}
?>