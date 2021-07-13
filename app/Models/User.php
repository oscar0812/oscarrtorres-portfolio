<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property string $name
 * @property string $work_title
 * @property string $self_summary
 * @property string $github_url
 * @property string $linkedin_url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Project[] $projects
 * @property Collection|WorkExperience[] $work_experiences
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
		use HasFactory, Notifiable;
    protected $table = 'users';

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $fillable = [
        'email',
        'password',
        'remember_token',
        'name',
        'work_title',
        'self_summary',
        'github_url',
        'linkedin_url'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function work_experiences()
    {
        return $this->hasMany(WorkExperience::class);
    }
}
