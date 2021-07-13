<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

/**
 * Class Project
 *
 * @property int $id
 * @property int $user_id
 * @property string $image_url
 * @property string $title
 * @property string|null $short_description
 * @property string|null $long_description
 * @property Carbon|null $start_date
 * @property Carbon|null $end_date
 * @property string $hosted_at_url
 * @property string|null $github_link
 * @property int $importance_score
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property User $user
 *
 * @package App\Models
 */
class Project extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    protected $table = 'projects';

    protected $casts = [
        'user_id' => 'int'
    ];

    protected $dates = [
        'start_date',
        'end_date'
    ];

    protected $fillable = [
        'user_id',
        'image_url',
        'title',
        'short_description',
        'long_description',
        'start_date',
        'end_date',
        'hosted_at_url',
        'github_link',
        'importance_score'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setImageUrlAttribute($value)
    {
        $attribute_name = 'image_url';
        // or use your own disk, defined in config/filesystems.php
        $disk = config('backpack.base.root_disk_name');
        // destination path relative to the disk above
        $destination_path = "public/uploads/project_imgs/".backpack_user()->id;

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
            $project_obj = \App\Models\Project::where('image_url', $public_destination_path)->first();
            if ($project_obj == null) {
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
