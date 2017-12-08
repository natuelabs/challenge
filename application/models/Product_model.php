<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{

    private $data_source;

    public function __construct()
    {
        parent::__construct();
        if (file_exists(APPPATH . 'db/products.json')) {
            $this->data_source = json_decode(file_get_contents(APPPATH . 'db/products.json'));
        } else {
            $this->data_source = array();
        }

    }

/*     public function get_data_source($key = "id", $order = "asc", $spec = "*")
    {
        eval('$response = $this->sort_' . $order . '($key);');
        $spec_array = explode(',', $spec);
        if ($spec != '*' && is_array($spec_array)) {
            $filtered = array_filter($response,
             function ($k) use ($spec_array) {
                $diff = array_diff($k->specifications, $spec_array );
                //echo "####".print_r($diff,1); 
                if(count($diff)>0) return false;
                return true;
            }
        );
            return $filtered;
        }

        return $response;
    } */
    
    
    public function get_data_source($key = "id", $order = "asc", $spec = "*")
    {
    	eval('$response = $this->sort_' . $order . '($key);');
    	$spec_array = explode(',', $spec);
    	if ($spec != '*' && is_array($spec_array)) {
    		$filtered = array_filter( $response,
    				function ($k) use ($spec_array) {
    					$isect = array_intersect($spec_array,$k->specifications );
    					//echo "####".print_r($diff,1);
    					if(count($isect)==count($spec_array)) return true;
    					return false;
    				}
    				);
    		return $filtered;
    	}
    
    	return $response;
    }
    
    

    public function get_specs()
    {
        $spec_array = array();
        $data_source = $this->data_source;
        array_walk($data_source,
            function ($k) use (&$spec_array) {
                $spec_array = array_merge($spec_array, $k->specifications);
            }
        );
        $specs = array_unique($spec_array);
        return array_values($specs);
    }

    private function sort_asc($key = null)
    {
        $array = $this->data_source;
        usort($array,
            function ($a, $b) use ($key) {
                return ($a->{$key} > $b->{$key});
            });
        return $array;
    }

    private function sort_desc($key = null)
    {
        $array = $this->data_source;
        usort($array,
            function ($a, $b) use ($key) {
                return ($a->{$key} < $b->{$key});
            });
        return $array;
    }
}
