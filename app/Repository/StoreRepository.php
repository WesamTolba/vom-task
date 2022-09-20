<?php

namespace App\Repository;

use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Support\Str;

class StoreRepository extends BaseRepository
{

    public function __construct(Store $store, $searchColumns = [], $selects = [])
    {
        parent::__construct($store);
    }

}
