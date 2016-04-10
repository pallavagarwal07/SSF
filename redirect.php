<?php
session_start();
$valid_session = isset($_SESSION['id']) ? $_SESSION['id'] === session_id() : FALSE;
if (!$valid_session) {
   header('Location: ./index.html');
   exit();
}
?>
