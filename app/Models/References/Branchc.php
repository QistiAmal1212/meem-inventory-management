<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class Branch extends Model
{
    use Sushi;

    protected $rows = [
        ['id' => 1, 'name' => 'Shah Alam'],
        ['id' => 2, 'name' => 'Bangi'],
        ['id' => 3, 'name' => 'Cheras'],
        ['id' => 4, 'name' => 'Penang'],
    ];
}
