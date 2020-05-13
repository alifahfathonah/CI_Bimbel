<?php
class Siswa extends CI_Controller
{
    public $model = NULL;

    public function __construct(){
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->model = $this->Siswa_model;
    }

    public function index(){
        $rows = $this->model->read();
        $this->load->view('siswa_view', ['rows'=>$rows]);
    }

    public function create(){
        if (isset($_POST['siswa_submit'])){
            $this->model->nama_siswa = $_POST['nama'];
            $this->model->jenis_kelamin = $_POST['jenis_kelamin'];
            $this->model->umur = $_POST['umur'];
            $this->model->kelas = $_POST['kelas'];
            $this->model->sekolah_asal = $_POST['sekolah'];
            $this->model->insert();
            redirect('siswa');
        }else{
            $this->load->view("siswa_add_view.php");
        }
    }

    public function delete($id){
        $this->model->id_siswa = $id;
        $this->model->delete();
        redirect('siswa');
    }

    public function update($id){
        if (isset($_POST['siswa_submit'])){
            $this->model->id_siswa = $_POST['id'];
            $this->model->nama_siswa = $_POST['nama'];
            $this->model->jenis_kelamin = $_POST['jenis_kelamin'];
            $this->model->umur = $_POST['umur'];
            $this->model->kelas = $_POST['kelas'];
            $this->model->sekolah_asal = $_POST['sekolah'];
            $this->model->update();
            redirect('siswa');
        }else{
            $row = $this->model->select($id);
            $this->model->id_siswa = $row->id_siswa;
            $this->model->nama_siswa = $row->nama_siswa;
            $this->model->umur = $row->umur;
            $this->model->kelas = $row->kelas;
            $this->model->sekolah_asal = $row->sekolah_asal;
            $this->load->view('siswa_update_view', ['model'=>$this->model]);
        }
    }
}
