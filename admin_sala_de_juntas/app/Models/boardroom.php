<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Boardroom
 *
 * @property $id
 * @property $available
 * @property $entry_time
 * @property $departure_time
 * @property $reserve
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Boardroom extends Model
{
    
    static $rules = [
		'available' => 'required',
		'entry_time' => 'required',
		'departure_time' => 'required',
		'reserve' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['available','entry_time','departure_time','reserve'];



}
