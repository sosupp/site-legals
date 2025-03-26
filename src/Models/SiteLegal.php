<?php
namespace PySosu\SiteLegals\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sosupp\SlimDashboard\Concerns\Filters\CommonScopes;

class SiteLegal extends Model
{
    use HasFactory, SoftDeletes, CommonScopes;

    protected $fillable = [
        'author_id', /* The admin or user that created the site legal resource */
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

    /**
     * Here we use author since we do not know how your application
     * will implement different types of users if needed. For example the
     * morphTo defined allows for any type of user model to be allowed (admin or user, etc)
     */
    public function author()
    {
        return $this->morphTo();
    }
}
