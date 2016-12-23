<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utils
 *
 * @author Riki
 */
class Espay_Utils {

	/**
	 * Payment type to ensure realtime or non-realtime payment
	 */
	public static $pending_payment = array(
	        'ATM',
	        'FINPAY'
	);

    public static function isPending($neddle) {
        $product = $neddle;
        foreach (Espay_Utils::$pending_payment as $val) {
            $pattern = sprintf('/%s/i', $val);
        	if(preg_match($pattern, $product)){
            	return true;
            }
        }
        return false;
    }

}
