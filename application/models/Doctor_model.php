<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Doctor_model extends CI_Model
{
    public function getDoctor()
    {
        $query = "SELECT  `inpatient`.*, `doctor`.*
                  FROM `inpatient` JOIN `doctor` 
                  ON `inpatient`.`doctor_id` = `doctor`.`doctor_id`
                  ";
        return $this->db->query($query)->row_array();
    }
}
