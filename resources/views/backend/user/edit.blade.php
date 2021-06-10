@extends('backend.layouts.app')

@section('title', 'Update User')

@section('content')
<div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="card card-outline-info">
                <div class="card-body">
                @include('backend.common.notifications')
                    <form action="{{ route('backend.update', $user->uuid) }}"  method="POST" enctype="multipart/form-data">
                         {!! csrf_field() !!}
                         {{ method_field('PUT') }}
                        <div class="form-body">
                            <h3 class="card-title" style="text-align: center;">Update User</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="name" value="{{ $user->name }}" type="text" class="form-control" >
                                        @error('name')
                                            <div class="has-danger">
                                                <small class="form-control-feedback"> {{ $message }} </small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea rows="4" class="form-control" name="description" >{{ $user->description }}</textarea>
                                        @error('description')
                                            <div class="has-danger">
                                                <small class="form-control-feedback"> {{ $message }} </small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2"></div> 
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Code</label>
                                        <input name="code" value="{{ $user->code }}" type="text" class="form-control ">
                                        @error('code')
                                            <div class="has-danger">
                                                <small class="form-control-feedback"> {{ $message }} </small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2"></div>       
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control custom-select" name="status">
                                            <option value="">--Select status--</option>
                                            <option value="1" @if($user->status==1) selected="selected" @endif>Active</option>
                                            <option value="0" @if($user->status==0) selected="selected" @endif>Inactive</option>
                                        </select>
                                        @error('status')
                                            <div class="has-danger">
                                                <small class="form-control-feedback"> {{ $message }} </small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2"></div>  
                            </div>
                        </div>
                        <div class="form-actions" style="text-align: center;">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                            <a href="{{ URL::to('backend') }}"><button type="button" class="btn btn-inverse">Cancel</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
@endsection