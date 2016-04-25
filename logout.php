<?php
require_once("class/class_usuario.php");
session_destroy();
header("Location: login.php?m=3");
