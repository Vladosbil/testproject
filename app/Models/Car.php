<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Car
 *
 * @property int $id
 * @property string $license_plate
 * @property string $driver_name
 * @property int|null $owner_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Park[] $parks
 * @property-read int|null $parks_count
 * @method static Builder|Car newModelQuery()
 * @method static Builder|Car newQuery()
 * @method static Builder|Car query()
 * @method static Builder|Car whereCreatedAt($value)
 * @method static Builder|Car whereDriverName($value)
 * @method static Builder|Car whereId($value)
 * @method static Builder|Car whereLicensePlate($value)
 * @method static Builder|Car whereOwnerId($value)
 * @method static Builder|Car whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Car extends Model
{
    public static function boot()
    {
        parent::boot();

        static::creating(function ($car) {
            if (auth()->check()) {
                $car->owner_id = auth()->user()->id;
            }
        });
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function parks()
    {
        return $this->belongsToMany(Park::class, 'park_car');
    }
}
