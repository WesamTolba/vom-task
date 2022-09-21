<?php

namespace App\Repository;

use App\Models\Product;;

class ProductRepository extends BaseRepository
{

    public function __construct(Product $product, $searchColumns = [], $selects = [])
    {
        parent::__construct($product);
    }

}
