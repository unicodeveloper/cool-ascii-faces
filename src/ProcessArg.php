<?php

namespace Unicodeveloper;

class ProcessArg
{

    /**
     * Arguments from the Command Line
     * @var array
     */
    private $input;

    /**
     * Initialise $input variable with arguments from the command line
     * @param array $arg
     */
    public function __construct($arg)
    {
        $this->input = $arg;
    }

    /**
     * Validate Arguments from the Command Line
     * @return boolean
     */
    public function validateArgs()
    {
        if ( count($this->input) == 1){
            $this->helpMessage();
            return;
        }

        return ($this->input[1] === '-a' || $this->input[1] == '--all') ? true : false;
    }

    /**
     *  Help Message in a case where the user doesn't supply any commands/arguments
     * @return void
     */
    public function helpMessage()
    {
        echo "
            ______           ___            _______      __   _____  _____
          / ____/___  ____ _/_/    ___    / _______/   /   \ / ___/ /____/
         / /   / __ \/ __ \/ /    / /    /  ______   /  /_\ / /  / /____
        / /___/ /_/ / /_/ / /____/ /    / /_____/  /  ____ / /__/ /___/
        \____/\____/\____/\______/     /_/       /__/   \_/\___/\____/

        Usage:
         command [options] [arguments]

        Options:
         --all (-a)           Display all the cool faces
        ";
    }

    /**
     * Get the array of faces from faces.php
     * @return array
     */
    public function  getFaces()
    {
        $faces = require __DIR__.'/faces.php';
        return $faces;
    }

    /**
     * Output faces to the console
     * @return void
     */
    public function spitOutFaces()
    {
        if( ! $this->validateArgs()) {
            return;
        }

        foreach( $this->getFaces() as $face ) {
            echo $face . PHP_EOL;
        }
    }
}