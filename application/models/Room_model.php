<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Room_model extends CI_Model
{
    public function getBedRoom()
    {
        $query = "SELECT `bed`.*, `room`.`room_grade`
                  FROM `bed` JOIN `room` 
                  ON `bed`.`room_id` = `room`.`room_id`
                  ";
        return $this->db->query($query)->result_array();
    }

    public function updateBed($bed_id)
    {
        $query = "SELECT `bed`.*, `inpatient`.`bed_id`
                  FROM `inpatient` JOIN `bed` 
                  ON `inpatient`.`bed_id` = `bed`.`id_id`
                  ";
        $query = $this->db->update('bed', $bed_id);
    }
}
