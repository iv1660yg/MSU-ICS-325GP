<?php  

//edit.php

include('database_connection.php');

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$data = array(
 ':supplier_name'  => $form_data->supplier_name,
 ':phone_number'  => $form_data->phone_number,
 ':street'  => $form_data->street,
 ':city'  => $form_data->city,
 ':state'  => $form_data->state,
 ':zip'  => $form_data->zip,
 ':supplier_id'    => $form_data->supplier_id
);

$query = "
 UPDATE supplier 
 SET supplier_name = :supplier_name, phone_number = :phone_number, street = :street, city = :city, state = :state, zip = :zip  
 WHERE supplier_id = :supplier_id
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