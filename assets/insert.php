<?php  

//insert.php

include('database_connection.php');

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$data = array(
    ':serialnumber'  => $form_data->serialnumber,
    ':model_id'  => $form_data->model_id,
    ':asset_status'  => $form_data->asset_status,
    ':user_id'  => $form_data->user_id,
    ':acquisition_method'  => $form_data->acquisition_method,
    ':unit_price'  => $form_data->unit_price,
    ':monthly_rental_price'  => $form_data->monthly_rental_price,
    ':warranty_start_date'  => $form_data->warranty_start_date,  
    ':warranty_end_date'  => $form_data->warranty_end_date,
    ':lease_end_date'  => $form_data->lease_end_date
);

$query = "
 INSERT INTO assets 
 (serialnumber, model_id, asset_status, user_id, acquisition_method,unit_price,  monthly_rental_price, warranty_start_date, warranty_end_date,lease_end_date) VALUES 
 (:serialnumber, :model_id, :asset_status, :user_id, :acquisition_method, :unit_price, :monthly_rental_price, :warranty_start_date, :warranty_end_date, :lease_end_date)
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