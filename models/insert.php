<?php  

//insert.php

include('database_connection.php');

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$data = array(
    ':model_number'  => $form_data->model_number,
    ':model_name'  => $form_data->model_name,
    ':category_type'  => $form_data->category_type,
    ':model_status'  => $form_data->model_status,
    ':supplier_id'  => $form_data->supplier_id,

);

$query = "
 INSERT INTO users 
 (model_number, model_name, category_type, model_status, supplier_id ) VALUES 
 (:model_number, :model_name, category_type, :model_status, :supplier_id )
";

$statement = $connect->prepare($query);

if($statement->execute($data))
{
 $message = 'Data Inserted';
}else {
    
    $message = 'Error unable to insert data';

}


$output = array(
 'message' => $message
);

echo json_encode($output);

?>