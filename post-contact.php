<?php

$name=htmlentities($_POST['user_name']);
$mail=htmlentities($_POST['user_mail']);
$message=htmlentities(($_POST['user_message']);
$headers='FORM:site@local.dev'

mail('a.perrillat@live.fr', 'formulaire de contact', $nom, $mail, $message)

#header("location:index.html")
print("<center>Nom : $name, Mail : $mail, Message : $message </center>");

?> 