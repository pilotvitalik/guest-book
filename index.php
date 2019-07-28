<?php

header("Content-type: text/html; charset=utf-8");

require_once 'connect.php';
require_once 'func.php';

if(!empty($_POST)){
	save_mess();	
	header("Location: {$_SERVER['PHP_SELF']}");
	exit;
}

$messages = get_mess();
// print_arr($messages);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Гостевая книга</title>
	<link href='css/index.css' rel='stylesheet' type='text/css'>
</head>
<body>
	<form action="index.php" method="post">
		<div>
			<label for='name'>Name:</label>
			<input type="text" name="name" id="name">
		</div>
		<div>
			<label for='text'>Text:</label>
			<textarea name="text" id="text"></textarea>
		</div>
		<button type="submit">Send</button>
	</form>
	<hr>
	<?php if(!empty($messages)): ?>
		<?php foreach($messages as $message): ?>
			<div class="message">
				<p>Author: <?=$message['name']?></p> 
				<p>Date: <?=$message['date']?></p>
				<p><?=nl2br(htmlspecialchars($message['text']))?></p>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>

</body>
</html>