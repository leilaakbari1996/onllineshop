@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h4>
            <i class="icon fa fa-check">Alert!</i><br>
            {{session()->get('success')}}
        </h4>
    </div>
@endif

