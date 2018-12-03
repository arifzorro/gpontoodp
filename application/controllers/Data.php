<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('data_model');
        $this->load->model('vendor_model');
        $this->load->model('data_gpon_model');
        $this->load->helper('datatable');
        $this->load->library('datatables');
    }

    public function not_allowed() {
        $this->load->view('not_allowed');
    }

    public function index() {

        if ($this->input->is_ajax_request()) {
            $from_tgl   = $this->input->post('from_tgl');
            $to_tgl     = $this->input->post('to_tgl');
            $filter = (object) array(
                'from_tgl' => !empty_or_null($from_tgl) ? set_date($from_tgl) : null,
                'to_tgl' => !empty_or_null($to_tgl) ? set_date($to_tgl) : (!empty_or_null($from_tgl) ? set_date($from_tgl) : null),
            );
            return print_r($this->data_gpon_model->get_all_dt($filter));
        } else {
            $this->render('data/index');
        }
    }

    public function create() {
        $this->data['vendor'] = $this->vendor_model->get(1);
        //var_dump($this->vendor_model->get(1));
        $this->render('data/form');
    }
//    public function inputsoal(){
//        //$this->data['vendor'] = $this->vendor_model->get(1);
//     //   dd($this->data['vendor']);
//      //  var_dump($this->vendor_model->get(1));
//       $this->render('data/formsoal');
//    }

    public function inputdatagpon(){
        //$this->data['vendor'] = $this->vendor_model->get(1);
        //   dd($this->data['vendor']);
        //  var_dump($this->vendor_model->get(1));
        $this->render('data/formgpon');
    }


    public function edit($id) {
        //dd($id);
        //CODE RAMA
//        $this->data['data'] = $this->data_model->with_vendor()->get($id);
//        $this->data['vendor'] = $this->data['data']->vendor;
//        $this->render('data/formsoal');
       //var_dump($id);
        //maksudnya
       $this->data['data'] = $this->data_gpon_model->get($id);
      //  var_dump($this->data['data']);
        //$this->data['vendor'] = $this->data['data']->vendor;
        //var_dump($this->data['vendor']);
        $this->render('data/formgpon');
    }

    public function _fetch_data($is_add_state) {
        $data = $this->input->post();

        $data['tanggal'] = set_date($data['tanggal']);
        $data = array_merge($data, user_timestamps($is_add_state));
        //dd($data);
        return $data;
    }

    public function save($id = null) {
        $is_add_state = is_null($id);
        $data = $this->_fetch_data($is_add_state);
        //$kategori=$_POST['']
       // $dd($data);
       //   dd($id);
        //dd($is_add_state);
        if ($is_add_state) {

            $is_success = $this->data_gpon_model->insert($data);
        } else {
            $is_success = $this->data_gpon_model->update($data, $id);
        }
        var_dump('akses');
        if ($is_success) set_flash_message( "Data telah tersimpan.");
        else set_flash_message("Data gagal tersimpan.", 'error');

        if ($is_add_state) redirect(base_url('data/inputdatagpon'));
        else redirect(base_url('data'));
    }

    public function delete($id) {
        $success = $this->data_gpon_model->delete(array('id' => $id));
        if ($success === FALSE) {
            return NULL;
        } else {
            echo "Data berhasil dihapus.";
        }
    }

}