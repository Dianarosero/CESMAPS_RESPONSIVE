<?php
session_start();
session_destroy();
header('Location:../cuentas/back/logg.php');
?>