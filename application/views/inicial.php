<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<title><?php echo $titulo; ?></title>
		
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
		<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	</head>
	
	<body>
	
	<div class="container">
		<div class="row">
			<br />
			<div class="col-md-10 col-md-offset-1" style="background-color:#FFFFFF ">
				<div align="center"><br />
					
					<p><img src="<?php echo base_url('assets/img/logo.jpg'); ?>" /></p>
					<h1><?php echo $titulo_pagina; ?></h1><br />
				</div>
				
				<div class="panel panel-default">
					<div class="panel-body">
						<h4>Digite abaixo o endeço que você deseja encuratar:</h4>
						<div class="col-lg-12">
							<form method="POST" action="<?php echo base_url('links/encurtalink'); ?>">
    						<div class="input-group">
      						<input type="text" class="form-control" name="url">
      						<span class="input-group-btn">
        					<button class="btn btn-primary" type="submit">Encurtar Link!</button>
      						</span>
    						</div>
    						<?php echo form_error('url'); ?>
  						</div>
  						</form>
  						
				</div>
				
			</div>
			
			<?php
			if ($this -> session -> flashdata('urlEncurtada')) {
			echo "<div class=\"alert alert-success\">";
			echo "<strong>Link Encurtado: </strong>" . base_url('ln/' . $this -> session -> flashdata('urlEncurtada'));
			echo "</div>";
			}
			?>
		</div>
		
	</div>
	</body>
	
</html>

