<?php
require __DIR__ . '/../../vendor/autoload.php';

//! Spyke User Actions
//! Log Out

use Group8\Spyke\Auth;
Auth::logout();

header("Location: ../Login.php?error=0");
print("Logged out.");