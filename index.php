<?php
  require_once 'func.php';

  if(!empty($_POST)){
    save_mess();
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
  }

  $messages = get_mess();
  $messages = array_mes($messages);
?>

<!DOCTYPE html>
<html lang='ru'>
<head>
  <meta charset='utf-8'>
  <title>Chat page</title>
  <link href='css/index.css' type='text/css' rel='stylesheet'></link>
</head>
<body>
  <form action='index.php' method='post'>
    <div>
      <label for='name'>Name:</label>
      <input type='text' name='name' id='name'>
    </div>
    <div>
      <label for='text'>Text:</label>
      <textarea name='text' id='text'></textarea>
    </div>
    <button type='submit'>Send</button>
  </form>
  <hr>
  <?php if(!empty($messages)): ?>
      <?php foreach($messages as $message): ?>
        <?php $message = get_format_mesaage($message);?>
        <div class='message'>
          <p>Author:  <?=$message[0]?></p>
          <p>Date: <?=$message[2]?></p>
          <p><?=nl2br(htmlspecialchars($message[1]))?><p>
        </div>
      <?php endforeach; ?>
  <?php endif; ?>
  print_r($messages);
  <?php if($messages[0] == ''){
    echo 'Hello world';
  }
   ?>
</body>
</html>