<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SkillGroup
 *
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection|Skill[] $skills
 *
 * @package App\Models
 */
class SkillGroup extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    protected $table = 'skill_groups';

    protected $fillable = [
        'name'
    ];

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
}
