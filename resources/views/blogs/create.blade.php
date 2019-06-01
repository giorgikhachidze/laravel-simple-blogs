@extends('blogs.layouts.app')
@section('content')
    <form action="{{ route('blogs.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">სათაური</label>
                            <input type="text" name="title" class="form-control" id="title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">აღწერა</label>
                            <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success btn-block btn-sm"><b>დამატება</b></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
