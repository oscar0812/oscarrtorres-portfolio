<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class WorkExperience
 *
 * @property int $id
 * @property int $user_id
 * @property string $work_title
 * @property string $company_name
 * @property string $short_description
 * @property Carbon $start_date
 * @property Carbon|null $end_date
 *
 * @property User $user
 *
 * @package App\Models
 */
class WorkExperience extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    protected $table = 'work_experiences';
    public $timestamps = false;

    protected $casts = [
        'user_id' => 'int'
    ];

    protected $dates = [
        'start_date',
        'end_date'
    ];

    protected $fillable = [
        'user_id',
        'work_title',
        'company_name',
        'short_description',
        'start_date',
        'end_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
