<?php
require __DIR__ . '/../../vendor/autoload.php';

//! Spyke User Actions
//! Log Out

Group8\Spyke\Auth::logout();

header("Location: ../Login.php?error=0");
print("Logged out.");