{{ csrf_field() }}
<div class="m-t-10">
    <div class="d-flex">
        <div class="mr-auto">
        </div>
        <div class="ml-auto">
            <div class="form-group">
                <label>Search : </label>
                <input id="demo-input-search2" name="search_text" type="text" autocomplete="off" value="@if($search != NULL){{$search}}@endif">
            </div>
        </div>
    </div>
</div>