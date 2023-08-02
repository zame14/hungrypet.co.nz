<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 8/6/2020
 * Time: 10:03 AM
 */
class LoyaltyScheme extends PetBase
{
    public function getUserID()
    {
        return $this->getPostMeta('loyalty-user-id');
    }
    public function getStartDate()
    {
        return $this->getPostMeta('loyalty-start-date');
    }
    public function getTotalSpent()
    {
        return $this->getPostMeta('loyalty-total');
    }
    public function getStatus()
    {
        return $this->getPostMeta('loyalty-status');
    }
    public function getCoupon()
    {
        return $this->getPostMeta('loyalty-coupon-code');
    }
    public function checkValidScheme()
    {

        if($this->getSchemeExpiryDate() >= strtotime(date('Y-m-d')))
        {
            return true;
        } else {
            return false;
        }
    }
    public function getSchemeExpiryDate()
    {
        // expiry date is 3 months from start date
        return strtotime($this->getStartDate() . '+3 months');
    }
    public function updateSchemeTotal($total)
    {
        $new_total = (floatval($this->getTotalSpent()) + floatval($total));
        update_post_meta($this->id(), 'wpcf-loyalty-total', $new_total);
    }
    public function updateStatus($status)
    {
        update_post_meta($this->id(), 'wpcf-loyalty-status', $status);
    }
    public function createCoupon($user_email)
    {
        $coupon_code = $this->getTitle();
        $coupon_code = strtolower($coupon_code);
        $coupon_code = str_replace(" ", "_", $coupon_code);
        $coupon_code .= '_coupon';
        $amount = get_option('coupon-amount');
        $coupon = array(
            'post_title' => $coupon_code,
            'post_content' => '$' . $amount . ' off coupon',
            'post_excerpt' => '$' . $amount . ' off coupon',
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type'     => 'shop_coupon'
        );
        $new_coupon_id = wp_insert_post( $coupon );
        // Add meta
        update_post_meta( $new_coupon_id, 'discount_type', 'fixed_cart' );
        update_post_meta( $new_coupon_id, 'coupon_amount', $amount );
        update_post_meta( $new_coupon_id, 'individual_use', 'yes' );
        update_post_meta( $new_coupon_id, 'product_ids', '' );
        update_post_meta( $new_coupon_id, 'exclude_product_ids', '' );
        update_post_meta( $new_coupon_id, 'usage_limit', '1' );
        update_post_meta( $new_coupon_id, 'usage_limit_per_user', '1' );
        update_post_meta( $new_coupon_id, 'expiry_date', '' );
        update_post_meta( $new_coupon_id, 'apply_before_tax', 'no' );
        update_post_meta( $new_coupon_id, 'free_shipping', 'no' );
        update_post_meta( $new_coupon_id, 'exclude_sale_items', 'no' );
        update_post_meta( $new_coupon_id, 'free_shipping', 'no' );
        update_post_meta( $new_coupon_id, 'product_categories', '' );
        update_post_meta( $new_coupon_id, 'exclude_product_categories', '' );
        update_post_meta( $new_coupon_id, 'minimum_amount', '' );
        update_post_meta( $new_coupon_id, 'customer_email', $user_email );

        update_post_meta($this->id(), 'wpcf-loyalty-coupon-code', $coupon_code);
    }
}