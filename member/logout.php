<?php
	require_once("../config/lib.php");
    session_destroy();
    header("Location: ../index.php");
?>