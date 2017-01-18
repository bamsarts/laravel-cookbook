<h1>User Info</h1>

<?php 
	$messages = $errors -> all('<p style="color:red">:message</p>')

 ?>
<?php 
 	foreach ($messages as $msg) {
		echo $msg;
	}
  ?>

<?= Form::open() ?>
<?= Form::label('email','My Email') ?>
<?= Form::text('email', Input::old('email')) ?>
<br>
<?= Form::label('username', 'My Username') ?>
<?= Form::text('username', Input::old('username')) ?>
<br>
<?= Form::label('password', 'My Password') ?>
<?= Form::password('password') ?>
<br>
<?= Form::label('password_confirm', 'Retype your password') ?>
<?= Form::password('password_confirm') ?>
<?= Form::text('no_email','', array('style' => 'display:none' )) ?>
<br>
<?= Form::label('color', 'Favorite Color') ?>
<?= Form::select('color', array('red' => 'red', 'green' =>
 'green', 'blue' => 'blue'), Input::old('color')) ?>
<br>
<?= Form::submit('Send it!') ?>
<?= Form::close() ?>