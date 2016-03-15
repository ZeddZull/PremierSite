<?php 
session_start();
unset($_SESSION['page']);
unset($_SESSION['idQ']);
header("Location: ../");
exit();