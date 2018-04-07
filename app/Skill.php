<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Skill
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Skill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Skill whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Skill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Skill whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Skill whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Skill extends Model
{
    //
}
