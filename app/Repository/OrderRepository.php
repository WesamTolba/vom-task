<?php

namespace App\Repository;

use App\Models\Order;

class OrderRepository extends BaseRepository
{

    public function __construct(Order $order, $searchColumns = [], $selects = [])
    {
        parent::__construct($order);
    }

}
