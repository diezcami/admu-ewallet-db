<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**)
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Item_Controller extends REST_Controller {

   /**
    * This method returns a single item
    *
    * @post_params: item_number
    * @output: JSON of user
    */
   function item_post() {
        $item_number = $this->post('item_number');
        $this->load->model('Item_Model');
        $data = $this->Item_Model->get_item($item_number);
        $this->response($data, 404);
   }

}



