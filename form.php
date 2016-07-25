<?php
// this version uses POST so that we do not see the data in the url   
	$error = false;		# is there any error at all
	$txtbox1err = false;	# is error in the first text box
	$txtbox2err = false;	# is error in the second text box
	$txtareaerr = false;


if ($_POST["submit"] == NULL): ?>
<form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">


1) For which of the following reasons have you visited our website? (Check all that apply)  <br />
<input type="checkbox" name="group1a" value="Product Information"> Product Information<br />
<input type="checkbox" name="group1b" value="Product Support"> Product Support<br />
<input type="checkbox" name="group1c" value="Sales Information"> Sales Information<br />
<input type="checkbox" name="group1d" value="Company Information"> Company Information<br />
<input type="checkbox" name="group1e" value="Company/Department Contact"> Company/Department Contact<br />
<input type="checkbox" name="group1f" value="Employment Opportunities"> Employment Opportunities<br />
<input type="checkbox" name="group1g" value="other1"> Other: <input type="text" name="txtbox1" value="" size="40"><br /><br />

2) How did you hear about our website?   (Check all that apply)  <br />
<input type="checkbox" name="group2a" value="Friend"> Friend<br />
<input type="checkbox" name="group2b" value="Search Engine"> Search Engine<br />
<input type="checkbox" name="group2c" value="I am a Customer"> I am a Customer<br />
<input type="checkbox" name="group2d" value="Advertisement"> Advertisement<br />
<input type="checkbox" name="group2e" value="Brochure"> Brochure<br />
<input type="checkbox" name="group2f" value="other2"> Other: <input type="text" name="txtbox2" value="" size="40"><br /><br />

3) Please rate the overall content of our website.  <br />
<input type="radio" name="group3" value="Excellent"> Excellent<br />
<input type="radio" name="group3" value="Good"> Good<br />
<input type="radio" name="group3" value="Average" checked="yes"> Average<br />
<input type="radio" name="group3" value="Poor"> Poor<br />
<input type="radio" name="group3" value="Very Poor"> Very Poor <br /><br />

4) Please rate the ease of navigation of our website.  <br />
<input type="radio" name="group4" value="Excellent"> Excellent<br />
<input type="radio" name="group4" value="Good"> Good<br />
<input type="radio" name="group4" value="Average" checked="yes"> Average<br />
<input type="radio" name="group4" value="Poor"> Poor<br />
<input type="radio" name="group4" value="Very Poor"> Very Poor <br /><br />

5) Please rate the overall look of our website.  <br />
<input type="radio" name="group5" value="Excellent"> Excellent<br />
<input type="radio" name="group5" value="Good"> Good<br />
<input type="radio" name="group5" value="Average" checked="yes"> Average<br />
<input type="radio" name="group5" value="Poor"> Poor<br />
<input type="radio" name="group5" value="Very Poor"> Very Poor <br /><br />

6) Did you find the information you were looking for on our website?  <br />
<input type="radio" name="group6" value="Yes" checked="yes"> Yes<br />
<input type="radio" name="group6" value="No"> No<br /><br />


7) What information were you not able to find on our website?  <br />
<textarea name="txtarea" rows="5" cols="50"></textarea><br /><br />

<input type="submit" name="submit" value="send" /> &nbsp;&nbsp;<input type="reset" value="clear" /> 
</form>

<? else:  // test conditions and set error flags
//	foreach ($_POST as $key => $val){
//		if($key == "group1g"){
		if( $_POST['group1g'] == NULL && trim($_POST['txtbox1']) != NULL ){  
				$error= true;
				$txtbox1err = true;
//			    echo "txtbox1 = text but chkbox1 not checked";
		}//end if

		if( $_POST['group1g'] != NULL && trim($_POST['txtbox1']) == NULL || is_numeric( $_POST['txtbox1'])  ){ 
				$error= true;
				$txtbox1err = true;
//			    echo "chkbox1 = checked but txtbox1 = no text";
		}//end if

		if( $_POST['group2f'] == NULL && trim($_POST['txtbox2']) != NULL ){  
				$error= true;
				$txtbox2err = true;
//			    echo "txtbox2 = text but chkbox2 not checked";				
		}//end if

		if( $_POST['group2f'] != NULL && trim($_POST['txtbox2']) == NULL || is_numeric( $_POST['txtbox2'])  ){ 
				$error= true;
				$txtbox2err = true;
//			    echo "chkbox2 = checked but txtbox2 = no text";
		}//end if

		if( $_POST['group6'] == "No" && trim($_POST['txtarea']) == NULL || is_numeric( $_POST['txtarea']) ){
				$error= true;
				$txtareaerr = true;
//				echo "txtarea = empty";			
		}//end if

		if( $_POST['group6'] == "Yes" && trim($_POST['txtarea']) != NULL ){
				$error= true;
				$txtareaerr = true;
//				echo "radio6 = yes but txtarea has comments";			
		}//end if

