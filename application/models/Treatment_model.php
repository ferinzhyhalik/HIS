<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Treatment_model extends CI_Model
{
    public function getTreatment()
    {
        $query = "SELECT `inpatient_treatment`.*, `inpatient`.*
                  FROM `inpatient` JOIN `inpatient_treatment` 
                  ON `inpatient`.`patientMedicalRecord_id` = `inpatient_treatment`.`patientMedicalRecord_id`
                  ";
        return $this->db->query($query)->row_array();
    }
}
