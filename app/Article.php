<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model {
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $appends = ['tag_list','body_html','excerpt_html'];
    protected $fillable = ['category_id','title','subhead', 'body','excerpt','slug','published'];

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function scopeFindBySlug($query, $slug)
    {
        return $query->whereSlug($slug)->firstOrFail();
    }

    public function scopePublished($query){
        return $query->where('published','=','1');
    }

    public function getBodyHtmlAttribute()
    {
        $Parsedown = new \Parsedown();
        return $Parsedown->text($this->body);
    }

    public function getExcerptHtmlAttribute()
    {
        $Parsedown = new \Parsedown();
        return $Parsedown->text($this->excerpt);
    }

    public function getTagListAttribute()
    {
        return $this->tags->lists('id');
    }
}
