@extends('layout')
@section('content')
<div class="container" style="background-color: #ccc;">
<div class="mb-3 row">
<form class="row g-3" action="/ticket/generate" method="POST">
  <div class="col-md-12">
    <label for="name" class="form-label">Event name</label>
    <input type="text" name="name" id="name" class="form-control" id="validationServer01" placeholder="Event Name" required>
  </div>
  <div class="col-md-12">
    <label for="description" class="form-label">Event Description</label>
    <textarea name="description" id="description" placeholder="Event Description" required></textarea>
  </div>
  <div class="col-md-12">
    <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker">
    <label for="booking_open_date" class="form-label">Booking Open Date</label>

        <input placeholder="Select date" name="booking_open_date" type="text" id="booking_open_date" class="form-control">

        <i class="fas fa-calendar input-prefix" tabindex=0></i>
    </div>
  </div>
  <div class="col-md-12">
    <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker">
    <label for="booking_close_date" class="form-label">Booking Close Date</label>
        <input placeholder="Select date" name="booking_close_date" type="text" id="example" class="form-control">
        <i class="fas fa-calendar input-prefix" tabindex=0></i>
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
</form>
</div>
<script type="text/javascript">
    $('.datepicker').datepicker();
    $("#description").wysihtml5();
</script>
@endsection
