<?php  

//insert.php

include('database_connection.php');

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$data = array(
    ':supplier_name'  => $form_data->supplier_name,
    ':phone_number'  => $form_data->phone_number,
    ':street'  => $form_data->street,
    ':city'  => $form_data->city,
    ':state'  => $form_data->state,
    ':zip'  => $form_data->zip

);

$query = "
 INSERT INTO supplier 
 (supplier_name, phone_number, street, city, state, zip ) VALUES 
 (:supplier_name, :phone_number, :street, :city, :state, :zip )
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