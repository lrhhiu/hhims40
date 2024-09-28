<?php

namespace App\Modules\Blog\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    public function getPosts()
    {
        // Query to get blog posts
        return [
            ['title' => 'First Post', 'content' => 'This is the first post'],
            ['title' => 'Second Post', 'content' => 'This is the second post']
        ];
    }
}