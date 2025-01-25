@extends('layouts.master')
@section('title')
Scheduling Yours Pins Times
@endsection
@section('content')
<link rel="stylesheet" href="assets/css/font-awesome-pro.css">
<link rel="stylesheet" href="assets/css/pins/generate.css">

<main>
<div class="container container-updated" style="margin-top:12%; justify-content:center">
<div class="row">
 <h3> Schedule Your Pins</h3 >
 <p>Manange your Pinterest scheduling settings and scheduled pins here.</p>
 <button id="schedulling" class="tp-btn btn icon-20 r-04 btn--theme hover--theme" style="width:30%; font-size: 85%;"><i class="fas fa-calendar-plus"></i> &nbsp;Schedule Pins</button>
 <!-- Edit Modal -->
 <div id="scehduleYourPins"  style="margin-top:2%;" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="citikidLoginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pin Scheduling Settings</h5>
      </div>
      <div class="modal-body" style="margin:4%;">
        <form id="pinsFortingTime" action="POST" url="{{url('save-schedule')}}">
          <div class="form-group">
            <label for="editCardTitle">Pins per day:</label>
            <input type="number" id="pins_per_day"  value="{{$schedule->pins_per_day ?? null}}" class="form-control" required>
          </div>
          <br>
          <div class="form-group">
            <label for="editCardLink">Pin posting Times From:</label>
            <input type="time" id="timefrom" value="{{$schedule->time_from ?? null}}" class="form-control" required>
          </div>
          <br>
          <div class="form-group">
            <label for="editCardLink">Pin posting Times To:</label>
            <input type="time" id="timeto"  value="{{$schedule->time_to ?? null}}" class="form-control" required>
          </div>
          <br>
          <div class="form-group">
            <label for="editCardLink">Scheduling Status</label>
            <select class="form-control" name="status" id="status">
              <option value="1" @if($schedule && $schedule->status == 1) selected @endif >Active</option>
              <option value="0" @if($schedule && $schedule->status == 0) selected @endif >Inactive</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="saveScedule">Save Changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Edit Modal -->
</div>
</div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="assets/js/pins/custom.js?v=1.4"></script>
@endsection