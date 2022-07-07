<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
    
    public function index(){
        redirect('https://launchproperty.net/clusterbaru/');
    }
    
    public function project($id_name){
        // $data['marketing'] = $this->home->get_one("marketing", ["id_name" => $id_name, "project" => $project]);
        $data['marketing'] = $this->home->get_one("marketing", ["id_name" => $id_name]);
        if($data['marketing']){

            $replace_wa = array(
                ' ' => '%20',
                '"' => '%22'
            );

            $nama_panggilan = str_replace(array_keys($replace_wa), $replace_wa, $data['marketing']['nama_panggilan']);

            // if($project == "emeralda-kolmas"){
                $data['link_wa'] = "https://wa.me/{$data['marketing']['no_wa']}?text=Halo%20{$data['marketing']['panggilan']}%20{$nama_panggilan}%2C%20Info%20Gathering%20New%20Cluster%20Emeralda%20Resort%20Bersama%20Merry%20Riana";
            // }

            $this->load->view("project", $data);
        } else {
            redirect('https://launchproperty.net/clusterbaru/');
        }
    }}

    // Mau tau info gathering di emeralda kolmas
/* End of file Transaksi.php */
