<div dir="ltr" style="text-align: left">
    @if (count($errors->all())>0)
    <ul class="bg-danger p-3 mt-2 " style="border-radius: 5px">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
</div>

