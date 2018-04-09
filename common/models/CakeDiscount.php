<?php

namespace common\models;

use yz\shoppingcart\DiscountBehavior;

class MyDiscount extends DiscountBehavior
{
    /**
     * @param CostCalculationEvent $event
     */
    public function onCostCalculation($event)
    {
        // Some discount logic, for example
        $event->discountValue = 100;
    }
}