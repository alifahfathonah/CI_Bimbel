<?php
class Pengajar_model extends CI_Model
{
    public $id_pengajar;
    public $nama_pengajar;
    public $jenis_kelamin;
    public $umur;
    public $id_mapel;

    public function insert(){
        $sql = sprintf("INSERT INTO pengajar VALUES('NULL', '%s', '%s', '%d', '%d')",
            $this->nama_pengajar,
            $this->jenis_kelamin,
            $this->umur,
            $this->id_mapel
        );
        $this->db->query($sql);
    }

    public function readall(){
        $sql = "SELECT * FROM pengajar LEFT JOIN mapel ON pengajar.id_mapel = mapel.id_mapel";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function readmapel(){
        $sql = "SELECT * FROM mapel ORDER BY id_mapel";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function update(){
        $sql = sprintf("UPDATE `pengajar` SET `nama_pengajar` = '%s', `jenis_kelamin` = '%s', `umur` = '%d', `id_mapel` = '%d' WHERE `pengajar`.`id_pengajar` = %d ",
            $this->nama_pengajar,
            $this->jenis_kelamin,
            $this->umur,
            $this->id_mapel,
            $this->id_pengajar
        );
        $this->db->query($sql);
    }

    public function delete(){
        $sql = sprintf("DELETE FROM pengajar ". "WHERE id_pengajar='%d'",
            $this->id_pengajar
        );
        $this->db->query($sql);
    }

    public function select($id){
        $query = $this->db->query("SELECT * FROM pengajar WHERE id_pengajar='$id'");
        return $query->row();
    }
}
