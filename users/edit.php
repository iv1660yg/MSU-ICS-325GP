<?php  

//edit.php

include('database_connection.php');

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$data = array(
 ':firstname'  => $form_data->firstname,
 ':lastname'  => $form_data->lastname,
 ':password'  => $form_data->password,
 ':title'  => $form_data->title,
 ':primary_phone'  => $form_data->primary_phone,
 ':email'  => $form_data->email,
 ':account_type'  => $form_data->account_type,
 ':user_id'    => $form_data->user_id
);

$query = "
 UPDATE users 
 SET firstname = :firstname, lastname = :lastname, password = md5(:password), title = :title, primary_phone = :primary_phone, email = :email, account_type = :account_type   
 WHERE user_id = :user_id
";

$statement = $connect->prepare($query);
if($statement->execute($data))
{
 $message = 'Data Edited';
}

$output = array(
 'message' => $message
);

echo json_encode($output);

?>