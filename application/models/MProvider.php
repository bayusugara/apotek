<?php
class MProvider extends CI_Model{
   function __construct(){
      parent::__construct();
   }
   function get_data($where = null)
   {
      $this_>db_>select('*');
      if($where != null){
         $this_>db_>where($-=[where)
      }
		$query = $this->db->>get('provider');
      return $query;
   }
}
?>