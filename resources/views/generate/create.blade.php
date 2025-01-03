@extends('layouts.master')

@section('content')
<main>
      <!-- tp-about-area-start -->
      <div class="tp-about-area ab-area-sapce pt-120 pb-120">
       <div class="container">
<style>
     /* Loading Spinner */
     .loading-spinner {
        display: none;
    text-align: center;
    }

    .card_published_date{
        display:none;
    }

    /* Template 1: Simple Card */
   /* Template 1: Updated Card Style */
.card-template-1 {
    border: 3px solid #b8c58a; /* Light green border */
    border-radius: 10px;
    background-color: #f8f8f8;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin-bottom: 20px;
}

.card-template-1 .card-header {
    background-color: #f8f8f8;
    padding: 15px;
    font-weight: bold;
    font-size: 1rem;
    color: #333;
}

.card-template-1 .website-link {
    background-color: #555;
    color: #fff;
    font-weight: bold;
    padding: 8px;
}

.card-template-1 img {
    width: 100%;
    height: auto;
    padding: 15px;
}


   /* Template 2: Polaroid-Style Card */
.card-template-2 {
    border: none;
    border-radius: 0;
    background-color: #fff;
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    padding: 10px;
    text-align: center;
    margin-bottom: 20px;
    position: relative;
}

.card-template-2 .card-image img {
    width: 100%;
    height: auto;
    display: block;
    margin: 0 auto;
}

.card-template-2 .card-body {
    padding-top: 10px;
}

.card-template-2 .card-caption {
    font-size: 1rem;
    font-style: italic;
    color: #333;
    margin-top: 10px;
}

/* Template 3: Curved Header and Footer Card */
.card-template-3 {
    border: none;
    border-radius: 10px;
    background-color: #fff;
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    text-align: center;
    overflow: hidden;
    margin-bottom: 20px;
    position: relative;
}

/* Curved Header */
.card-template-3 .card-header {
    background-color: #4b6f3d;
    color: #fff;
    font-weight: bold;
    font-size: 1rem;
    padding: 20px;
    border-bottom-left-radius: 50% 40px;
    border-bottom-right-radius: 50% 40px;
}

/* Image Styling */
.card-template-3 .card-img {
    width: 100%;
    height: auto;
    display: block;
    margin: 0 auto;
}

/* Footer Strip */
.card-template-3 .card-footer {
    background-color: #4b6f3d;
    color: #fff;
    font-weight: bold;
    padding: 10px;
}
.card-template-3 .card-title{
    color:white;
    font-size: 14px;
    line-height: normal;
}
.card-template-1 .card-title{
    font-size: 15px;
    line-height: normal;
}
.tp-btn {
    line-height: 45px;
    padding: 0 20px;
    font-size: 13px;
    height: 45px;
}

    /* Template 4: Minimalist Card with Hover Effect */
    .card-template-4 {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        position: relative;
        overflow: hidden;
        background-color: #fff;
    }

    .card-template-4 .card-img-top {
        width: 100%;
        height: 300px;
        object-fit: cover;
        transition: all 0.3s ease;
    }

    .card-template-4 .card-body {
        padding: 15px;
        text-align: center;
        position: absolute;
        bottom: 0;
        background: rgba(0, 0, 0, 0.4);
        width: 100%;
        color: #fff;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .card-template-4 .card-img-top {
        transform: scale(1.1);
    }

    .card-template-4 .card-body {
        opacity: 1;
    }

    .card-template-4 .card-title {
        font-size: 1.1rem;
        font-weight: bold;
    }

    .card-template-4 .btn-link {
        color: #fff;
        text-decoration: none;
        font-weight: bold;
    }

    .card-template-4 .btn-link:hover {
        text-decoration: underline;
    }

    .card-toolbar {
    display: flex;
    flex-direction: column;
    padding: 10px;
    background-color: #f8f8f8;
    border-top: 1px solid #e0e0e0;
    border-radius: 0 0 10px 10px;
    gap: 10px;
}

.card-toolbar .icon-group {
    display: flex;
    justify-content: space-around;
    gap: 15px;
}

.card-toolbar i {
    font-size: 1.3rem;
    color: #3bc5c5;
    cursor: pointer;
    transition: color 0.3s ease, transform 0.3s ease;
}

.card-toolbar i:hover {
    color: #007bff;
    transform: scale(1.2);
}
.edit-title-input {
    width: 100%;
    padding: 5px;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}
