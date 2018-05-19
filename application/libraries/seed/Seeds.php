<?php
require 'Process.php';
class Seeds extends Process
{
  public $seeds;
  public function __construct()
  {
    parent::__construct();
    require('data.php');
    $this->seeds = $seeds;
  }

  public function setSeed()
  {
    foreach($this->seeds as $table => $seed) {
      $this->_truncate($table, true);
      foreach($seed as $datas) {
        foreach($datas as $data) {
          foreach($data as $fielval) {
            $this->_seed($table, $fielval['fields'], $fielval['values'], false);
          }
        }
      }
    }
  }
}
