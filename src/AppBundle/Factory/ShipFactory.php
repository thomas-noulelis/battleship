<?php

namespace AppBundle\Factory;

/**
 * Ship Factory
 */
class ShipFactory
{

    public static function create($ship = null) {

        if(!is_null($ship)) {
            try {
                $name = "AppBundle\\Entity\\$ship";
                return new $name;
            } catch(Exception $e) {
                return false;
            }
        } else {
            return false;
        }
    }

}