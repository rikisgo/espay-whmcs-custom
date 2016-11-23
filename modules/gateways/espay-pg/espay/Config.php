<?php

/**
 * Espay Configuration
 */
class Espay_Config {


    /**
     * @var Singleton The reference to *Singleton* instance of this class
     */
    private static $instance;

     /**
     * Returns the *Singleton* instance of this class.
     *
     * @return Singleton The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Your merchant's key
     * @static
     */
    public $espaymerchantkey;

    /**
     * Your merchant's password, define it by your self
     * @static
     */
    public $espaypassword;

    /**
     * Your merchant's signature key
     * @static
     */
    public $espaysignature;

    /**
     * true for production
     * false for sandbox mode
     * @static
     */
    public $isProduction = false;

    public $productionLink;

    public $developmentLink;

    public $fees = array();

    /**
     * Set it true to enable 3D Secure by default
     * @static

      public static $is3ds = false;
     */

    /**
     * Payment type to ensure realtime or non-realtime payment
     */
    public $product_code = array(

            'BCAATM',
            'BIIATM',
            'MASPIONATM',
            'MUAMALATATM',
            'BRIATM',
            'PERMATAATM',
            'BCAKLIKPAY',
            'EPAYBRI',
            'DANAMONOB',
            'DANAMONATM',
            'DKIIB',
            'MANDIRIIB',
            'MAYAPADAIB',
            'PERMATANETPAY',
            'PERMATAPEB',
            'XLTUNAI',
            'MANDIRIECASH',
            'NOBUPAY',
            'CREDITCARD',
            'BNIDBO',
            'FINPAY195',
            'MANDIRISMS'
        );

    /**
     * @return string Espay API URL, depends on $isProduction
     */
    public function getBaseUrl() {
        return $this->isProduction ?
                $this->productionLink : $this->developmentLink;
    }

    public function getFeeData($params){

        $result = array();
        foreach($this->product_code as $key){

            $result[$key] = $params[$key.'_fee'];
        }

        return $result;
    }

}
