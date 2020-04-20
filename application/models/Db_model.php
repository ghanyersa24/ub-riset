<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Db_model extends CI_Model
{

    public function select($table)
    {
        return true($this->db->order_by("created_at", 'DESC')->get($table)->result());
    }

    public function select_where($table, $data)
    {
        $query = $this->db->where($data)->order_by("created_at", 'DESC')->get($table);
        if ($this->db->affected_rows() !== 0) {
            return true($query->result());
        } else {
            return false();
        }
    }

    public function select_like($table, $data, $like)
    {
        $query = $this->db->where($data)->like($like)->order_by("created_at", 'DESC')->get($table);
        if ($query) {
            return true($query->result());
        } else {
            return false();
        }
    }

    public function select_limit($table, $limit)
    {
        return true($this->db->limit($limit)->order_by("created_at", 'DESC')->get($table)->result());
    }

    public function select_one($table, $data)
    {
        $query = $this->db->where($data)->order_by("created_at", 'DESC')->get($table);
        if ($query) {
            return true($query->row());
        } else {
            return false();
        }
    }

    public function insert($table, $data)
    {
        $query = $this->db->insert($table, $data);
        if ($query) {
            return true($query);
        } else {
            return false();
        }
    }

    public function insert_any($table, $data)
    {
        $query = $this->db->insert_batch($table, $data);
        if ($query) {
            return true($query);
        } else {
            return false();
        }
    }

    public function update($table, $where, $data)
    {
        $query = $this->db->where($where)->update($table, $data);
        // if ($this->db->affected_rows() !== 0) {
        return true($query);
        // } else {
        //     return false();
        // }
    }

    public function delete($table, $where)
    {
        $query = $this->db->where($where)->delete($table);
        if ($this->db->affected_rows() !== 0) {
            return true($query);
        } else {
            return false();
        }
    }
}

/* End of file db_model.php */
/* Location: ./application/models/db_model.php */
