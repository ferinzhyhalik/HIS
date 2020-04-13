
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nurse_model extends CI_Model
{
    public function getNurse()
    {
        $query = "SELECT `nurse`.*, `inpatient`.*
                  FROM `inpatient` JOIN `nurse` 
                  ON `inpatient`.`nurse_id` = `nurse`.`nurse_id`
                  ";
        return $this->db->query($query)->row_array();
    }
}
