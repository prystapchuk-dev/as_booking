<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'user_id',
    ];

    protected $table = 'offers';

    public function benefits()
    {
        return $this->belongsToMany(Benefit::class);
    }

    public function attachBenefits($benefits)
    {
        $this->benefits()->attach($benefits);
    }
}
