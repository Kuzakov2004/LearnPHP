<?php
setcookie('login', '', 0, '/');
setcookie('password', '', 0, '/');
header('Location: /logInSystem/index.php');