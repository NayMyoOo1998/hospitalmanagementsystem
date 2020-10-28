<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;

class Group extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'is_active',
        'type_id',
    ];

    public function type(){
        return $this->belongsTo(Type::class);
    }
}
