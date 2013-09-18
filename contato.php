	<?php include 'header.php'; ?>

<center class="well">
	<div class="container row-fluid">
<?php
	if( isset($_SESSION['dados']['error']) && $_SESSION['dados']['error'] == 'validation' ): ?>
		
	    	<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<h4>Não foi possível enviar a mensagem.</h4>
				<hr>
				<p>
					Preencha corretamente os seguintes campos:<br><br>
					<ul>
						<?php 
							foreach($_SESSION['dados']['errors'] as $key => $value)
							{
							    echo '<li>'.ucwords($value).'</li>';
							}
						?>
					</ul>
				</p>
			</div>
		<?php endif; ?>
		
		<?php if( !isset($_SESSION['success']) ): ?>
			<form id="form_contato" action="lib/mail.php" method="post" enctype="">
				<fieldset class="">
					<legend>Contato</legend>
		
					<div class="span7 control-group">
					    <label><i class="icon-pencil"></i>  Mensagem  <i class="icon-pencil"></i></label>
					    <textarea rows="10" name="mensagem" id="mensagem" class="span12" ><?php echo (isset($_SESSION['dados']['mensagem'])?$_SESSION['dados']['mensagem']:'') ?></textarea>
					</div>
					
					<div class="pull-right span4">
					<br>
					    <div class="control-group">
						<label><i class="icon-user"></i>  Nome  <i class="icon-user"></i></label>
						<input type="text" class="" id="nome" name="nome" value="<?php echo (isset($_SESSION['dados']['nome'])?$_SESSION['dados']['nome']:'') ?>">
					    </div>
					    <div class="control-group">
						<label><i class="icon-envelope"></i>  E-mail  <i class="icon-envelope"></i></label>
						<input type="email" class="" id="email" name="email" value="<?php echo (isset($_SESSION['dados']['email'])?$_SESSION['dados']['email']:'') ?>">
					    </div>
					    <div class="control-group">
						<label><img src="http://www.clker.com/cliparts/0/7/e/9/11954230141737421095rickvanderzwet_Phone.svg.hi.png"
						    width="15px" height="14px" />  Telefone  <img src="http://www.clker.com/cliparts/0/7/e/9/11954230141737421095rickvanderzwet_Phone.svg.hi.png"
						width="15px" height="14px" /></label>
						<select class="span2" id="ddd" name="ddd">
						    <?php
							for( $i = 51 ; $i <= 55 ; $i++ )
							{
							    echo '<option value="'.$i.'"';
							    if( $i == 51 )
							    {
								echo 'selected="selected"';
							    }
							    echo '>'.$i.'</option>';
							}
						    ?>
						</select>
						    <input type="tel" class="input-medium" id="telefone" name="telefone" value="<?php echo (isset($_SESSION['dados']['telefone'])?$_SESSION['dados']['telefone']:'') ?>">
					    </div>
						<br><br>
						<input type="submit" class="btn" id="enviar" value="Enviar"/>
					</div>
		    
			    </fieldset>
			</form>
		
		<?php endif; ?>
		
	    <?php if( isset($_SESSION['success']) ): ?>
			<div class="hero-unit">
				<p>Mensagem enviada com sucesso.</p>
				<p>
					<a class="btn btn-primary btn-large" href="contato.php">Voltar</a>
				</p>
			</div>
		<?php session_unset(); endif; ?>
		
		</div>
</center>
<?php
	//Debug 
	/*
	echo '</center><pre>';
	var_dump($_SESSION);
	echo '</pre><center>';
	*/
?>
<?php include 'footer.php'; ?>