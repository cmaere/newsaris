<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class section extends Model
{

    public function selectQuery($sql_stmt) {
        return DB::select($sql_stmt);
    }
	public function getsections($regno)
	{
		$query = "SELECT DISTINCT sectionpage, sectionname, icon FROM `functions` 
 INNER JOIN cha_rights ON (functions.id = cha_rights.functionid)
 INNER JOIN sectionsName ON (functions.sectionpage = sectionsName.id)
 WHERE cha_rights.RegNo = '$regno'";
 
 		return $this->selectQuery($query);
		
	}
	public function getsubsections($sectionpage)
	{
		$query = "SELECT functionName FROM `functions`
			   	INNER JOIN functionName ON (functions.function = functionName.id)
			   	WHERE functions.sectionpage ='$sectionpage'";
				return  $this->selectQuery($query);
	}
    
}