.modal-content {
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.modal-header {
    background-color: #4b6f3d;
    color: #fff;
}

.modal-footer .btn-primary {
    background-color: #4b6f3d;
    border: none;
}

.card_board_id{
    display: none;
}


</style>
<div class="container" style="margin-top:2%">
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
            </select>
            <br> 
            <br> 
            <br>

            <!-- Trigger button -->
            <button id="scrape-btn" class="tp-btn">Generate Pins</button>
            <br><br>
            <button onclick="saveAllCards()" class="tp-btn">Save All Pins</button>
            @if(true)
            <a href="{{url('request-pinterest-access-token')}}" target="_blank">Authorized</a>
            @endif
            <br>
        </div>
        <div class="col-sm-9">
             <!-- Loading GIF -->
             <div id="loading-spinner" class="loading-spinner">
                <img src="{{url('img/loader.gif')}}" style="width:20%; padding-top:5%" alt="Loading...">
            </div>

            <div id="image-container" class="row">
                <!-- Cards will be displayed here -->
            </div>
        </div>
    </div>
</div>
<!-- Edit Modal -->
<div id="editModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Pin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="saveChangesBtn">Save Changes</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

    // Define the saveAllCards function in the global scope
// function saveAllCards() {
//     // Collect all cards
//     const cards = document.querySelectorAll('.maincard');
//     const cardHtmlArray = [];

//     cards.forEach(card => {
//         cardHtmlArray.push(card.outerHTML); // Collect the outer HTML of each card
//     });

//     // Send the card HTMLs to the backend
//     fetch('/save-all-cards', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
//         },
//         body: JSON.stringify({ cards: cardHtmlArray }),
//     })
//         .then(response => response.json())
//         .then(data => {
//             if (data.success) {
//                 alert('All cards saved successfully!');
//             } else {
//                 alert('Failed to save cards.');
//             }
//         })
//         .catch(error => console.error('Error:', error));
// }

async function saveAllCards() {
    // Select all .maincard elements, including dynamically generated ones
    const cards = document.querySelectorAll('.card');
    const formData = new FormData();
    const uploadUrl = '/upload-pin-images'; // Define your backend route

    for (let i = 0; i < cards.length; i++) {
        const card = cards[i];
        try {
            // Use a small delay to ensure dynamically added elements are fully rendered
            await new Promise(resolve => setTimeout(resolve, 100)); 

            // Convert the card to an image using html2canvas
            const canvas = await html2canvas(card, { useCORS: true }); // Ensure cross-origin images are handled
            const dataUrl = canvas.toDataURL('image/png');
            const blob = await fetch(dataUrl).then(res => res.blob());

            // Append the image blob to the FormData object
            formData.append(`pins[${i}]`, blob, `pin_${i}.png`);
        } catch (error) {
            console.error(`Error capturing card ${i}:`, error);
        }
    }

    // Send the FormData to the server
    fetch(uploadUrl, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('All pins saved successfully!');
            } else {
                alert('Failed to save pins.');
            }
        })
        .catch(error => console.error('Error uploading pins:', error));
}


