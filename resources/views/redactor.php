<!DOCTYPE html>
<html>
<head>
	<title>Laravel and redactor</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/redactor.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	
</head>
<body>
<div id="page">
	<h2>Redactor</h2>
	<?= Form::open() ?>
	<?= Form::label('mytext', 'My Text') ?>
	<br>
	<?= Form::textarea('mytext', '', array('id' => 'mytext')) ?>
	<br>
	<?= Form::submit('Send it!') ?>
	<?= Form::close()?>
</div>
	
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/redactor.min.js"></script>
<script type="text/javascript">

	$(function(){
		$('#mytext').redactor({
			imageUpload: 'redactorupload'
		});
	});
</script>
</body>
</html>