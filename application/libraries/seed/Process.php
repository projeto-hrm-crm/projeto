<?php
class Process
{
  public $ci;
  public $count = 0;

  public function __construct()
  {
    $this->ci = &get_instance();
  }

  /**
  * @author Pedro Henrique Guimarãs
  * Semeia a tabela baseada na tabela e quantidade de informação escolhida
  *
  * @param string $table
  * @param string $quantity
  * @param array $data
  * @param boolean $truncate
  */
  public function _seed($table, $columns, $values)
  {
      foreach($values as $key => $value) {
        $values[$key] = "'$value'";
      }
      $columns = implode(",", $columns );
      $values  = implode(",", $values);
      $this->ci->db->query("INSERT INTO $table ($columns) VALUES($values)");
  }

  public function _truncate($table, $truncate)
  {
    if($truncate) {
      $this->ci->db->query('SET FOREIGN_KEY_CHECKS = 0');
      $this->ci->db->query('TRUNCATE ' . $table);
      $this->ci->db->query('SET FOREIGN_KEY_CHECKS = 1');
    }
  }
}
