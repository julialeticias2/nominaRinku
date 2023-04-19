<?php
//front/logout.php

/*
 * Copyright (c) 2023, Coppel
 * All rights reserved.
 * Author: Ing. Julia Leticia Sánchez Sánchez
 * Date: 16/04/2023
*/

session_start();
$_SESSION = array();
session_destroy();
header("Location: index.php");
