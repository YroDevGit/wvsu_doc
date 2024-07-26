<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inputs {

    protected $CI;
    public $Input;

    public function __construct() {
        $this->Input = json_decode($this->CI->input->raw_input_stream, true);
    }

    public function getInput() {
        return $this->Input;
    }
}
