<?php
namespace Group8\Spyke; # This namespace must be kept unchanged.

class ClassTemplate # MUST be the same as the filename in PascalCase (sans '.php')
{
    public function helloWorld() # Name your methods in camelCase
    {
		# An example on how to make "Howdy!" happen in /public/index.php
		# OOP Method:
		#	$Class = new \Group8\Spyke\ClassTemplate;
		#	$Class->helloWorld();
        print("Howdy!");
    }
}
