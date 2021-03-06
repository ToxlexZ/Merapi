<?php
class Home extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->library('encryption');
    }

    function index()
    {
        $data['m_promo'] = $this->Home_model->get_all_m_promo();
        $data['m_promo_special'] = $this->Home_model->get_all_m_promo_special();
        
        for ($i=0; $i < count($data['m_promo']); $i++) { 
            $datacoma = explode(",", $data['m_promo'][$i]['isi_promo']);
            for ($j=0; $j < count($datacoma) ; $j++) { 
                $datacoma[$j] = '<li><span class="glyphicon glyphicon-ok"></span>'.$datacoma[$j].'</li>';
            }
            $data['m_promo'][$i]['isi_promo'] = implode($datacoma);
        }
        for ($i=0; $i < count($data['m_promo_special']); $i++) { 
            $datacoma = explode(",", $data['m_promo_special'][$i]['isi_promo']);
            for ($j=0; $j < count($datacoma) ; $j++) { 
                $datacoma[$j] = '<li><span class="glyphicon glyphicon-ok"></span>'.$datacoma[$j].'</li>';
            }
            $data['m_promo_special'][$i]['isi_promo'] = implode($datacoma);
        }
        $data['m_photo_atas'] = $this->Home_model->get_all_m_photo_atas();
        for ($i=0; $i < count($data['m_photo_atas']) ; $i++) {
            $data['m_photo_atas'][$i]['file_photo_thumbs'] = str_replace('.','_thumb.', $data['m_photo_atas'][$i]['file_photo']);
        }
        $data['m_photo_bawah'] = $this->Home_model->get_all_m_photo_bawah();
        for ($i=0; $i < count($data['m_photo_bawah']) ; $i++) {
            $data['m_photo_bawah'][$i]['file_photo_thumbs'] = str_replace('.','_thumb.', $data['m_photo_bawah'][$i]['file_photo']);
        }
        $this->load->view('home', $data);
    }
    function jsoff()
    {
        $this->load->view('jsoff');
    }
}
