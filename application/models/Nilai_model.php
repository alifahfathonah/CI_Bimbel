<?php
class Nilai_model extends CI_Model
{
    public $id_evaluasi;
    public $id_mapel;
    public $id_siswa;
    public $nilai;

    public function insert(){
        $sql = sprintf("INSERT INTO nilai_evaluasi VALUES('NULL', '%d', '%d', '%d')",
            $this->id_mapel,
            $this->id_siswa,
            $this->nilai
        );
        $this->db->query($sql);
    }

    public function readmapel(){
        $sql = "SELECT * FROM mapel ORDER BY id_mapel";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function readsiswa(){
        $sql = "SELECT * FROM siswa ORDER BY id_siswa";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function readall(){
        $sql = "SELECT * FROM nilai_evaluasi LEFT JOIN mapel ON nilai_evaluasi.id_mapel = mapel.id_mapel LEFT JOIN siswa ON nilai_evaluasi.id_siswa = siswa.id_siswa";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function update(){
        $sql = sprintf("UPDATE `nilai_evaluasi` SET `id_mapel` = '%d', `id_siswa` = '%d', `nilai` = '%d' WHERE `nilai_evaluasi`.`id_evaluasi` = %d ",
            $this->id_mapel,
            $this->id_siswa,
            $this->nilai,
            $this->id_evaluasi
        );
        $this->db->query($sql);
    }

    public function delete(){
        $sql = sprintf("DELETE FROM nilai_evaluasi ". "WHERE id_evaluasi='%d'",
            $this->id_evaluasi
        );
        $this->db->query($sql);
    }

    public function select($id){
        $query = $this->db->query("SELECT * FROM nilai_evaluasi WHERE id_evaluasi='$id'");
        return $query->row();
    }
}
