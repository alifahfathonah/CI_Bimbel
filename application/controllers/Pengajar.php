<?php
class Pengajar extends CI_Controller
{
    public $model = NULL;

    public function __construct(){
        parent::__construct();
        $this->load->model('Pengajar_model');
        $this->model = $this->Pengajar_model;
    }

    public function index(){
        $rows = $this->model->readall();
        $this->load->view('pengajar_view', ['rows'=>$rows]);
    }

    public function create(){
        if (isset($_POST['pengajar_submit'])){
            $this->model->nama_pengajar = $_POST['nama'];
            $this->model->jenis_kelamin = $_POST['jenis_kelamin'];
            $this->model->umur = $_POST['umur'];
            $this->model->id_mapel = $_POST['mapel'];
            $this->model->insert();
            redirect('pengajar');
        }else{
            $mapel_rows = $this->model->readmapel();
            $this->load->view('pengajar_add_view.php', ['mapel_rows'=>$mapel_rows]);
        }
    }

    public function delete($id){
        $this->model->id_pengajar = $id;
        $this->model->delete();
        redirect('pengajar');
    }

    public function update($id){
        if (isset($_POST['pengajar_submit'])){
            $this->model->id_pengajar = $_POST['id'];
            $this->model->nama_pengajar = $_POST['nama'];
            $this->model->jenis_kelamin = $_POST['jenis_kelamin'];
            $this->model->umur = $_POST['umur'];
            $this->model->id_mapel = $_POST['mapel'];
            $this->model->update();
            redirect('pengajar');
        }else{
            $row = $this->model->select($id);
            $mapel_rows = $this->model->readmapel();
            $this->model->id_pengajar = $row->id_pengajar;
            $this->model->nama_pengajar =$row->nama_pengajar;
            $this->model->jenis_kelamin = $row->jenis_kelamin;
            $this->model->umur = $row->umur;
            $this->model->id_mapel = $row->id_mapel;
            $this->load->view('pengajar_update_view.php', ['model'=>$this->model, 'mapel_rows'=>$mapel_rows]);
        }
    }
}
