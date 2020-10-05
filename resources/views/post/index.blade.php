@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                            Blog Posts
                    </div>
                </div>
            </div>
        </div>

        @foreach($posts as $post)
            @can('view',$post)
{{--            @cannot('view-post',$post)--}}
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{$post->title}}</div>
                        <div class="card-body">
                            {{$post->content}}
                        </div>
                    </div>
                </div>
                </div>

            </div>
    <hr>
    @endcan

        @endforeach
    </div>
@endsection
