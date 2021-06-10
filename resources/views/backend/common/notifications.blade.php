@if ($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert" style="border:1px solid #f8b1b8;">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible" role="alert" style="border:1px solid #36d75d;">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        {{ session()->get('success') }}
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible" role="alert" style="border:1px solid #f8b1b8;">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        {{ session()->get('error') }}
    </div>
@endif

@if(session()->has('log-success'))
    <div class="alert alert-success alert-dismissible" role="alert" style="border:1px solid #36d75d;">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        {{ session()->get('log-success') }}
    </div>
@endif
@if(session()->has('log-error'))
    <div class="alert alert-danger alert-dismissible" role="alert" style="border:1px solid #36d75d;">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        {{ session()->get('log-error') }}
    </div>
@endif