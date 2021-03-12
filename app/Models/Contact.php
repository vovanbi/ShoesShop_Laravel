<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table ='contacts';
    protected $guarded=['*'];
    const ON =1;
    const OFF =0;
    protected $status = [
        1=>[
            'name'=>'Đã xủ lý',
            'class'=>'label-success'
        ],
        0=>[
            'name'=>'Chưa xủ lý',
            'class'=>'label-default'
        ]
    ];
    public function getStatus()
    {
        return data_get($this->status,$this->c_status,'[N\A]');
    }
}
