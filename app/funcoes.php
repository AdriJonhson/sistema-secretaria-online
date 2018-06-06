<?php 

    function tratarData($data){

        $dataArray = explode("-", $data);
        $novaData  = $dataArray[2] . "/" . $dataArray[1] . "/" . $dataArray[0];
        return $novaData;
        
    }