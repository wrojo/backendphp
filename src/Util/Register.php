<?php 

namespace App\Util;



class Register
{
    /**
     * setCommonData static method
     *
     * @param Obj Request.
     * @param User Login Id.
     * @return Array
     */    
    public static function setCommonData($request,$user_id){
        $ip = $request->clientIp();
        $date = new \DateTime('NOW');
        $data = array();
        if($user_id) = $data['created_id'] = $user_id; 
        if($user_id) = $data['modified_id'] = $user_id;
        $data['modified_ip'] = $ip;
        $data['created_ip'] = $ip;
        $data['created_date'] = $date->format('Y-m-d');
        $data['modified_date'] = $date->format('Y-m-d');
        return $data;
    }

}
?>