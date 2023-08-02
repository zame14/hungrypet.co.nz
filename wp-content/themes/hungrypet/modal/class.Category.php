<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/14/2022
 * Time: 10:30 AM
 */
class Category
{
    public $Term = null;

    function __construct($term)
    {
        // If an ID is passed instead then change for a post array
        if(intval($term)) $term = get_term($term);
        $this->Term = $term;
    }
    public function id() {
        return $this->Term->term_id;
    }
    function getTermMeta($meta, $prefix = true) {
        if($prefix) $meta = 'wpcf-' . $meta;
        return get_term_meta($this->Term->term_id, $meta, true);
    }
    public function getTitle()
    {
        $title = $this->Term->name;
        return $title;
    }
    function isPrimary()
    {
        if($this->getTermMeta('primary-category') == 1)
        {
            return true;
        } else {
            return false;
        }
    }
    function getLogo()
    {
        return $this->getTermMeta('category-logo');
    }
}