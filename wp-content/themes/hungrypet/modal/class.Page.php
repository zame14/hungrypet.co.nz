<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 8/29/2022
 * Time: 10:43 AM
 */
class Page extends PetBase
{
    public function getCustomField($field)
    {
        return $this->getPostMeta($field);
    }
}