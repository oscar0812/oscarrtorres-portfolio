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
 * @property int $skill_group_id
 * @property int $progress
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property User $user
 * @property SkillGroup $skill_group
 *
 * @package App\Models
 */
class Skill extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    protected $table = 'skills';

    protected $casts = [
        'user_id' => 'int',
        'skill_group_id' => 'int',
        'progress' => 'int'
    ];

    protected $fillable = [
        'user_id',
        'name',
        'skill_group_id',
        'progress'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skill_group()
    {
        return $this->belongsTo(SkillGroup::class);
    }
}
