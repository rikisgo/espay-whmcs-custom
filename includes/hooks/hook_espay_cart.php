<?php
/**
 * Example Hook Function
 * By Riki Ari Andri Yani
 */

if (!defined("WHMCS"))
    die("This file cannot be accessed directly");

add_hook('ClientAreaPage', 1, function($templateVariables)
{

	if($templateVariables["filename"] == "viewinvoice" AND $templateVariables["paymentSuccess"] == false)
    {
		if ((($templateVariables['status'] == "Unpaid" && isset($_SESSION['orderdetails'])) && $_SESSION['orderdetails']['InvoiceID'] == $templateVariables['invoiceid']) && !$_SESSION['orderdetails']['paymentcomplete']) {

			$value = htmlspecialchars_decode($_SERVER['REQUEST_URI']);
			$output = parse_url($value);
			$query = $output['query'];
			parse_str($query, $arrurl);
			$product_code = $arrurl['espay'];

			if(Espay_Utils::isPending($product_code)){
				redir("a=complete", "pendingpage.php");
			}else{
				redir("a=complete", "failpage.php");
			}

		}

		// else if($afterPay === true && $templateVariables['status'] == "Paid"){

		// 	$_SESSION['orderdetails']['paymentcomplete'] = true;
		// 	$_SESSION['afterPay'] = false;

		// 	redir("a=complete", "cart.php");

		// }else if($afterPay === true && $templateVariables['status'] == "Unpaid"){
		// 	$_SESSION['orderdetails']['paymentcomplete'] = true;
		// 	$_SESSION['afterPay'] = false;

		// 	redir("a=complete", "failpage.php");

		// }


        // store variables to send to the addon module file.
        // $_SESSION['bemasTransactionDetails'] = $templateVariables["invoiceid"];

        // redirect to addon page ????
        //header('location: google.com');
        //die;
    }
});