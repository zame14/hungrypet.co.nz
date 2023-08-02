<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 7/17/2020
 * Time: 2:23 PM
 */
class Product extends PetBase
{
    public function getProductImage($size = 'full')
    {
        return get_the_post_thumbnail($this->Post, $size);
    }
    public function getFeatureImage($size = 'full')
    {
        return get_the_post_thumbnail($this->Post, $size);
    }
    public function getPrice()
    {
        $product = wc_get_product( $this->Post->ID );
        return $product->get_price();
    }
}