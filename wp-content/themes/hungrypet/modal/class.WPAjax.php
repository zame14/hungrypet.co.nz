<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 7/21/2020
 * Time: 11:00 AM
 */
class WPAjax
{
    private $success = 0;
    private $error = 0;
    private $response = 0;

    function __construct($function)
    {
        if (method_exists($this, $function)) {
            // Runt he function
            $this->$function();
        } else {
            $this->error = 1;
            $this->response = 'Function not found for ' . $function;
        }
        echo $this->getResponse();
        session_write_close();
        exit;
    }

    public function getResponse()
    {
        // Prepare response array
        $json = Array(
            'success' => $this->success,
            'error' => $this->error,
            'response' => $this->response
        );
        $output = $json['response'];

        return $output;
    }
    private function updateBox()
    {
        $product_id = $_REQUEST['product_id'];
        $qty = $_REQUEST['qty'];
        $post = get_post($product_id);
        $product = new Product($post);

        // get the weight of the selection (weight * qty)
        $weight = ($product->getWeight() * $qty);

        //get the price of the selection (price * qty)
        $price = ($product->getPrice() * $qty);

        $this->response = $weight . '|' . $price;
    }
    private function setCookie()
    {
        setcookie('popup1', 1, strtotime("+1 year"), COOKIEPATH, COOKIE_DOMAIN);
        $this->response = 'cookie set';
    }
}