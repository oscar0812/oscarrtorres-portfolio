<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CvEntry
 *
 * @property int $id
 * @property int $user_id
 * @property int $cv_section_id
 * @property string $title
 * @property string $place_name
 * @property string|null $short_description
 * @property Carbon|null $start_date
 * @property Carbon|null $end_date
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property User $user
 * @property CvSection $cv_section
 *
 * @package App\Models
 */
class CvEntry extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    protected $table = 'cv_entries';

    protected $casts = [
        'user_id' => 'int',
        'cv_section_id' => 'int'
    ];

    protected $dates = [
        'start_date',
        'end_date'
    ];

    protected $fillable = [
        'user_id',
        'cv_section_id',
        'title',
        'place_name',
        'short_description',
        'start_date',
        'end_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cv_section()
    {
        return $this->belongsTo(CvSection::class);
    }
}
