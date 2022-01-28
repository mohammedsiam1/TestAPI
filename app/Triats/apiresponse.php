<?php
namespace App\Triats;

trait apiresponse{


    public  $paginateNumber=10;




public function apiresponse($data=null, $error=null, $cood=200){

    $array=[

        'data'=>$data,
        'status'=> in_array($cood,$this->succsess()) ? true : false,
        'error'=>$error,
    ];

    return response($array,$cood);
}
    public function succsess(){
        return[
            200,201,202
        ];

}

public function notfound(){
    return $this->apiresponse(null,'not found',422);
}

}
