<?php

namespace App\Controllers;

class Soap {
    protected $soap;

    public function __construct()
    {
        $this->soap = new \SoapClient("https://test.fidely.net/fnet3web/proxy/wsdl_pz.php?v=01.19");
    }

    protected function allFunctionsSoap() {
        echo "<pre>";
        var_dump($this->soap->__getFunctions()); 
        var_dump($this->soap->__getTypes());
        echo "</pre>";
        die();
    }
}