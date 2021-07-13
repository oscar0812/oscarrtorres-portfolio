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

use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

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
        'image_url',
        'work_title',
        'self_summary',
        'github_url',
        'linkedin_url'
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make($value);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function work_experiences()
    {
        return $this->hasMany(WorkExperience::class);
    }

    public function setImageUrlAttribute($value)
    {
        $attribute_name = 'image_url';
        // or use your own disk, defined in config/filesystems.php
        $disk = config('backpack.base.root_disk_name');
        // destination path relative to the disk above
        $destination_path = "public/uploads/pfps/".backpack_user()->id;

        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->{$attribute_name});

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // clear out any ununsed images
        foreach (\Storage::disk($disk)->files($destination_path) as $file_path) {
            $public_destination_path = Str::replaceFirst('public/', '', $file_path);
            $user_obj = \App\Models\User::where('image_url', $public_destination_path)->first();
            if ($user_obj == null) {
                // no link to this image, delete it
                \Storage::disk($disk)->delete($file_path);
            }
        }

        // if a base64 was sent, store it in the db
        if (Str::startsWith($value, 'data:image')) {
            // 0. Make the image
            $image = Image::make($value)->encode('jpg', 90);

            // 1. Generate a filename.
            $filename = md5($value.time()).'.jpg';

            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());

            // 3. Delete the previous image, if there was one.
            \Storage::disk($disk)->delete($this->{$attribute_name});

            // 4. Save the public path to the database
            // but first, remove "public/" from the path, since we're pointing to it
            // from the root folder; that way, what gets saved in the db
            // is the public URL (everything that comes after the domain name)
            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
        }
    }
}
