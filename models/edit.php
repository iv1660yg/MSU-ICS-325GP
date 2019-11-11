<?php  

//edit.php

include('database_connection.php');

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$data = array(
 ':model_number'  => $form_data->model_number,
 ':model_name'  => $form_data->model_name,
 ':category_type'  => $form_data->category_type,
 ':model_status'  => $form_data->model_status,
 ':supplier_id'  => $form_data->supplier_id,
 ':model_id'    => $form_data->model_id
);

$query = "
 UPDATE model 
 SET model_number = :model_number, model_name = :model_name, category_type = :category_type, model_status = :model_status, supplier_id = :supplier_id  
 WHERE model_id = :model_id
";

$statement = $connect->prepare($query);
if($statement->execute($data))
{
 $message = 'Data Edited';
}else {
    
    $message = 'Error unable to edit data';

}


$output = array(
 'message' => $message
);

echo json_encode($output);

?>