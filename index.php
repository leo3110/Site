<?php
include 'db/banco.php';
if (isset($_GET["vacilo"])) {
	incrementa();
}
include 'header.php';
include 'tela.php';
include 'footer.php';
