<?php

if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

require_once(dirname(__FILE__) . '/espay-pg/Espay.php');

/**
 * Define module related meta data.
 *
 * Values returned here are used to determine module related capabilities and
 * settings.
 *
 * @see http://docs.whmcs.com/Gateway_Module_Meta_Data_Parameters
 *
 * @return array
 */
function espay_MetaData() {
    return array(
        'DisplayName' => 'Espay Payment Gateway Module',
        'APIVersion' => '1.1',
        'DisableLocalCredtCardInput' => true,
        'TokenisedStorage' => true,
    );
}

/**
 * Define gateway configuration options.
 *
 * The fields you define here determine the configuration options that are
 * presented to administrator users when activating and configuring your
 * payment gateway module for use.
 *
 * Supported field types include:
 * * text
 * * password
 * * yesno
 * * dropdown
 * * radio
 * * textarea
 *
 * Examples of each field type and their possible configuration parameters are
 * provided in the sample function below.
 *
 * @return array
 */
function espay_config() {
    return array(
        // the friendly display name for a payment gateway should be
        // defined here for backwards compatibility
        'FriendlyName' => array(
            'Type' => 'System',
            'Value' => 'Espay Payment Gateway (Custom)',
        ),
        // a text field type allows for single line text input
        'espaymerchantkey' => array(
            'FriendlyName' => 'Merchant Key',
            'Type' => 'text',
            'Size' => '70',
            'Default' => '',
            'Description' => 'ID that used for partner identification',
        ),
        'espayprodlink' => array(
            'FriendlyName' => 'Production URL',
            'Type' => 'text',
            'Size' => '70',
            'Default' => 'https://<yourdomain>/espaysingle/paymentlist',
            'Description' => 'production link here',
        ),
        'espaydevlink' => array(
            'FriendlyName' => 'Development URL',
            'Type' => 'text',
            'Size' => '70',
            'Default' => 'http://<yourdomain>/espaysingle/paymentlist',
            'Description' => 'development link here',
        ),
        // a text field type allows for single line text input
        'espaysignature' => array(
            'FriendlyName' => 'Signature Key',
            'Type' => 'text',
            'Size' => '70',
            'Default' => '',
            'Description' => 'Your Signature Key here. Get it from Espay team',
        ),
        // a text field type allows for single line text input
        'espaypassword' => array(
            'FriendlyName' => 'Password',
            'Type' => 'password',
            'Size' => '70',
            'Default' => '',
            'Description' => 'Password that used for web service identification',
        ),
        // the dropdown field type renders a select menu of options
        'environment' => array(
            'FriendlyName' => 'Production Mode',
            'Type' => 'yesno',
            'Description' => 'Tick to allow real transaction, untick for testing transaction in sandbox mode',
        ),
        'BCAATM_fee' => array(
            'FriendlyName' => 'BCA VA Online Fee',
            'Type' => 'text',
            'Size' => '25',
            'Default' => 0,
            'Description' => 'Enter your BCA VA Online fee here',
        ),
        'BCAKLIKPAY_fee' => array(
            'FriendlyName' => 'BCA KlikPay Fee',
            'Type' => 'text',
            'Size' => '25',
            'Default' => 0,
            'Description' => 'Enter your BCA KlikPay fee here',
        ),
        'XLTUNAI_fee' => array(
            'FriendlyName' => 'XL TUNAI Fee',
            'Type' => 'text',
            'Size' => '25',
            'Default' => 0,
            'Description' => 'Enter your XL TUNAI fee here',
        ),
        'BIIATM_fee' => array(
            'FriendlyName' => 'ATM MULTIBANK Fee',
            'Type' => 'text',
            'Size' => '25',
            'Default' => 0,
            'Description' => 'Enter your ATM MULTIBANK fee here',
        ),
        'BNIDBO_fee' => array(
            'FriendlyName' => 'BNI Debit Online Fee',
            'Type' => 'text',
            'Size' => '25',
            'Default' => 0,
            'Description' => 'Enter your BNI Debit Online fee here',
        ),
        'EPAYBRI_fee' => array(
            'FriendlyName' => 'e-Pay BRI',
            'Type' => 'text',
            'Size' => '25',
            'Default' => 0,
            'Description' => 'Enter your e-Pay BRI fee here',
        ),
        'BRIATM_fee' => array(
            'FriendlyName' => 'BRI ATM Fee',
            'Type' => 'text',
            'Size' => '25',
            'Default' => 0,
            'Description' => 'Enter your BRI ATM fee here',
        ),
        'DANAMONOB_fee' => array(
            'FriendlyName' => 'Danamon Online Banking Fee',
            'Type' => 'text',
            'Size' => '25',
            'Default' => 0,
            'Description' => 'Enter your Danamon Online Banking fee here',
        ),
        'DANAMONATM_fee' => array(
            'FriendlyName' => 'ATM Danamon Fee',
            'Type' => 'text',
            'Size' => '25',
            'Default' => 0,
            'Description' => 'Enter your ATM Danamon fee here',
        ),
        'DKIIB_fee' => array(
            'FriendlyName' => 'DKI IB Fee',
            'Type' => 'text',
            'Size' => '25',
            'Default' => 0,
            'Description' => 'Enter your DKI IB fee here',
        ),
        'MANDIRISMS_fee' => array(
            'FriendlyName' => 'MANDIRI SMS Fee',
            'Type' => 'text',
            'Size' => '25',
            'Default' => 0,
            'Description' => 'Enter your MANDIRI SMS fee here',
        ),
        'FINPAY195_fee' => array(
            'FriendlyName' => 'Modern Channel Fee',
            'Type' => 'text',
            'Size' => '25',
            'Default' => 0,
            'Description' => 'Enter your Modern Channel fee here',
        ),
        'MANDIRIECASH_fee' => array(
            'FriendlyName' => 'MANDIRI E-CASH Fee',
            'Type' => 'text',
            'Size' => '25',
            'Default' => 0,
            'Description' => 'Enter your MANDIRI E-CASH fee here',
        ),
        'CREDITCARD_fee' => array(
            'FriendlyName' => 'Credit Card Visa / Master Fee',
            'Type' => 'text',
            'Size' => '25',
            'Default' => 0,
            'Description' => 'Enter your Credit Card Visa / Master fee here',
        ),
        'MANDIRIIB_fee' => array(
            'FriendlyName' => 'MANDIRI IB Fee',
            'Type' => 'text',
            'Size' => '25',
            'Default' => 0,
            'Description' => 'Enter your MANDIRI IB fee here',
        ),
        'MASPIONATM_fee' => array(
            'FriendlyName' => 'ATM MASPION Fee',
            'Type' => 'text',
            'Size' => '25',
            'Default' => 0,
            'Description' => 'Enter your ATM MASPION fee here',
        ),
        'MAYAPADAIB_fee' => array(
            'FriendlyName' => 'Mayapada Internet Banking Fee',
            'Type' => 'text',
            'Size' => '25',
            'Default' => 0,
            'Description' => 'Enter your Mayapada Internet Banking fee here',
        ),
        'MUAMALATATM_fee' => array(
            'FriendlyName' => 'MUAMALAT ATM Fee',
            'Type' => 'text',
            'Size' => '25',
            'Default' => 0,
            'Description' => 'Enter your MUAMALAT ATM fee here',
        ),
        'NOBUPAY_fee' => array(
            'FriendlyName' => 'Nobu Pay Fee',
            'Type' => 'text',
            'Size' => '25',
            'Default' => 0,
            'Description' => 'Enter your Nobu Pay fee here',
        ),
        'PERMATAATM_fee' => array(
            'FriendlyName' => 'PERMATA ATM Fee',
            'Type' => 'text',
            'Size' => '25',
            'Default' => 0,
            'Description' => 'Enter your PERMATA ATM fee here',
        ),
        'PERMATAPEB_fee' => array(
            'FriendlyName' => 'Permata ebusiness Fee',
            'Type' => 'text',
            'Size' => '25',
            'Default' => 0,
            'Description' => 'Enter your Permata ebusiness fee here',
        ),
        'PERMATANETPAY_fee' => array(
            'FriendlyName' => 'PermataNet Fee',
            'Type' => 'text',
            'Size' => '25',
            'Default' => 0,
            'Description' => 'Enter your PermataNet fee here',
        ),

            // the yesno field type displays a single checkbox option
//        'enable3ds' => array(
//            'FriendlyName' => 'Credit Card 3DS',
//            'Type' => 'yesno',
//            'Description' => 'Tick to enable 3DS for Credit Card payment',
//        ),
    );
}

