<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosa extends CI_Controller {

    public function index()
    {
        $diagnosa = $this->Crud_model->listingOne('tbl_knowledge','gejala', 'G001');
        $penyakit = "";
        $data = array(
            'title'     => 'Manjemen Knowledge',
            'diagnosa'    => $diagnosa,
            'penyakit'    => $penyakit,
			'isi'       => 'diagnosa/list', );
		$this->load->view('layout/wrapper', $data, FALSE);
    }

    function proses($kode){
        $diagnosa_ex = $this->Crud_model->listingOne('tbl_knowledge','gejala', $kode);
        $penyakit = "";
        $jawaban_masuk = $this->input->post('jawab');
        if($jawaban_masuk == "0"){
            $penyakit = "";
            $kode_next = $diagnosa_ex->to_no;
            $jawaban =  $this->Crud_model->listingOne('tbl_knowledge', 'gejala', $kode_next);
            if(empty($jawaban)){
                $penyakit = $this->Crud_model->listingOne('tbl_penyakit','kode_penyakit', $kode_next);
                if(empty($penyakit)){
                    $penyakit = "Anda Tidak Terdiagnosa Gejala Malaria";
                }
            }
            //print_r($jawaban);die;
            
        }else if($jawaban_masuk == "1"){
            $kode_next = $diagnosa_ex->to_yes;
            $jawaban =  $this->Crud_model->listingOne('tbl_knowledge', 'gejala', $kode_next);
            $penyakit = "";
            if(empty($jawaban)){
                $penyakit = $this->Crud_model->listingOne('tbl_penyakit','kode_penyakit', $kode_next);
            }
            //print_r($kode_next);die;
        }

        $data = array(
            'title'     => 'Manjemen Knowledge',
            'diagnosa'  => $jawaban,
            'penyakit'  => $penyakit,
			'isi'       => 'diagnosa/list', );
		$this->load->view('layout/wrapper', $data, FALSE);

    }

}

/* End of file Diagnosa.php */
