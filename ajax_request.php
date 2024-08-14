<?php
    $ar = [];
    if(!empty($_POST)){
        $ar['msg'] = 'success';
        echo json_encode($ar);exit;
    }else{
        echo json_encode(['msg' => 'no']);exit;
    }
?>