@extends('backend.layouts.app')

@section('title', 'Backend')

@section('content')
    <div class="row">
        <div class="col-12">
           <div class="card">
                <div class="card-body">
                    <div class="m-t-10">
                        <div class="d-flex">
                            <div class="mr-auto">
                                <h4 class="card-title">Users List</h4>
                            </div>
                            <div class="ml-auto">
                                <a class="btn btn-success" href="{{ URL::to('backend/create') }}" style="float: right;color: white;">Create User</a>
                            </div>
                        </div>
                    </div>
                    <div class="m-t-10">
                        @include('backend.common.notifications')
                    </div>
                    <div class="table-responsive m-t-10">
                        <form action="backend" method="get">
                            <!-- Search -->
                            @include('backend.common.search')
                        </form>
                        <table class="table table-bordered table-striped" style="border: 1px solid #dee2e6;">
                            <thead>
                                <tr>
                                    <th>@sortablelink('uuid', 'UUID')</th>
                                    <th>@sortablelink('name', 'NAME')</th>
                                    <th>@sortablelink('description', 'DESCRIPTION')</th>
                                    <th>@sortablelink('code', 'CODE')</th>
                                    <th>@sortablelink('status', 'STATUS')</th>
                                    <th style="width:13%;">@sortablelink('','ACTIONS')</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if(!$users->isEmpty())
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->uuid}}</td>
                                    <td>{{$user->name}}</td>
                                    <td style="width: 40%;">{{$user->description}}</td>
                                    <td>{{$user->code}}</td>
                                    <td>
                                        @if( $user->status == 1 )
                                            Active
                                        @else
                                            In Active
                                        @endif 
                                    </td>
                                    <td>
                                        <!-- Edit Button -->
                                        <a title="Edit" href="{{ route('backend.edit',[$user->uuid])}}">
                                            <button class="btn-info waves-effect" type="text"><i class="fas fa-edit" aria-hidden="true"></i></button>
                                        </a>
                                        <!-- Delete Button -->
                                        <form action="{{ route('backend.destroy', $user->uuid) }}" method="post" style="display: inline-flex;" id="form-delete{{ $user->uuid }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button title="Delete" onclick="return deleteData({{ $user->uuid }})" class="btn-danger waves-effect" type="submit"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                    
                                </tr>
                                @endforeach
                                @else
                                <td colspan="8"> No data available in table</td>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div style="float:right;" class="m-t-20">
                        {!! $users->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection