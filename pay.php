<?php
  $purpose= $_POST['purpose'];    
  $name= $_POST['name'];
  $email= $_POST['email'];
  $amount= $_POST['amount'];

  include 'instamojo/Instamojo.php';
  $api = new Instamojo\Instamojo('test_d45dd8b7e02e7e44325bce1643b', 'test_24f77757f036f889f8764c76203', 'https://test.instamojo.com/api/1.1/');

  try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $purpose,
        "name" => $name,
        "amount" => $amount,
        "send_email" => true,
        "email" => $email,
        ));
        $pay_url=$response['longurl'];
        header("location:$pay_url");
  }
  catch (Exception $e) {
      print('Error: ' . $e->getMessage());
  }
?>
