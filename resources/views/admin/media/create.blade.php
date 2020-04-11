@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css">
@stop

@section('content')
    
<h1>Upload Media</h1>
<form  class="form dropzone" method="post" action="/admin/media" enctype="multipart/form-data">
    {{csrf_field()}}
</form>
@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
@endsection