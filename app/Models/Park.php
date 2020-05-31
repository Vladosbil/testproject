<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Park
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string|null $schedule
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Car[] $cars
 * @property-read int|null $cars_count
 * @method static Builder|Park newModelQuery()
 * @method static Builder|Park newQuery()
 * @method static Builder|Park query()
 * @method static Builder|Park whereAddress($value)
 * @method static Builder|Park whereCreatedAt($value)
 * @method static Builder|Park whereId($value)
 * @method static Builder|Park whereName($value)
 * @method static Builder|Park whereSchedule($value)
 * @method static Builder|Park whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Park extends Model
{
    public function cars()
    {
        return $this->belongsToMany(Car::class, 'park_car');
    }
}
