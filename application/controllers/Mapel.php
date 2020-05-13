<?php
class Mapel extends CI_Controller
{
    public $model = NULL;

    public function __construct(){
        parent::__construct();
        $this->load->model('Mapel_model');
        $this->model = $this->Mapel_model;
    }

    public function index(){
        $rows = $this->model->read();
        $this->load->view('mapel_view', ['rows'=>$rows]);
    }

    public function delete($id){
        $this->model->id_mapel = $id;
        $this->model->delete();
        redirect('mapel');
    }

    public function create(){
        if (isset($_POST['mapel_submit'])){
            $this->model->nama_mapel = $_POST['nama_mapel'];
            $this->model->kelas = $_POST['kelas'];

            $this->model->insert();
            redirect('mapel');
        }else{
            $this->load->view("mapel_add_view.php");
        }
    }

    public function update($id){
        if (isset($_POST['mapel_submit'])){
            $this->model->id_mapel = $_POST['id_mapel'];
            $this->model->nama_mapel = $_POST['nama_mapel'];
            $this->model->kelas = $_POST['kelas'];
            $this->model->update();
            redirect('mapel');
        }else{
            $row = $this->model->select($id);
            $this->model->id_mapel = $row->id_mapel;
            $this->model->nama_mapel = $row->nama_mapel;
            $this->model->kelas = $row->kelas;
            $this->load->view('mapel_update_view', ['model'=>$this->model]);
        }
    }

}
