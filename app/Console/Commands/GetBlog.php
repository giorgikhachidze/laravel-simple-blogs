<?php

namespace App\Console\Commands;

use App\Blog;
use Illuminate\Console\Command;

class GetBlog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:post {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get posts data from blogs table with id';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $id = $this->argument('id');

        $posts = Blog::query()
            ->select('title', 'description')
            ->where('id', '=', $id)
            ->where('is_publish', '=', 1)
            ->whereNull('deleted_at')
            ->get();

        foreach ($posts as $post) {
            $this->info("სათაური: $post->title აღწერა: $post->description");
        }
    }
}
