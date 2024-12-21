<?php
if (!empty($_GET["p"])) {
    include_once($_GET["p"] . ".php");
} else {
    include "main.php";
}
