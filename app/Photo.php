<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Photo extends Model implements HasMedia
{
    use SoftDeletes, MultiTenantModelTrait, HasMediaTrait;

    public $table = 'photos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'approved_at',
    ];

    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
        'approved_at',
        'reviewer_id',
    ];

    public function getphotoAttribute()
    {
        $file = $this->getMedia('photo')->last();

        if ($file) {
            $file->url = $file->getUrl();
        }

        return $file;
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    public function scopeReviewersPhotos($query)
    {
        return $query->where('reviewer_id', auth()->id());
    }

    public function scopeApproved($query)
    {
        return $query->whereNotNull('approved_at');
    }
}
