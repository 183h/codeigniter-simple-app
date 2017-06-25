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

<div class="container">
  <h2>Projekt</h2>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#znamky">Znamky</a></li>
    <li><a data-toggle="tab" href="#aktivity">Aktivity</a></li>
    <li><a data-toggle="tab" href="#pridajZnamku">Pridaj znamku</a></li>
    <li><a data-toggle="tab" href="#pridajAktivitu">Pridaj aktivitu</a></li>
  </ul>

  <div class="tab-content">
    <div id="znamky" class="tab-pane fade in active">
		<table class="table table-striped">
  			<tr>
    			<th>ID</th>
    			<th>Meno</th>
    			<th>Priezvisko</th>
    			<th>Datum</th>
    			<th>Aktivita</th>
    			<th>Akcia</th>
  			</tr>
  			<?php foreach ($queryResultZnamky as $tableRow):?>
				<tr>
    				<td><?php echo $tableRow->idZnamky;?></td>
    				<td><?php echo $tableRow->meno;?></td>
    				<td><?php echo $tableRow->priezvisko;?></td>
    				<td><?php echo $tableRow->datum;?></td>
    				<td><?php echo $tableRow->Aktivity_idAktivity;?></td>
    				<td><?php echo $tableRow->body;?></td>

    				<td>
    					<div class="btn-group" role="group" aria-label="...">
  							<a class="btn btn-default" href="<?php echo base_url("index.php/welcome/viewGradeUpdateForm/$tableRow->idZnamky"); ?>" role="button">Update</a>
  							<a class="btn btn-default" href="<?php echo base_url("index.php/welcome/deleteGrade/$tableRow->idZnamky"); ?>" role="button">Delete</a>
						</div>
					</td>
				</tr>
  			<?php endforeach;?>
		</table>
    </div>

    <div id="aktivity" class="tab-pane fade">
		<table class="table table-striped">
  			<tr>
    			<th>ID</th>
    			<th>Nazov</th>
    			<th>Popis</th>
    			<th>Maximum</th>
    			<th>Akcia</th>
  			</tr>
  			<?php foreach ($queryResultAktivity as $tableRow):?>
				<tr>
    				<td><?php echo $tableRow->idAktivity;?></td>
    				<td><?php echo $tableRow->nazov;?></td>
    				<td><?php echo $tableRow->popis;?></td>
    				<td><?php echo $tableRow->maximum;?></td>
					<td>
    					<div class="btn-group" role="group" aria-label="...">
  							<a class="btn btn-default" href="<?php echo base_url("index.php/welcome/viewActivityUpdateForm/$tableRow->idAktivity"); ?>" role="button">Update</a>
  							<a class="btn btn-default" href="<?php echo base_url("index.php/welcome/deleteActivty/$tableRow->idAktivity"); ?>" role="button">Delete</a>
						</div>
					</td>				
				</tr>
  			<?php endforeach;?>
		</table>
    </div>

	<div id="pridajZnamku" class="tab-pane fade">
		<div class="span4" id="error">
        	<form name="contact" method="post" action="<?php echo base_url("index.php/welcome/createGrade"); ?>" id="contact" class="well">  
            	<fieldset>
                	<legend>Pridaj znamku</legend> 
                	<label class="control-label" for="name">Meno&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</label>
                	<input type="text" name="name" id="name" class="required">
                	<br>

                	<label class="control-label" for="surname">Priezvisko :</label>
                	<input type="text" name="surname" id="surname" class="required">
  					<br>

                	<label class="control-label" for="date">Datum&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</label>
                	<input type="text" name="date" id="date" class="required">
  					<br>

  					<label class="control-label" for="points">Body&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</label>
                	<input type="text" name="points" id="points" class="required">
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
    </div>

    <div id="pridajAktivitu" class="tab-pane fade">
		<div class="span4" id="error">
        	<form name="contact" method="post" action="<?php echo base_url("index.php/welcome/createActivity"); ?>" id="contact" class="well">  
            	<fieldset>
                	<legend>Pridaj znamku</legend> 
                	<label class="control-label" for="label">Nazov&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</label>
                	<input type="text" name="label" id="label" class="required">
                	<br>

                	<label class="control-label" for="info">Popis&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</label>
                	<input type="text" name="info" id="info" class="required">
  					<br>

                	<label class="control-label" for="max">Maximum&nbsp&nbsp&nbsp&nbsp:</label>
                	<input type="text" name="max" id="max" class="required">
  					<br>
  					<br>

                	<input type="submit" name="submit" id="submit" value="Vytvor" class="btn btn-success">
            	</fieldset>
        	</form>
        </div>
    </div>
  </div>
</div>

</body>
</html>