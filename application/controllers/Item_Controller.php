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
    * This method returns all items
    * TODO: Use last_updated_TS
    *
    * @post_params: none
    * @output: JSON containing users
    */
   function items_post() {
        // $id_number = $this->post('id_number'); 
        $this->load->model('Item_Model');
        $data = $this->Item_Model->get_items();
        $this->response($data, 404);
   }

}