document.addEventListener('DOMContentLoaded', function () {
    // Trigger the AJAX request when the button is clicked
document.getElementById('scrape-btn').addEventListener('click', function() {
    var url = $("#fetchUrl").val();  // Get the URL from the input
    var limit = 10;  // Limit to 10 items
    var template = $('#templateSelect').val();  // Get the selected template type
    $('#loading-spinner').show();
    $('#image-container').empty();
    // Send AJAX request to the controller
    $.ajax({
        url: '{{url("generate-pin-post")}}',  // Replace with your route
        type: 'GET',
        data: {
            url: url,
            limit: limit,
        },
        success: function(response) {
            var cardToolBar = ` <div class="card-toolbar">
                                    <div class="icon-group">
                                        <i class="fab fa-pinterest uploadtoPinterest"></i>
                                        <i class="fas fa-clock" onclick="enableEdit(this)"></i>
                                        <i class="fas fa-pen edit-icon" onclick="enableEdit(this)"></i>
                                        <i class="far fa-copy pin_copy"></i>
                                        <i class="fas fa-trash-alt delete_pin"></i>
                                    </div>
                                </div>`;
            // Clear the container first
            $('#image-container').empty();
            $('#loading-spinner').hide();

            // Display images in cards (limit to 10)
            const images = response.slice(0,200); // Limit to 50 items
            images.forEach(function(item) {
                // Select the template based on user selection
                var card = '';
                if (template == '1') {
                    // Template 1
                    card = `
                        <div class="col-md-3 maincard">
                            <div class="card card-template-1">
                                <div class="card-header">
                                    <h5 class="card-title">${item.description}</h5>
                                    <span class="card_published_date" ></span>
                                    <span class="card_board_id"></span>
                                </div>
                                <div class="website-link">
                                    <span>${new URL(item.link).hostname}</span>
                                </div>
                                <img src="${item.image}" class="card-img" alt="${item.description}">
                            </div>
                            ${cardToolBar}
                        </div>
                    `;

                } else if (template == '2') {
                    // Template 2
                    card = `
                            <div class="col-md-3 maincard">
                                <div class="card card-template-2">
                                    <div class="card-image">
                                        <img src="${item.image}" class="img-fluid" alt="${item.description}">
                                    </div>
                                    <div class="card-body">
                                        <p class="card-title">${item.description}</p>
                                        <a href="${item.link}" target="_blank" class="btn btn-link" style="display: none;">Visit</a>
                                        <span class="card_published_date" ></span>
                                        <span class="card_board_id"></span>
                                    </div>
                                </div>  
                                 ${cardToolBar}
                            </div>
                        `;

                } else if (template == '3') {
                    // Template 3: Pinterest-Style Vertical Card
                    card = `<div class="col-md-3 maincard">
                            <div class="card card-template-3">
                                <div class="card-header">
                                    <h5 class="card-title">${item.description}</h5>
                                </div>
                                <img src="${item.image}" class="card-img" alt="${item.description}">
                                <div class="card-footer">
                                    <span>${new URL(item.link).hostname}</span>
                                    <a href="${item.link}" target="_blank" class="btn btn-link" style="display: none;">Visit</a>
                                    <span class="card_published_date" ></span>
                                    <span class="card_board_id"></span>
                                </div>
                            </div>
                            ${cardToolBar}
                        </div>
                    `;

                } else if (template == '4') {
                    // Template 4: Minimalist Card with Hover Effect
                    card = `
                        <div class="col-md-3 maincard">
                            <div class="card card-template-4">
                                <img src="${item.image}" class="card-img-top" alt="${item.description}">
                                <div class="card-body">
                                    <span class="card-title">${item.description}</span>
                                    <a href="${item.link}" target="_blank" class="btn btn-link" style="display: none;">Visit</a>
                                    <span class="card_published_date" ></span>
                                    <span class="card_board_id"></span>
                                </div>
                            </div>
                            ${cardToolBar}
                        </div>
                    `;

                }
                $('#image-container').append(card);
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            $('#loading-spinner').hide();
        }
    });
});
});

function enableEdit(element) {
    // Find the card element
    var card = $(element).closest('.maincard');

    // Get the title and link from the card
    var title = card.find('.card-title').text();
    var card_published_date = card.find('.card_published_date').text();
    var card_board_id = card.find('.card_board_id').text();
    var link = card.find('a').attr('href');

    // Set the values in the modal
    $('#editCardTitle').val(title);
    $('#editCardLink').val(link);
    $("#editCardId").val(card_published_date);
    $("#selectBoard").val(card_board_id);
    $('#editCardId').val(card.index()); // Use the card index or unique ID for reference

    // Show the modal
    $('#editModal').modal('show');
}
$('#saveChangesBtn').on('click', function () {
    // Get the updated values
    var updatedTitle = $('#editCardTitle').val();
    var updatedLink = $('#editCardLink').val();
    var cardId = $('#editCardId').val();
    var cardDate = $('#editCardDateTime').val();
    var cardBoard = $('#selectBoard').val();
    // Find the specific card by ID or index
    var card = $('#image-container .maincard').eq(cardId);

    // Update the card content
    card.find('.card-title').text(updatedTitle);
    card.find('.card_published_date').text(cardDate);
    card.find('.card_board_id').text(cardBoard);
    card.find('a').attr('href', updatedLink);

    // Close the modal
    $('#editModal').modal('hide');
});

$(document).on('click', '.pin_copy', function () {
    // Find the closest .maincard element
    var maincard = $(this).closest('.maincard');

    // Clone the maincard
    var clonedCard = maincard.clone();

    // Insert the cloned card after the original card
    maincard.after(clonedCard);
});
$(document).on('click', '.delete_pin', function () {
    var maincard = $(this).closest('.maincard'); // Get the maincard element

    // Show SweetAlert confirmation dialog
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to delete this pin?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Remove the maincard if confirmed
            maincard.remove();

            // Show success message
            Swal.fire(
                'Deleted!',
                'Your pin has been deleted.',
                'success'
            );
        }
    });
});

$(document).on('click', '.uploadtoPinterest', function () {
    var maincard = $(this).closest('.maincard'); // Get the maincard element

    // Show SweetAlert confirmation dialog
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to upload this pin to Pinterest?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, upload it!'
    }).then(async (result) => {
        if (result.isConfirmed) {
            try {
                // Use html2canvas to capture the card image
                const canvas = await html2canvas(maincard[0], { useCORS: true });
                const dataUrl = canvas.toDataURL('image/png'); // Convert to data URL
                const blob = await fetch(dataUrl).then(res => res.blob());

                // Extract the title from the card
                const title = maincard.find('.card-title').text();

                // Create FormData to send to the backend
                const formData = new FormData();
                formData.append('image', blob, 'pin.png');
                formData.append('title', title);

                // Send the image and title to the backend
                const response = await fetch('/upload-pin-to-pinterest', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                });

                const data = await response.json();

                if (data.success) {
                    Swal.fire(
                        'Uploaded!',
                        'Your pin has been uploaded to Pinterest successfully.',
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Error!',
                        'There was an error uploading the pin to Pinterest.',
                        'error'
                    );
                }
            } catch (error) {
                console.error('Error uploading pin:', error);
                Swal.fire(
                    'Error!',
                    'There was an unexpected error.',
                    'error'
                );
            }
        }
    });
});



</script>
</div>
</div>
</main>
@endsection
