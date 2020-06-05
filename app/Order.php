<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public int $id;

    public ?int $userId;

    public float $totalSum;

}
