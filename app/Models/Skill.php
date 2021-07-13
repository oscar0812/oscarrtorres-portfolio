<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Skill
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property int $progress
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property User $user
 *
 * @package App\Models
 */
class Skill extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    protected $table = 'skills';

    protected $casts = [
        'user_id' => 'int',
        'progress' => 'int'
    ];

    protected $fillable = [
        'user_id',
        'name',
        'progress',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
