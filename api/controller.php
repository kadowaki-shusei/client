<?php
require_once 'UserModel.php';

$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);


$reflectionClass = new UserModel();
$responseData = [];

if ($data["method"] === 'insert') {
    

    if ($data === null) {
        $responseData["error"] = 'Invalid JSON data';
    } else {
        $insert = $reflectionClass->insert($data);
        $responseData["body"] = $insert;
    }
    
} elseif ($data["method"] === 'list') {
    $customerList = $reflectionClass->List(); 
    $responseData["body"] = $customerList;

} elseif ($data["method"] === 'search') {
    if ($data === null) {
        $responseData["error"] = 'Invalid JSON date';
    } else {
        $search = $reflectionClass->search($data);
        $responseData["body"] = $search;
    }

}elseif ($data["method"] === 'detail') {
    $detail = $reflectionClass->detail($data["data"]);
    $responseData["body"] = $detail;

}elseif ($data["method"] === 'edit') {

    if ($data === null) {
        $responseData["error"] = 'Invalid JSON data';
    } else {
        $edit = $reflectionClass->edit($data);
        $responseData["body"] = $edit;
    }
}elseif ($data["method"] === 'delete') {
    $delete = $reflectionClass->delete($data['id']);
    $responseData["body"] = $delete;


}else {
    $responseData["error"] = "Unknown action";
}


echo json_encode($responseData);