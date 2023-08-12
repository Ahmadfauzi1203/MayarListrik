{{-- Alert Error For Login --}}
@if(session('error'))
<div class="alert alert-danger">
    <b>Opps!</b> {{session('error')}}
</div>
@endif


{{-- alert For APP --}}
@if(session('success'))
<div class="alert alert-success">
    <b>Hello!</b> {{session('success')}}
</div>
@endif