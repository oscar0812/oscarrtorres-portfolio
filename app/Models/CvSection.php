<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CvSection
 *
 * @property int $id
 * @property string $name
 * @property int $priority
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|CvEntry[] $cv_entries
 *
 * @package App\Models
 */
class CvSection extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    protected $table = 'cv_sections';

    protected $casts = [
        'priority' => 'int'
    ];

    protected $fillable = [
        'name',
        'priority'
    ];

    public function cv_entries()
    {
        return $this->hasMany(CvEntry::class);
    }
}
