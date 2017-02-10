<?php
/**
 *
 * @ WHMCS FULL DECODED & NULLED
 *
 * @ Version  : 5.2.15
 * @ Author   : MTIMER
 * @ Release on : 2013-12-24
 * @ Website  : http://www.mtimer.cn
 *
 **/
define("CLIENTAREA", true);
require "init.php";
require "includes/orderfunctions.php";
require "includes/domainfunctions.php";
require "includes/whoisfunctions.php";
require "includes/configoptionsfunctions.php";
require "includes/customfieldfunctions.php";
require "includes/clientfunctions.php";
require "includes/invoicefunctions.php";
require "includes/processinvoices.php";
require "includes/gatewayfunctions.php";
require "includes/modulefunctions.php";
require "includes/ccfunctions.php";
require "includes/cartfunctions.php";

initialiseClientArea(null, null, null);
// checkContactPermission("orders");

$a = $whmcs->get_req_var("a");
// $orderfrm = new WHMCS_OrderForm();

$templatefile = "/failed.tpl";

$transaction_detail = $_SESSION['orderdetails'];

$smartyvalues = array_merge($smartyvalues, array("orderid" => $orderid, "ordernumber" => $transaction_detail['OrderNumber'], "invoiceid" => $invoiceid, "ispaid" => $transaction_detail['paymentcomplete'], "amount" => $amount, "paymentmethod" => $paymentmethod, "clientdetails" => getClientsDetails($_SESSION['uid'])));

// $smarty->assign("message", $_LANG['forwardingtogateway']);
// $smarty->assign("code", $paymentbutton);
// $smarty->assign("invoiceid", $invoiceid);
// $addons_html = run_hook("ShoppingCartCheckoutCompletePage", $smartyvalues);
// $smartyvalues['addons_html'] = $addons_html;

outputClientArea($templatefile);

unset($_SESSION['orderdetails']);

?>