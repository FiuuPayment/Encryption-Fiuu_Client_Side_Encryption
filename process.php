<?php

  $orderid    = rand( 211111, 999999 );
  $currency   = "MYR";
  $amount     = "1.10";
  $email      = "john.doe@domain.com";
  $contact    = "867512963129";
  $cc_name    = "John Doe";
  $channel    = "CREDIT";

  $URL = "https://sandbox.merchant.razer.com/MOLPay/API/Direct/1.4.0/index.php";
  //$URL = "https://pay.merchant.razer.com/MOLPay/API/Direct/1.4.1/index.php"; // production
  $merchantID = "<merchantID>";
  $vkey = "<vkey>";

  $vcode = md5( $amount.$merchantID.$orderid.$vkey );

  $params = array(
            'MerchantID'        => $merchantID,
            'ReferenceNo'       => $orderid,
            'TxnType'           => 'SALS',
            'TxnChannel'        => $channel,
            'TxnCurrency'       => (isset($currency) ? $currency : 'MYR'),
            'TxnAmount'         => $amount,
            'CustName'          => $cc_name,
            'CustEmail'         => $email,
            'CustDesc'          => 'cust #',
            'Signature'         => $vcode,
            'CustContact'       => "136076110",
            'ReturnURL'			=> "https://apis17.requestcatcher.com/return.php",
            'CC_PAN'			=> $_POST['PAN'],
            'CC_CVV2'			=> $_POST['CVV'],
            'CC_MONTH'			=> $_POST['EXPMONTH'],
            'CC_YEAR'			=> $_POST['EXPYEAR']
        );
//echo "<pre>";
  //print_r($_POST);die;
  $params = http_build_query($params);
  $header[] = "Content-Type: application/x-www-form-urlencoded";

  $ch = curl_init( $URL );
  curl_setopt( $ch, CURLOPT_HTTPHEADER, $header);
  curl_setopt( $ch, CURLOPT_HEADER, 0);
  curl_setopt( $ch, CURLOPT_POST, 1);
  curl_setopt( $ch, CURLOPT_POSTFIELDS, $params);
  curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 0);
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE  );  // this line makes it work under https
  curl_setopt( $ch, CURLOPT_FRESH_CONNECT, 1);  // TRUE to force the use of a new connection instead of a cached one.
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
  $result = curl_exec( $ch );
  curl_close( $ch );
  
  //$response = json_decode($result,1);

  echo "<pre>";
  print_r($result);
  exit;
  
  if( !$response['MerchantID'] )
  {
    echo "<script>alert('".$response['error_desc']."');window.location.href = 'https://apis17.requestcatcher.com/checkout/';</script>";
    exit();
  }

  echo "<form id='form1' action='".$response['TxnData']['RequestURL']."' method='post'>\n";
  foreach ($response['TxnData']['RequestData'] as $key => $value) {
    echo "<input type='hidden' name='".$key."' value='".$value."' />\n";
  }
  echo "</form>\n";

  echo "<script>document.getElementById('form1').submit();</script>";
    
?>