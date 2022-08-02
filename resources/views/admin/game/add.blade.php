@extends('admin.layout.app')
@section('content')
@php

$user = Auth::user();
@endphp

<div class="main-content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="row">
            <div class="">
                <div class="content-header">{{ __('Game') }}</div>
            </div>
        </div>
        <section id="basic-hidden-label-form-layouts">
            <div class="row match-height">
                <div class="col-lg-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"></h4>
                            <a href="{{route('admin.game.list')}}" class="btn btn-primary float-right">
                                Back
                            </a>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if(count($errors) > 0 )
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <ul class="p-0 m-0" style="list-style: none;">
                                            @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    <div class="col-md-6 ">
                                        <div class="form-group mb-2">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ old('name',@$game->name) }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group mb-2">
                                            <label for="description">Description</label>
                                            <textarea type="text" class="form-control" name="description" value="">{{ old('description',@$game->description) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group mb-2">
                                            <label for="feature_image">Feature Image</label>
                                            <input type="file" class="form-control" name="feature_image" />
                                        </div>
                                    </div>
                                    @if($game->feature_image)
                                        <div class="col-md-6 ">
                                            <div class="form-group mb-2">
                                                    <a  class="btn btn-sm btn-primary" href="{{ $game->feature_image }}" download>Download</a>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-md-6 ">
                                        <div class="form-group mb-2">
                                            <label for="category">Category</label>
                                            <input type="text" class="form-control" name="category" value="{{ old('category',@$game->category) }}" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 ">
                                        <div class="form-group mb-2">
                                            <label for="sub_category">Sub Category</label>
                                            <input type="text" class="form-control" name="sub_category" value="{{ old('sub_category',@$game->sub_category) }}" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 ">
                                        <div class="form-group mb-2">
                                            <label for="is_trending">Is Trending</label>
                                            Yes<input type="radio" name="is_trending" value="1" {{ $game->is_trending == 1 ? 'checked="checked"' : ''}}/>
                                            No<input type="radio" name="is_trending" value="0" {{ $game->is_trending == 0 ? 'checked="checked"' : ''}}/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group mb-2">
                                            <label for="is_featured">Is Featured</label>
                                            Yes<input type="radio" name="is_featured" value="1" {{ $game->is_featured == 1 ? 'checked="checked"' : ''}}/>
                                            No<input type="radio" name="is_featured" value="0" {{ $game->is_featured == 0 ? 'checked="checked"' : ''}}/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group mb-2">
                                            <label for="is_popular">Is Popular</label>
                                            Yes<input type="radio" name="is_popular" value="1" {{ $game->is_popular == 1 ? 'checked="checked"' : ''}}/>
                                            No<input type="radio" name="is_popular" value="0" {{ $game->is_popular == 0 ? 'checked="checked"' : ''}}/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group mb-2">
                                            <label for="status">Status</label>
                                            <br />
                                            <label>Active</label><input type="radio" {{ @$game->status == 1 ? "checked='checked'" : '' }} name="status" value="1"/><br />
                                            <label>InActive</label><input type="radio" {{ @$game->status == 0 ? "checked='checked'" : '' }} name="status" value="0"/><br />
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2"><i
                                            class="ft-check-square mr-1"></i>Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
