<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.2.1.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</head>
<body>

		<div class="span4" id="error">
        	<form name="contact" method="post" action="<?php echo base_url("index.php/welcome/updateGrade/".$queryGrade[0]->idZnamky); ?>" id="contact" class="well">  
            	<fieldset>
                	<legend>Zmen znamku</legend> 
                	<label class="control-label" for="name">Meno&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</label>
                	<input type="text" name="name" id="name" class="required" value="<?php echo $queryGrade[0]->meno?>">
                	<br>

                	<label class="control-label" for="surname">Priezvisko :</label>
                	<input type="text" name="surname" id="surname" class="required" value="<?php echo $queryGrade[0]->priezvisko?>">
  					<br>

                	<label class="control-label" for="date">Datum&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</label>
                	<input type="text" name="date" id="date" class="required" value="<?php echo $queryGrade[0]->datum?>">
  					<br>

  					<label class="control-label" for="points">Body&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</label>
                	<input type="text" name="points" id="points" class="required" value="<?php echo $queryGrade[0]->body?>">
  					<br>
  					<br>

  					<select name="activity">
  					  	<?php foreach ($queryResultAktivity as $tableRow):?>
    						<option value="<?php echo $tableRow->idAktivity;?>"><?php echo $tableRow->nazov;?></option>
    					<?php endforeach;?>
  					</select>
  					<br>
  					<br>

                	<input type="submit" name="submit" id="submit" value="Vytvor" class="btn btn-success">
            	</fieldset>
        	</form>
        </div>

</body>
</html>