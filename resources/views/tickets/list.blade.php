@extends('layout')
@section('content')
<div class="container" style="background-color: #ccc;">
@if($action)<div class="bg bg-success">Succesfully Created</div> @endif
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Booking Start Date</th>
      <th scope="col">Booking Close Date</th>
</tr>
  </thead>
  <tbody>
    @foreach($list as $key => $value)
    <tr>
      <th scope="row">{{$value->id}}</th>
      <td>{{$value->name}}</td>
      <td>{{$value->description}}</td>
      <td>{{$value->booking_start_date}}</td>
      <td>{{$value->booking_closing_date}}</td>
    </tr>
    @endforeach
  </tbody>

</table>
<a class="btn btn-primary" href="/ticket/create">Create</a>
</div>
<script type="text/javascript">
    setTimeout(() => {
        $('.bg.bg-success').hide();
    }, 3000);
</script>
@endsection
