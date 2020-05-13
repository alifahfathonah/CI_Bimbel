<?php
class Nilai extends CI_Controller
{
    public $model = NULL;

    public function __construct(){
        parent::__construct();
        $this->load->model('Nilai_model');
        $this->model = $this->Nilai_model;
    }

    public function index(){
        $rows = $this->model->readall();
        $this->load->view('nilai_view', ['rows'=>$rows]);
    }

    public function create(){
        if (isset($_POST['nilai_submit'])){
            $this->model->id_mapel = $_POST['id_mapel'];
            $this->model->id_siswa = $_POST['id_siswa'];
            $this->model->nilai = $_POST['nilai'];
            $this->model->insert();
            redirect('nilai');
        }else{
            $mapel_rows = $this->model->readmapel();
            $siswa_rows = $this->model->readsiswa();
            $this->load->view('nilai_add_view.php', ['mapel_rows'=>$mapel_rows, 'siswa_rows'=>$siswa_rows]);
        }
    }

    public function delete($id){
        $this->model->id_evaluasi = $id;
        $this->model->delete();
        redirect('nilai');
    }

    public function update($id){
        if (isset($_POST['nilai_submit'])){
            $this->model->id_evaluasi = $_POST['id'];
            $this->model->id_mapel = $_POST['id_mapel'];
            $this->model->id_siswa = $_POST['id_siswa'];
            $this->model->nilai = $_POST['nilai'];
            $this->model->update();
            redirect('nilai');
        }else{
            $row = $this->model->select($id);
            $mapel_rows = $this->model->readmapel();
            $siswa_rows = $this->model->readsiswa();
            $this->model->id_evaluasi = $row->id_evaluasi;
            $this->model->id_mapel =$row->id_mapel;
            $this->model->id_siswa = $row->id_siswa;
            $this->model->nilai = $row->nilai;
            $this->load->view('nilai_update_view.php', ['model'=>$this->model, 'mapel_rows'=>$mapel_rows, 'siswa_rows'=>$siswa_rows]);
        }
    }
}
