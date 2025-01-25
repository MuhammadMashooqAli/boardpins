@extends('layouts.master')
@section('title')
 Generate Your Pins
@endsection
@section('content')
<link rel="stylesheet" href="assets/css/flaticon.css">
<link rel="stylesheet" href="assets/css/pins/generate.css?v=2.3">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<main>

      <!-- tp-about-area-start -->
      <div class="tp-about-area ab-area-sapce pt-120 pb-120">
       <div class="">
<div class="container container-updated" style="margin-top:12%">
    <div class="row">
        <div class="col-sm-3 postbox__comment-input">
            
            <input type="text" value="https://engine.com.pk/collections/women-upper" id="fetchUrl" class="form-control "/>
            <br>

            <!-- Template Selection -->
            <select id="templateSelect" class="form-control">
            <option value="1">Template 1</option>
            <option value="2">Template 2</option>
            <option value="3">Template 3</option>
            <option value="4">Template 4</option>
            <option value="5">Template 5</option>
            <option value="6">Template 6</option>
            <option value="7">Template 7</option>
            <option value="8">Template 8</option>
            <option value="9">Template 9</option>
            <option value="10">Template 10</option>
            </select>
            <br> 

            <div class="row">
                <div class="col-sm-12"> 
                    <button id="scrape-btn" class="tp-btn btn icon-20 r-04 btn--theme hover--theme" style="width: 100%;"><i class="fab fa-pinterest"></i> Generate Pins</button>
                 </div>
                 <div class="col-sm-12"> 
                  <br>
                    <button id="saveAllCards" class="tp-btn btn icon-20 r-04 btn--theme hover--theme" style="display:none; width: 100%;"><i class="fas fa-save"></i> Save All Pins</button>
                 </div>
            </div>
            <!-- Trigger button -->
            <br>
        </div>
        <div class="col-sm-9">
             <!-- Loading GIF -->
             <div id="loading-spinner" class="loading-spinner">
                <img src="{{url('img/loader.gif')}}" style="width:14%; padding-top:5%" alt="Loading...">
            </div>

            <div id="image-container" class="row">
                <!-- Cards will be displayed here -->
            </div>
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
        <button type="button" class="btn btn-primary" id="saveChangesBtn">Save Changes</button>
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
<script src="assets/js/pins/custom.js?v1.5"></script>
<script>

  function scehduleYourPins(){
    $('#editModal').modal('show');
  }
// Function to take a screenshot of a specific element
function takeScreenshot(element) {
    return html2canvas(element, {
        useCORS: true,
        logging: false,
        backgroundColor: null,
        ignoreElements: (node) => {
            // Exclude unnecessary elements
            return (
                node.tagName === "LINK" || // Ignore <link> elements (external stylesheets)
                node.tagName === "SCRIPT" || // Ignore <script> elements
                node.tagName === "STYLE" // Ignore <style> blocks if not needed
            );
        },
    }).then((canvas) => canvas.toDataURL("image/png"));
}

// // Handle button click to save all cards
// document.getElementById("saveAll").addEventListener("click", async function () {
//     const cards = document.querySelectorAll(".card"); // Select all .card elements
//     const dataToSave = [];

//     // Loop through each card
//     for (let i = 0; i < cards.length; i++) {
//         const card = cards[i];
//         const screenshot = await takeScreenshot(card); // Take a screenshot
//         const htmlContent = card.outerHTML; // Get the HTML content
//         dataToSave.push({
//             filename: `card${i + 1}.png`,
//             htmlFilename: `card${i + 1}.html`,
//             screenshot: screenshot,
//             html: htmlContent,
//         });
//     }

//     // Send all data to the server
//     fetch("save_cards.php", {
//         method: "POST",
//         headers: {
//             "Content-Type": "application/json",
//         },
//         body: JSON.stringify({ cards: dataToSave }),
//     })
//         .then((response) => response.json())
//         .then((data) => {
//             if (data.success) {
//                 alert("Cards saved successfully!");
//             } else {
//                 alert("Failed to save cards: " + data.message);
//             }
//         })
//         .catch((error) => {
//             console.error("Error:", error);
//         });
// });



    </script>
</div>
</div>
</main>
@endsection