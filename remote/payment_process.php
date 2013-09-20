<?php

include('../fn.requests.php');
include('../classes/registry.php');

/* Enable for Test payment */
$IsTestMode = 'Y';

/* Enable for Real payment */
//$IsTestMode = 'N';
  
// Switch between test and live API
if ($IsTestMode == 'Y') {
	$request_url = 'https://test-api.pin.net.au/1/charges';
	$auth = array('oEvOE769deZ158zn-mEH2Q' );
} else {
	$request_url = 'https://api.pin.net.au/1/charges';
	$auth = array('sNzW_avmQohQhqqmUC0xNA' );
}

$payment_description = $_REQUEST['prod_description'];

$data = array();
$data['email'] = $_REQUEST['cust_email'];
$data['description'] = $_REQUEST['prod_description'];
$data['amount'] = strval($_REQUEST['amount']*100); //cents !
$data['currency'] = 'AUD';
$data['ip_address'] = '202.52.238.162';


$card = array(  'number' => $_REQUEST['card_no'],
                'expiry_month' => $_REQUEST['expiry_month'],
                'expiry_year' => $_REQUEST['expiry_year'], //Dirty, but works for the next 87 years
                'cvc' => $_REQUEST['cvc'],
                'name' => $_REQUEST['name_on_card'],
                'address_line1' => $_REQUEST['address_line1'],
                'address_city' => $_REQUEST['address_city'],
                'address_postcode' => $_REQUEST['address_postcode'],
                'address_state' => $_REQUEST['address_state'],
                'address_country' => $_REQUEST['address_country']);
$data['card'] = $card;



$http_response = fn_https_request("POST", $request_url , $data, "", "", "", "", "", "", "", $auth);


Registry::set('log_cut_data', array('name', 'number', 'expiry_month', 'expiry_year', 'cvc'));

//print_r($http_response);


$return = $http_response[1];
$return = json_decode($return);

	if($return->response->success == '1')
		{
		echo '[{"response":"payment_success","msg_type":"success","msg":"Payment success."}]';	
		exit;		
		}
	else{
		echo '[{"response":"payment_failed","msg_type":"error","msg":"Payment Failed."}]';	
		exit;		
	
	}	

/*print_r($return->response);
//exit;

echo '----------------------------';
echo $success = $return->response->success;
echo $amount = $return->response->amount;
echo $transaction_id = $return->response->token;

*/



/*curl https://test-api.pin.net.au/1/cards -u your-secret-api-key: -d "number=5520000000000000" -d "expiry_month=05" -d "expiry_year=2013" -d "cvc=123" -d "name=Roland Robot" -d "address_line1=42 Sevenoaks St" -d "address_line2=" -d "address_city=Lathlain" -d "address_postcode=6454" -d "address_state=WA" -d "address_country=Australia"
*/

?>