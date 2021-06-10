@extends('backend.layouts.app')

@section('title', 'Create User')

@section('content')
<div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="card card-outline-info">
                <div class="card-body">
                @include('backend.common.notifications')
                    <form action="{{ route('backend.store') }}"  method="POST" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                        <div class="form-body">
                            <h3 class="card-title" style="text-align: center;">Create User</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="name" value="{{ old('name') }}" type="text" class="form-control" >
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
                                        <textarea rows="4" class="form-control" name="description" >{{ old('description') }}</textarea>
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
                                        <input name="code" value="{{ old('code') }}" type="text" class="form-control ">
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
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
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