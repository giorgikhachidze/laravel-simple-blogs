@extends('blogs.layouts.app')
@section('content')

    <div class="bg-dark text-left p-2 mb-3 rounded" style="color: #17e414;font-size: .85rem">
        "select `id`, `title`, `description`, `created_at` from `blogs` where `is_publish` = ? and `deleted_at` is null and `created_at` >= {{ $start }} and `created_at` <= {{ $end }} order by `created_at` asc"
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">სათაური</th>
                    <th scope="col">აღწერა</th>
                    <th scope="col" class="text-right">გამოქვეყნდა</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td class="text-right">{{ $post->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
