<?php
class Siswa_model extends CI_Model
{
    public $id_siswa;
    public $nama_siswa;
    public $jenis_kelamin;
    public $umur;
    public $sekolah_asal;
    public $kelas;

    public function insert(){
        $sql = sprintf("INSERT INTO siswa VALUES('NULL', '%s', '%s', '%d', '%s', '%d')",
            $this->nama_siswa,
            $this->jenis_kelamin,
            $this->umur,
            $this->sekolah_asal,
            $this->kelas
        );
        $this->db->query($sql);
    }

    public function read(){
        $sql = "SELECT * FROM siswa ORDER BY id_siswa";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function update(){
        $sql = sprintf("UPDATE `siswa` SET `nama_siswa` = '%s', `jenis_kelamin` = '%s', `umur` = '%d', `sekolah_asal` = '%s', `kelas` = '%d' WHERE `siswa`.`id_siswa` = %d ",
            $this->nama_siswa,
            $this->jenis_kelamin,
            $this->umur,
            $this->sekolah_asal,
            $this->kelas,
            $this->id_siswa
        );
        $this->db->query($sql);
    }

    public function delete(){
        $sql = sprintf("DELETE FROM siswa ". "WHERE id_siswa='%d'",
            $this->id_siswa
        );
        $this->db->query($sql);
    }

    public function select($id){
        $query = $this->db->query("SELECT * FROM siswa WHERE id_siswa='$id'");
        return $query->row();
    }
}
