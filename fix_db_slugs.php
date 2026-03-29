<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

try {
    // Check if slug exists in posts
    if (!Schema::hasColumn('posts', 'slug')) {
        echo "Adding slug to posts...\n";
        Schema::table('posts', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
        });
    } else {
        echo "Slug exists in posts.\n";
    }

    $posts = \App\Models\Post::withTrashed()->get();
    foreach($posts as $post) {
        if (empty($post->slug)) {
            $post->slug = \Illuminate\Support\Str::slug($post->title) . '-' . uniqid();
            $post->save();
            echo "Fixed post {$post->id}\n";
        }
    }
    echo "Done posts.\n";

    if (!Schema::hasColumn('products', 'slug')) {
        echo "Adding slug to products...\n";
        Schema::table('products', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('name');
        });
    } else {
        echo "Slug exists in products.\n";
    }

    $products = \App\Models\Product::withTrashed()->get();
    foreach($products as $product) {
        if (empty($product->slug)) {
            $product->slug = \Illuminate\Support\Str::slug($product->name) . '-' . uniqid();
            $product->save();
            echo "Fixed product {$product->id}\n";
        }
    }
    echo "Done products.\n";
    
    // Also categories
    if (!Schema::hasColumn('categories', 'slug')) {
        echo "Adding slug to categories...\n";
        Schema::table('categories', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('name');
        });
    } else {
        echo "Slug exists in categories.\n";
    }
    
    $categories = \App\Models\Category::withTrashed()->get();
    foreach($categories as $category) {
        if (empty($category->slug)) {
            $category->slug = \Illuminate\Support\Str::slug($category->name) . '-' . uniqid();
            $category->save();
            echo "Fixed category {$category->id}\n";
        }
    }
    echo "Done everything.\n";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
