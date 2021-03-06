<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment, App\Category;

class Content extends D4lModel
{
    /**
     * The table name
     *
     * @var string
     */
    protected $table = 'contents';

    /**
     * Topic of type_id column
     *
     * @var int
     */
    const TYPE_TOPIC = 1;

    /**
     * Blog of type_id column
     *
     * @var int
     */
    const TYPE_BLOG = 2;

    /**
     * Article of type_id column
     *
     * @var int
     */
    const TYPE_ARTICLE = 3;

    /**
     * Date transform
     */
    public function getDates()
    {
        return ['created_at', 'updated_at'];
    }

    /**
     * Query Topics
     */
    public function scopeTopics($query)
    {
        return $query->where('type_id', '=', Category::TYPE_TOPIC);
    }

    /**
     * Query Article
     */
    public function scopeArticles($query)
    {
        return $query->where('type_id', '=', Category::TYPE_ARTICLE);
    }

    /**
     * Query Blog
     */
    public function scopeBlogs($query)
    {
        return $query->where('type_id', '=', Category::TYPE_BLOG);
    }

    /**
     * The related User model
     *
     * @return \App\User
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * The related Category model
     *
     * @return \App\Category
     */
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    /**
     * The related Comment model
     *
     * @return array|null
     */
    public function comments()
    {
        return $this->hasMany('App\Comment', 'entity_id');
    }

    /**
     * Get hot content
     */
    public function getHotContents()
    {
        //
    }

    /**
     * Get last comment User model
     *
     * @return \App\User
     */
    public function getLastCommentUser()
    {
        return Comment::where('entity_id', '=', $this->id)->orderBy('created_at', 'desc')->first();
    }

    /**
     * Content comment handle
     *
     * @param int $userId Last comment user id
     */
    public function createCommentHandle($lastCommentUserId)
    {
        $this->comment_count = $this->comment_count + 1;
        $this->last_comment_user_id = $lastCommentUserId;
        if ($this->save()) {
            return true;
        } else {
            return false;
        }
    }
}
