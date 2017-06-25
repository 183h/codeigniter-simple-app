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
        	<form name="contact" method="post" action="<?php echo base_url("index.php/welcome/updateActivity/".$queryActivity[0]->idAktivity); ?>" id="contact" class="well">  
            	<fieldset>
                	<legend>Zmen Aktivitu</legend> 
                	<label class="control-label" for="label">Nazov&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</label>
                	<input type="text" name="label" id="label" class="required" value="<?php echo $queryActivity[0]->nazov?>">
                	<br>

                	<label class="control-label" for="info">Popis&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</label>
                	<input type="text" name="info" id="info" class="required" value="<?php echo $queryActivity[0]->popis?>">
  					<br>

                	<label class="control-label" for="max">Maximum&nbsp&nbsp&nbsp&nbsp:</label>
                	<input type="text" name="max" id="max" class="required" value="<?php echo $queryActivity[0]->maximum?>">
  					<br>

                	<input type="submit" name="submit" id="submit" value="Vytvor" class="btn btn-success">
            	</fieldset>
        	</form>
        </div>

</body>
</html>