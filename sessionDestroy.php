<?php
require_once 'php/connect.php';
session_start();
session_destroy();
echo 'Sessão destruida!';