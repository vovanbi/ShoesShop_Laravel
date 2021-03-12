<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = [''];
    const STATUS_PUBLIC =1;
    const STATUS_PRIVATE =0;
    const HOME_PUBLIC =1;
    const HOME_PRIVATE =0;

    protected $status = [
        1=>[
            'name'=>'Public',
            'class'=>'label-danger'
        ],
        0=>[
            'name'=>'Private',
            'class'=>'label-default'
        ]
    ];
    public function getStatus()
    {
        return data_get($this->status,$this->c_active,'[N\A]');
    }
    protected $home = [
        1=>[
            'name'=>'Public',
            'class'=>'label-primary'
        ],
        0=>[
            'name'=>'Private',
            'class'=>'label-default'
        ]
    ];
    public function getHome()
    {
        return data_get($this->home,$this->c_home,'[N\A]');
    }
    public function products()
    {
        return $this->hasMany(Product::class,'pro_category_id');
    }
}
