<?php
session_start();
session_destroy();
header('Location: login.php');
exit();

/* Fermeture de la session avec session_destroy() */