/**
 * Payment link.
 *
 * Required by third party payment gateway modules only.
 *
 * Defines the HTML output displayed on an invoice. Typically consists of an
 * HTML form that will take the user to the payment gateway endpoint.
 *
 * @param array $params Payment Gateway Module Parameters
 *
 * @see http://docs.whmcs.com/Payment_Gateway_Module_Parameters
 *
 * @return string
 */
function espay_link($params) {

    // Gateway Configuration Parameters
    $espaymerchantkey = $params['espaymerchantkey'];
    $espaypassword = $params['espaypassword'];
    $espaysignature = $params['espaysignature'];
    $espaydevlink = $params['espaydevlink'];
    $espayprodlink = $params['espayprodlink'];
    $environment = $params['environment'];
//    $enable3ds = $params['enable3ds'];

    // Invoice Parameters
    $invoiceId = $params['invoiceid'];
    $description = $params["description"];
    $amount = $params['amount'];
    $currencyCode = $params['currency'];

    // Client Parameters
    $firstname = $params['clientdetails']['firstname'];
    $lastname = $params['clientdetails']['lastname'];
    $email = $params['clientdetails']['email'];
    $address1 = $params['clientdetails']['address1'];
    $address2 = $params['clientdetails']['address2'];
    $city = $params['clientdetails']['city'];
    $state = $params['clientdetails']['state'];
    $postcode = $params['clientdetails']['postcode'];
    $country = $params['clientdetails']['country'];
    $phone = $params['clientdetails']['phonenumber'];

    // System Parameters
    $companyName = $params['companyname'];
    $systemUrl = $params['systemurl'];
    $returnUrl = $params['returnurl'];
    $langPayNow = $params['langpaynow'];
    $moduleDisplayName = $params['name'];
    $moduleName = $params['paymentmethod'];
    $whmcsVersion = $params['whmcsVersion'];

    // Set configuration
    $config = Espay_Config::getInstance();
    $config->isProduction = ($environment == 'on') ? true : false;
    $config->espaypassword = $espaypassword;
    $config->espaymerchantkey = $espaymerchantkey;
    $config->espaysignature = $espaysignature;
    $config->developmentLink = $espaydevlink;
    $config->productionLink = $espayprodlink;

    // error_log($enable3ds); //debugan
    // Espay_Config::$is3ds = ($enable3ds == 'on') ? true : false;

    $paramsfee = $config->getFeeData($params);

    $seedForm = array(
        'key' => $espaymerchantkey,
        'backUrl' => $returnUrl,
        'orderId' => $invoiceId,
        'paramsfee' => json_encode($paramsfee)
    );

    $htmlOutput = '<form method="post" action="' . $config->getBaseUrl() . '">';
    foreach ($seedForm as $k => $v) {
        $htmlOutput .= "<input type='hidden' name='". $k . "' value='" . $v . "' />";
    }
    $htmlOutput .= '<input type="submit" value="' . $langPayNow . '" />';
    $htmlOutput .= '</form>';

    return $htmlOutput;
}
