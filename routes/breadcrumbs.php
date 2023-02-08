<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

//=====================
//Dashboard
Breadcrumbs::for ('blog', function ($trail) {
    $trail->push('Blog', route('blog.home'));
});

//Dashboard > Home
Breadcrumbs::for ('blog_home', function ($trail) {
    $trail->parent('blog');
    $trail->push('Home', route('blog.home'));
});
Breadcrumbs::for ('blog_detail', function ($trail, $title) {
    $trail->parent('blog');
    $trail->push($title, '#');
});
//Dashboard > Home
Breadcrumbs::for ('blog_category', function ($trail) {
    $trail->parent('blog');
    $trail->push('Category', route('blog.categories'));
});

Breadcrumbs::for ('tag_category', function ($trail) {
    $trail->parent('blog');
    $trail->push('Tag', route('blog.tags'));
});
Breadcrumbs::for ('search_category', function ($trail, $keyword) {
    $trail->parent('blog');
    $trail->push('Search', route('blog.search'));
    $trail->push($keyword, route('blog.search'));
});

Breadcrumbs::for ('blog_posts_category', function ($trail, $title) {
    $trail->parent('blog');
    $trail->push('Category', route('blog.categories'));
    $trail->push($title, '#');
});
Breadcrumbs::for ('blog_posts_tag', function ($trail, $title) {
    $trail->parent('blog');
    $trail->push('Tag', route('blog.tags'));
    $trail->push($title, '#');
});

//=====================

//Dashboard
Breadcrumbs::for ('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard.index'));
});

//Dashboard > Home
Breadcrumbs::for ('dashboard_home', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Home', '#');
});
//Dashboard > Categories
Breadcrumbs::for ('user', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('User', route('user.index'));
});
Breadcrumbs::for ('categories', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Categories', route('categories.index'));
});
//Dashboard > Categories> Create
Breadcrumbs::for ('add_category', function ($trail) {
    $trail->parent('categories');
    $trail->push('Tambah', route('categories.create'));
});
//Dashboard > Categories>Edit
Breadcrumbs::for ('edit_category', function ($trail, $category) {
    $trail->parent('categories');
    $trail->push('Edit', route('categories.edit', ['category' => $category]));
});
//Dashboard > Categories>Edit > Judul
Breadcrumbs::for ('edit_title_category', function ($trail, $category) {
    $trail->parent('edit_category', $category);
    $trail->push($category->title, route('categories.edit', ['category' => $category]));
});
//Dashboard > Categories>Show
Breadcrumbs::for ('detail_category', function ($trail, $category) {
    $trail->parent('categories');
    $trail->push('Detail', route('categories.show', ['category' => $category]));
});
//Dashboard > Categories>Show > Judul
Breadcrumbs::for ('detail_title_category', function ($trail, $category) {
    $trail->parent('detail_category', $category);
    $trail->push($category->title, route('categories.show', ['category' => $category]));
});
//Dashboard > Tags
Breadcrumbs::for ('tags', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Tags', route('tags.index'));
});
//Dashboard > Categories> Create
Breadcrumbs::for ('add_tag', function ($trail) {
    $trail->parent('tags');
    $trail->push('Tambah', route('tags.create'));
});

//Dashboard > Categories>Edit[title]
Breadcrumbs::for ('edit_tag', function ($trail, $tag) {
    $trail->parent('tags');
    $trail->push('Edit', route('tags.edit', ['tag' => $tag]));
    $trail->push($tag->title, route('tags.edit', ['tag' => $tag]));
});
//Dashboard > Posts
Breadcrumbs::for ('posts', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Posts', route('posts.index'));
});
//Dashboard > Categories> Create
Breadcrumbs::for ('add_posts', function ($trail) {
    $trail->parent('posts');
    $trail->push('Tambah', route('posts.create'));
});
//Dashboard > Categories> Detail
Breadcrumbs::for ('detail_posts', function ($trail, $post) {
    $trail->parent('posts');
    $trail->push('Detail', route('posts.show', ['post' => $post]));
    $trail->push($post->title, route('posts.show', ['post' => $post]));
});
//Dashboard > Categories> Edit
Breadcrumbs::for ('edit_posts', function ($trail, $post) {
    $trail->parent('posts');
    $trail->push('Edit', route('posts.edit', ['post' => $post]));
    $trail->push($post->title, route('posts.edit', ['post' => $post]));
});

//Dashboard > FM
Breadcrumbs::for ('file_manager', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('File Manager', route('filemanager.index'));
});
