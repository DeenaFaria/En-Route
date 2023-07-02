<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $table = 'blog_posts'; // Specify the table name if different from the default convention

    protected $primaryKey = 'id'; // Specify the primary key column name if different from the default convention

    protected $fillable = ['title', 'content']; // Specify the attributes that are mass assignable

    // Define relationships
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Add more relationships or custom methods as needed
}
?>