//	} // end for
?>	

	<? // if errors are found cleanse or return good data
	 if($error){ ?>
		<form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">

					
		1) For which of the following reasons have you visited our website? (Check all that apply)  <br />
		<?  if( $_POST['group1a'] == NULL ){ ?>			
		<input type="checkbox" name="group1a" value="Product Information"> Product Information <br />
		<?  }else{ ?>
		<input type="checkbox" name="group1a" value="Product Information" checked="checked"> Product Information <br />
	    <?  } ?>
	    <?  if( $_POST['group1b'] == NULL ){ ?>			
		<input type="checkbox" name="group1b" value="Product Support"> Product Support <br />
	    <?  }else{ ?>
		<input type="checkbox" name="group1b" value="Product Support" checked="checked"> Product Support <br />
	    <?  } ?>
	    <?  if( $_POST['group1c'] == NULL ){ ?>			
		<input type="checkbox" name="group1c" value="Sales Information"> Sales Information <br />
	    <?  }else{ ?>
		<input type="checkbox" name="group1c" value="Sales Information" checked="checked"> Sales Information <br />
	    <?  } ?>
	    <?  if( $_POST['group1d'] == NULL ){ ?>			
		<input type="checkbox" name="group1d" value="Company Information"> Company Information <br />
	    <?  }else{ ?>
		<input type="checkbox" name="group1d" value="Company Information" checked="checked"> Company Information <br />
	    <?  } ?>
	    <?  if( $_POST['group1e'] == NULL ){ ?>			
		<input type="checkbox" name="group1e" value="Company/Department Contact"> Company/Department Contact <br />
	    <?  }else{ ?>
		<input type="checkbox" name="group1e" value="Company/Department Contact" checked="checked"> Company/Department Contact <br />
	    <?  } ?>
	    <?  if( $_POST['group1f'] == NULL ){ ?>			
		<input type="checkbox" name="group1f" value="Employment Opportunities"> Employment Opportunities <br />
	    <?  }else{ ?>
		<input type="checkbox" name="group1f" value="Employment Opportunities" checked="checked"> Employment Opportunities <br />
	    <?  } ?>
	    <?  if($txtbox1err){ ?>
		    <?  if( $_POST['group1g'] == NULL ){ ?>
			<input type="checkbox" name="group1g" value="other1">
				Other: <input type="text" name="txtbox1" value="<?= $_POST['txtbox1'] ?>" size="40">&nbsp;&nbsp;&nbsp;
				<span style='color:#ff0000'><- ERROR: Please check corresponding box.</span><br /><br />
		    <?  }else{ ?>
			<input type="checkbox" name="group1g" value="other1" checked="checked">
				Other: <input type="text" name="txtbox1" value="<?= $_POST['txtbox1'] ?>" size="40">&nbsp;&nbsp;&nbsp;
				<span style='color:#ff0000'><- ERROR: Please enter text.</span><br /><br />
	 	    <?  } // end txtbox1err  ?>
	    <? }else{ // no txtbox1err:  ?>
			<?  if( $_POST['group1g'] == NULL ){ ?>			
			<input type="checkbox" name="group1g" value="other1">
				Other: <input type="text" name="txtbox1" value="" size="40"><br /><br />
			<?  }else{ ?>
			<input type="checkbox" name="group1g" value="other1" checked="checked">
				Other: <input type="text" name="txtbox1" value="<?= $_POST['txtbox1'] ?>" size="40"><br /><br />
			<?  } ?>
 	    <? } ?>
	
	
	
		2) How did you hear about our website? (Check all that apply) <br />
		<?  if( $_POST['group2a'] == NULL ){ ?>			
		<input type="checkbox" name="group2a" value="Friend"> Friend <br />
		<?  }else{ ?>
		<input type="checkbox" name="group2a" value="Friend" checked="checked"> Friend <br />		
	    <?  } ?>
	    <?  if( $_POST['group2b'] == NULL ){ ?>			
		<input type="checkbox" name="group2b" value="Search Engine"> Search Engine <br />
	    <?  }else{ ?>
		<input type="checkbox" name="group2b" value="Search Engine" checked="checked"> Search Engine <br />		
	    <?  } ?>
	    <?  if( $_POST['group2c'] == NULL ){ ?>			
		<input type="checkbox" name="group2c" value="I am a Customer"> I am a Customer <br />
	    <?  }else{ ?>
		<input type="checkbox" name="group2c" value="I am a Customer" checked="checked"> I am a Customer <br />
	    <?  } ?>
	    <?  if( $_POST['group2d'] == NULL ){ ?>			
		<input type="checkbox" name="group2d" value="Advertisement"> Advertisement <br />
	    <?  }else{ ?>
		<input type="checkbox" name="group2d" value="Advertisement" checked="checked"> Advertisement <br />
	    <?  } ?>
	    <?  if( $_POST['group2e'] == NULL ){ ?>			
		<input type="checkbox" name="group2e" value="Brochure"> Brochure <br />
	    <?  }else{ ?>
		<input type="checkbox" name="group2e" value="Brochure" checked="checked"> Brochure <br />
	    <?  } ?>
	    <?  if($txtbox2err){ ?>
		    <?  if( $_POST['group2f'] == NULL ){ ?>
			<input type="checkbox" name="group2f" value="other2"> 
				Other: <input type="text" name="txtbox2" value="<?= $_POST['txtbox2'] ?>" size="40">&nbsp;&nbsp;&nbsp;
				<span style='color:#ff0000'><- ERROR: Please check corresponding box.</span><br /><br />
		    <?  }else{ ?>
			<input type="checkbox" name="group2f" value="other2" checked="checked">
				Other: <input type="text" name="txtbox2" value="<?= $_POST['txtbox2'] ?>" size="40">&nbsp;&nbsp;&nbsp;
				<span style='color:#ff0000'><- ERROR: Please enter text.</span><br /><br />
	 	    <?  } // end txtbox2err  ?>
	    <? }else{ // no txtbox2err:  ?>
			<?  if( $_POST['group2f'] == NULL ){ ?>			
			<input type="checkbox" name="group2f" value="other2"> 
				Other: <input type="text" name="txtbox2" value="" size="40"><br /><br />
			<?  }else{ ?>
			<input type="checkbox" name="group2f" value="other2" checked="checked">
				Other: <input type="text" name="txtbox2" value="<?= $_POST['txtbox2'] ?>" size="40"><br /><br />
			<?  } ?>
	    <? } ?>	


		3) Please rate the overall content of our website.  <br />
		<?  if( $_POST['group3'] == "Excellent" ){ ?>			
			<input type="radio" name="group3" value="Excellent" checked="yes"> Excellent <br />
		<?  }else{ ?>
			<input type="radio" name="group3" value="Excellent"> Excellent <br />
	    <?  } ?>
	    <?  if( $_POST['group3'] == "Good" ){ ?>			
			<input type="radio" name="group3" value="Good" checked="yes"> Good <br />
	    <?  }else{ ?>
			<input type="radio" name="group3" value="Good"> Good <br />
	    <?  } ?>
	    <?  if( $_POST['group3'] == "Average" ){ ?>			
			<input type="radio" name="group3" value="Average" checked="yes"> Average <br />
	    <?  }else{ ?>
			<input type="radio" name="group3" value="Average"> Average <br />
	    <?  } ?>
	    <?  if( $_POST['group3'] == "Poor" ){ ?>			
			<input type="radio" name="group3" value="Poor" checked="yes"> Poor <br />
	    <?  }else{ ?>
			<input type="radio" name="group3" value="Poor"> Poor <br />
	    <?  } ?>
	    <?  if( $_POST['group3'] == "Very Poor" ){ ?>			
			<input type="radio" name="group3" value="Very Poor" checked="yes"> Very Poor <br /><br />
	    <?  }else{ ?>
			<input type="radio" name="group3" value="Very Poor"> Very Poor <br /><br />
	    <?  } ?>



		4) Please rate the ease of navigation of our website.  <br />
		<?  if( $_POST['group4'] == "Excellent" ){ ?>			
			<input type="radio" name="group4" value="Excellent" checked="yes"> Excellent<br />
		<?  }else{ ?>
			<input type="radio" name="group4" value="Excellent"> Excellent <br />
	    <?  } ?>
	    <?  if( $_POST['group4'] == "Good" ){ ?>			
			<input type="radio" name="group4" value="Good" checked="yes"> Good <br />
	    <?  }else{ ?>
			<input type="radio" name="group4" value="Good"> Good <br />
	    <?  } ?>
	    <?  if( $_POST['group4'] == "Average" ){ ?>			
			<input type="radio" name="group4" value="Average" checked="yes"> Average <br />
	    <?  }else{ ?>
			<input type="radio" name="group4" value="Average"> Average <br />
	    <?  } ?>
	    <?  if( $_POST['group4'] == "Poor" ){ ?>			
			<input type="radio" name="group4" value="Poor" checked="yes"> Poor <br />
	    <?  }else{ ?>
			<input type="radio" name="group4" value="Poor"> Poor <br />
	    <?  } ?>
	    <?  if( $_POST['group4'] == "Very Poor" ){ ?>			
			<input type="radio" name="group4" value="Very Poor" checked="yes"> Very Poor <br /><br />
	    <?  }else{ ?>
			<input type="radio" name="group4" value="Very Poor"> Very Poor <br /><br />
	    <?  } ?>


		5) Please rate the overall look of our website.  <br />
		<?  if( $_POST['group5'] == "Excellent" ){ ?>			
			<input type="radio" name="group5" value="Excellent" checked="yes"> Excellent<br />
		<?  }else{ ?>
			<input type="radio" name="group5" value="Excellent"> Excellent <br />
	    <?  } ?>
	    <?  if( $_POST['group5'] == "Good" ){ ?>			
			<input type="radio" name="group5" value="Good" checked="yes"> Good <br />
	    <?  }else{ ?>
			<input type="radio" name="group5" value="Good"> Good <br />
	    <?  } ?>
	    <?  if( $_POST['group5'] == "Average" ){ ?>			
			<input type="radio" name="group5" value="Average" checked="yes"> Average <br />
	    <?  }else{ ?>
			<input type="radio" name="group5" value="Average"> Average <br />
	    <?  } ?>
	    <?  if( $_POST['group5'] == "Poor" ){ ?>			
			<input type="radio" name="group5" value="Poor" checked="yes"> Poor <br />
	    <?  }else{ ?>
			<input type="radio" name="group5" value="Poor"> Poor <br />
	    <?  } ?>
	    <?  if( $_POST['group5'] == "Very Poor" ){ ?>			
			<input type="radio" name="group5" value="Very Poor" checked="yes"> Very Poor <br /><br />
	    <?  }else{ ?>
			<input type="radio" name="group5" value="Very Poor"> Very Poor <br /><br />
	    <?  } ?>


		6) Did you find the information you were looking for on our website?  <br />
		<?  if( $_POST['group6'] == "Yes" && trim($_POST['txtarea']) != NULL ){ ?>			
			<input type="radio" name="group6" value="Yes" checked="yes"> Yes &nbsp;&nbsp;&nbsp;<span style='color:#ff0000'>
				<- ERROR: You selected "Yes" here but entered comments in the corresponding area below.</span><br />
		<?  }elseif( $_POST['group6'] == "Yes" && trim($_POST['txtarea']) == NULL ){ ?>
			<input type="radio" name="group6" value="Yes" checked="yes">
		<?  }else{ ?>
			<input type="radio" name="group6" value="Yes"> Yes<br />
	    <?  } ?>
	    <?  if( $_POST['group6'] == "No" ){ ?>			
			<input type="radio" name="group6" value="No" checked="yes"> No<br /><br />
	    <?  }else{ ?>
			<input type="radio" name="group6" value="No"> No<br /><br />
	    <?  } ?>


		7) What information were you not able to find on our website?  <br />
		<?  if( $_POST['group6'] == "No" && trim($_POST['txtarea']) == NULL || is_numeric( $_POST['txtarea']) ){ ?>
			<textarea name="txtarea" rows="5" cols="50"><?= $_POST['txtarea'] ?></textarea>&nbsp;&nbsp;&nbsp;
				<span style='color:#ff0000'><- ERROR: Please enter text.</span><br /><br />
	    <?  } else { ?>		
			<textarea name="txtarea" rows="5" cols="50"><?= $_POST['txtarea'] ?></textarea><br /><br />
	    <?  } ?>

	   <input type="submit" name="submit" value="send" /> &nbsp;&nbsp;<input type="reset" value="clear" /> 
	  </form>
	
	
	<? //all tests past process data
	  }elseif(!$error){
	   print "<strong>Your responses: </strong><br /><br />
			1) For which of the following reasons have you visited our website? <br />";
	        if( $_POST['group1a'] != NULL ){ echo "&nbsp;&nbsp;&nbsp;&nbsp; " . $_POST['group1a'] . "<br />"; }
	        if( $_POST['group1b'] != NULL ){ echo "&nbsp;&nbsp;&nbsp;&nbsp; " . $_POST['group1b'] . "<br />"; }
	        if( $_POST['group1c'] != NULL ){ echo "&nbsp;&nbsp;&nbsp;&nbsp; " . $_POST['group1c'] . "<br />"; }
	        if( $_POST['group1d'] != NULL ){ echo "&nbsp;&nbsp;&nbsp;&nbsp; " . $_POST['group1d'] . "<br />"; }
	        if( $_POST['group1e'] != NULL ){ echo "&nbsp;&nbsp;&nbsp;&nbsp; " . $_POST['group1e'] . "<br />"; }
	        if( $_POST['group1f'] != NULL ){ echo "&nbsp;&nbsp;&nbsp;&nbsp; " . $_POST['group1f'] . "<br />"; }
	        if( $_POST['group1g'] != NULL ){ echo "&nbsp;&nbsp;&nbsp;&nbsp; " . $_POST['txtbox1'] . "<br />"; }
			if( $_POST['group1a'] == NULL && $_POST['group1b'] == NULL && $_POST['group1c'] == NULL &&
				 $_POST['group1d'] == NULL && $_POST['group1e'] == NULL && $_POST['group1f'] == NULL &&
				  $_POST['group1g'] == NULL){ echo "&nbsp;&nbsp;&nbsp;&nbsp; (No response) <br />"; }
			echo "<br />
			
			2) How did you hear about our website? <br />";
			if( $_POST['group2a'] != NULL ){ echo "&nbsp;&nbsp;&nbsp;&nbsp; " . $_POST['group2a'] . "<br />"; }
	        if( $_POST['group2b'] != NULL ){ echo "&nbsp;&nbsp;&nbsp;&nbsp; " . $_POST['group2b'] . "<br />"; }
	        if( $_POST['group2c'] != NULL ){ echo "&nbsp;&nbsp;&nbsp;&nbsp; " . $_POST['group2c'] . "<br />"; }
	        if( $_POST['group2d'] != NULL ){ echo "&nbsp;&nbsp;&nbsp;&nbsp; " . $_POST['group2d'] . "<br />"; }
	        if( $_POST['group2e'] != NULL ){ echo "&nbsp;&nbsp;&nbsp;&nbsp; " . $_POST['group2e'] . "<br />"; }
	        if( $_POST['group2f'] != NULL ){ echo "&nbsp;&nbsp;&nbsp;&nbsp; " . $_POST['txtbox2'] . "<br />"; }
			if( $_POST['group2a'] == NULL && $_POST['group2b'] == NULL && $_POST['group2c'] == NULL &&
				 $_POST['group2d'] == NULL && $_POST['group2e'] == NULL && $_POST['group2f'] == NULL &&
				  $_POST['group2g'] == NULL){ echo "&nbsp;&nbsp;&nbsp;&nbsp; (No response) <br />"; }
			echo "<br />
						
			3) Please rate the overall content of our website. <br />&nbsp;&nbsp;&nbsp;&nbsp; "
			. $_POST['group3'] . "<br /><br />
			
			4) Please rate the ease of navigation of our website. <br />&nbsp;&nbsp;&nbsp;&nbsp; "
			. $_POST['group4'] . "<br /><br />
			
			5) Please rate the overall look of our website. <br />&nbsp;&nbsp;&nbsp;&nbsp; "
			. $_POST['group5'] . "<br /><br />
			
			6) Did you find the information you were looking for on our website? <br />&nbsp;&nbsp;&nbsp;&nbsp; "
			. $_POST['group6'] . "<br /><br />
			
			7) What information were you not able to find on our website? <br />&nbsp;&nbsp;&nbsp;&nbsp; "
			. $_POST['txtarea'] . "<br /><br /><br />
			
			<strong>Thanks for your input! &nbsp;&nbsp;&nbsp;</strong>"; 
	  }//end !error
	  
 endif; ?>

