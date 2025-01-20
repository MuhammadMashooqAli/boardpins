@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="assets/css/flaticon.css">
<link rel="stylesheet" href="assets/css/font-awesome-pro.css">
<link rel="stylesheet" href="assets/css/pins/generate.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<main>
<style>
    .pagination .page-link {
        font-size: 0.875rem; /* Adjust size */
        padding: 0.5rem 0.75rem; /* Adjust padding */
    }
    .pagination .page-item.active .page-link {
        background-color: #007bff; /* Active background color */
        border-color: #007bff;
        color: white;
    }
    .shadow-sm > span,  .shadow-sm >  a .w-5{
        width: 3%;
        display: inline-block;
    }
   .justify-content-center nav .justify-between {
        display:none;
    }
    .justify-content-center{    margin-top: 5%;
        text-align: center;
    }
</style>


      <!-- tp-about-area-start -->
      <div class="tp-about-area ab-area-sapce pt-120 pb-120">
       <div class="">
<div class="container container-updated" style="margin-top:12%">
    <div class="row">
        <div class="col-sm-12">
            <div id="image-container" class="row">
            @foreach($pins as $pin)
                <!-- Cards will be displayed here -->
                <div class="col-md-3 maincard" data-pin="{{$pin->id}}" > 
                  @if($pin->status == "pending")
                    <span class="badge badge-danger">Pending</span>
                  @elseif($pin->status == "published")
                   <span class="badge badge-success">Published ({{ \Carbon\Carbon::parse($pin->publish_time)->format('M d, Y h:i A') }})</span>
                  @else
                @endif
                {!! $pin->card_html !!}
                  @if($pin->status == "pending")
                      {!! $htmlTools !!}
                  @endif
                </div>
            @endforeach
            </div>
        </div>
            <!-- Pagination Links -->
        <div class="justify-content-center">
            {{ $pins->links() }}
        </div>
    </div>
</div>
<!-- Edit Modal -->
<div id="editModal"  style="margin-top:2%;" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="citikidLoginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Pin</h5>
      </div>
      <div class="modal-body" style="margin:4%;">
        <form id="editForm">
          <div class="form-group">
            <label for="editCardTitle">Pin Title</label>
            <input type="text" id="editCardTitle" class="form-control" placeholder="Enter title" required>
          </div>
          <div class="form-group">
            <label for="editCardLink">Pin Link</label>
            <input type="url" id="editCardLink" class="form-control" placeholder="Enter link" required>
          </div>
          <div class="form-group">
            <label for="editCardLink">Pin Publish Date</label>
            <input type="datetime-local" id="editCardDateTime" class="form-control">
          </div>
          <div class="form-group">
            <label for="editCardLink">Select Board</label><br>
            <select class="form-control" id="selectBoard">
                <option value="">Select Board</option>
                @foreach($boards as $board)
                  <option value="{{$board->id}}">{{$board->name}}</option>
                @endforeach
            </select>
          </div>
          <input type="hidden" id="editCardId">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="saveChangesBtnUpdated">Save Changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Edit Modal -->
<div id="scehduleYourPins"  style="margin-top:2%;" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="citikidLoginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pin Scheduling Settings</h5>
      </div>
      <div class="modal-body" style="margin:4%;">
        <form id="pinsFortingTime">
          <div class="form-group">
            <label for="editCardTitle">Pins per day</label>
            <input type="number" id="pins_per_day" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="editCardLink">Pin posting Times</label>
            <input type="datetime-local" id="time" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="editCardLink">Time Zone</label>
            <select class="form-control" id="selectBoard">
                <option value="">Select Board</option>
                @foreach($boards as $board)
                  <option value="{{$board->id}}">{{$board->name}}</option>
                @endforeach
            </select>         
           </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="saveAllPins">Save Changes</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="assets/js/pins/custom.js"></script>
</div>
</div>
</main>
@endsection