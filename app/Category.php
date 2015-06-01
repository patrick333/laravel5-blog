<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $fillable = ['name', 'slug','parent_id'];


    public function articles() {
        return $this -> hasMany('App\Article');
    }

  //slug functions
    public function setSlugAttribute($data)
    {
        $this->attributes['slug']=str_slug($data);
    }

    public function scopeFindBySlug($query, $slug)
    {
        return $query->whereSlug($slug)->firstOrFail();
    }

    // functions of category levels
    public function scopeGetTopLevel($query)
    {
        return $query->where('parent_id', 0)->get();
    }

    public static function getLeveledCategories()
    {
        return \Cache::tags('categories')->rememberForever('leveled_cats', function()
        {
            $categories = Category::all();
            $result = array();
            foreach ($categories as $category) {
                if ( $category->parent_id == 0 ) {
                    $result['top'][] = $category;
                    foreach ($categories as $son) {
                        if ($son->parent_id == $category->id) {
                            $result['second'][$category->id][] = $son;
                        }
                    }
                }
            }
            return $result;
        });
    }

    public static function getSortedCategories()
    {
        return \Cache::tags('categories')->rememberForever('sorted_cats', function()
        {
            $categories = Category::all();
            $result = array();
            foreach ($categories as $category) {
                if ( $category->parent_id == 0 ) {
                    $result[] = $category;
                    foreach ($categories as $son) {
                        if ($son->parent_id == $category->id) {
                            $result[] = $son;
                        }
                    }
                }
            }
            return $result;
        });
    }
}
