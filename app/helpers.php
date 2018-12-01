<?php 
 
   function getIdByName($id,$table,$column){
   	  $query = DB::table($table)
   	  				->where('id', '=', $id)
   	  				->select($column)
   	  				->first();
   	  return $query->$column;
   }


?>