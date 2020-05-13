<?php
class Mapel_model extends CI_Model
{
    public $id_mapel;
    public $nama_mapel;
    public $kelas;

    public function insert(){
        $sql = sprintf("INSERT INTO mapel VALUES('NULL', '%s', '%d')",
            $this->nama_mapel,
            $this->kelas
        );
        $this->db->query($sql);
    }

    public function read(){
        $sql = "SELECT * FROM mapel ORDER BY id_mapel";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function update(){
        $sql = sprintf("UPDATE `mapel` SET `nama_mapel` = '%s', `kelas` = '%d' WHERE `mapel`.`id_mapel` = %d ",
            $this->nama_mapel,
            $this->kelas,
            $this->id_mapel
        );
        $this->db->query($sql);
    }

    public function delete(){
        $sql = sprintf("DELETE FROM mapel ". "WHERE id_mapel='%s'",
            $this->id_mapel
        );
        $this->db->query($sql);
    }

    public function select($id){
        $query = $this->db->query("SELECT * FROM mapel WHERE id_mapel='$id'");
        return $query->row();
    }
}
