<?php
class Seed extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->Seed->setSeed();
  }
}

//oi
