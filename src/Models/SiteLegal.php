<?php
namespace PySosu\SiteLegals\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteLegal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'author_id', /* The admin user that created the site legal resource */
        'author_type',
        'page_name',
        'slug',
        'description',
        'content',
        'status',
        'views',
        'clicks',
        'banner',
    ];

    protected static function newFactory()
    {
        return \PySosu\SiteLegals\Database\Factories\SiteLegalFactory::new();
    }

    /**
     * Admin here represent any user/admin that has access to perform
     * CRUD operations on the SiteLegal model. You can change this
     * to suit the integration into your app.
     *
     * @return void
     */
    public function admin()
    {
        // return $this->belongsTo(Admin::user);
    }

    public function author()
    {
        return $this->morphTo();
    }
}
