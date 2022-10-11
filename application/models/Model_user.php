<?php

class Model_user extends CI_Model
{
    function getDataUser()
    {
        $query = "SELECT `user`.*,`role_id`.`role`
        FROM `user` JOIN `role_id`
        ON `user`.`role_id` = `role_id`.`id`
        ORDER BY user.`date` DESC
        ";

        return $this->db->query($query);
    }

    function getUser()
    {
        return $this->db->get_where('user', ['email' => $this->session->userdata('email')]);
    }


    function insertUser($data)
    {
        return $this->db->insert('user', $data);
    }

    function deleteUser($id)
    {
        return $this->db->delete('user', array('id' => $id));
    }

    function getRole()
    {
        return $this->db->get('role_id');
    }
}
