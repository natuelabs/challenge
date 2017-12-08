<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'third_party/Curl/autoload.php';
use \Curl\Curl as Curl;

class Client extends CI_Controller
{
    private $curl;

    public function __construct()
    {
        parent::__construct();
        $this->curl = new Curl();
    }

    public function index()
    {
        $this->load->view('home');
    }

    public function view_products($sort = null, $order = null)
    {
        if (null == $sort) {
            $sort = 'id';
        }

        if (null == $order) {
            $order = 'asc';
        }

        if ($this->input->input_stream('spec') !== null) {
            $spec_array = $this->input->input_stream('spec');
            $spec = implode(',', $spec_array);
        } else {
            $spec_array = array();
            $spec = "*";
        }
        $view['specs'] = $spec_array;

        $this->curl->get(base_url() . "api/products?sort=$sort&order=$order&spec=$spec");
        if ($this->curl->error) {
            $view['message'] = 'Error: ' . $this->curl->errorCode . ': ' . $this->curl->errorMessage . "\n";
            $view['products'] = array();
        } else {
            $view['products'] = empty($this->curl->response)?array():$this->curl->response;
        }
        //print_r($this->curl);exit;
        
        $view['sort_order'] = $sort . '/' . $order;
        $this->load->view('products', $view);
    }

    public function specs()
    {
        $this->curl->get(base_url() . 'api/specs');
        header('Content-Type: application/json; utf-8');
        echo json_encode($this->curl->response);
        exit;
    }

    public function view_product($product_id = 0)
    {
        if (is_numeric($product_id) && $product_id > 0) {
            $response = $this->curl->get(base_url() . 'api/product/' . $product_id);

            $view['products'] = $response->body;
            $this->load->view('products', $view);
        }

    }
}
