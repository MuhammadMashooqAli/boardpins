
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
// async function saveAllCards() {
//     const cards = document.querySelectorAll('.card');
//     const formData = new FormData();
//     const uploadUrl = '/upload-pin-images'; // Backend route

//     for (let i = 0; i < cards.length; i++) {
//         const card = cards[i];

//         try {
//             // Optimize html2canvas with proper settings
//             const canvas = await html2canvas(card, {
//                 useCORS: true,
//                 logging: false, // Disable logging to speed up
//                 imageTimeout: 5000, // Limit image fetch time
//                 onclone: (clonedDoc) => {
//                     // Remove unnecessary elements
//                     clonedDoc.querySelectorAll('link, script').forEach(el => el.remove());
//                 },
//             });

//             // Convert canvas to Blob and append to FormData
//             const dataUrl = canvas.toDataURL('image/png');
//             const blob = await fetch(dataUrl).then(res => res.blob());
//             formData.append(`pins[${i}]`, blob, `pin_${i}.png`);
//         } catch (error) {
//             console.error(`Error capturing card ${i}:`, error);
//         }
//     }

//     // Upload all images in one request
//     try {
//         const response = await fetch(uploadUrl, {
//             method: 'POST',
//             body: formData,
//             headers: {
//                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
//             },
//         });

//         const data = await response.json();
//         if (data.success) {
//             alert('All pins saved successfully!');
//         } else {
//             alert('Failed to save pins.');
//         }
//     } catch (error) {
//         console.error('Error uploading pins:', error);
//     }
// }

$('#saveAllCards').on('click', function () {
    const cards = [];
    const uploadUrl = '/upload-pin-images'; // Backend route
      // Show SweetAlert confirmation dialog
      Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to save all pins",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, save them!'
    }).then((result) => {
        if (result.isConfirmed) {
    $('.card').each(function () {
        const title = $(this).find('.card-title').text(); // Get the card title
        const imgSrc = $(this).find('.card-img').attr('src'); // Get the image link
        const btnLink = $(this).find('a.btn').attr('href'); // Get the button link (if available)
        const board_id = $(this).find('.card_board_id').text(); // Get the card title
        const cardHtml = $(this).prop('outerHTML'); // Get the entire card HTML

        cards.push({
            title: title.trim(), // Trim whitespace
            img: imgSrc,
            btn_link: btnLink,
            board_id: board_id,
            html: cardHtml,
        });
    });

    $.ajax({
        url: uploadUrl, // Laravel route
        type: "POST",
        data: {
            _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // CSRF token
            cards: cards, // Array of card data
        },
        success: function (response) {
            toastr.success('Pins Saved Successfully', 'Success');
            $("#image-container").html('');
            $("#fetchUrl").val('');
            document.getElementById('saveAllCards').style.display = 'none';
        },
        error: function () {
            toastr.error('An error occurred while saving cards.', 'Success');
        },
    });
 }
});
});


document.addEventListener('DOMContentLoaded', function () {
    // Trigger the AJAX request when the button is clicked
document.getElementById('scrape-btn').addEventListener('click', function() {
    var url = $("#fetchUrl").val();  // Get the URL from the input
    if(url == ""){
        toastr.error('Please enter valid link!', 'Error');
        return false;
    }
      // Show SweetAlert confirmation dialog
      Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to fetch images from the given link?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, fetch it!'
    }).then((result) => {
        if (result.isConfirmed) {
    var url = $("#fetchUrl").val();  // Get the URL from the input
    var limit = 10;  // Limit to 10 items
    var template = $('#templateSelect').val();  // Get the selected template type
    $('#loading-spinner').show();
    $('#image-container').empty();
    // Send AJAX request to the controller
    $.ajax({
        url: "./generate-pin-post",  // Replace with your route
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
                document.getElementById('saveAllCards').style.display = 'block';
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            $('#loading-spinner').hide();
        }
    });
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

function deletePin(pinId){
    const uploadUrl = '/delete-pin/'+pinId; // Backend route
    $.ajax({
        url: uploadUrl, // Laravel route
        type: "GET",
        success: function (response) {
           
        },
        error: function () {
        },
    });
}

$('#schedulling').on('click', function () {
    $('#scehduleYourPins').modal('show');
});
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

$('#saveChangesBtnUpdated').on('click', function () {
    // Get the updated values
    const cards = [];
    var updatedTitle = $('#editCardTitle').val();
    var updatedLink = $('#editCardLink').val();
    var cardId = $('#editCardId').val();
    var cardDate = $('#editCardDateTime').val();
    var cardBoard = $('#selectBoard').val();
    // Find the specific card by ID or index
    var maincard = $('#image-container .maincard').eq(cardId);
    var pinId = maincard.data('pin'); // or use card.attr('data-pin') if you prefer
    // Update the card content
    var card = maincard.find('.card');
    card.find('.card-title').text(updatedTitle);
    card.find('.card_published_date').text(cardDate);
    card.find('.card_board_id').text(cardBoard);
    card.find('a').attr('href', updatedLink);

    const title = card.find('.card-title').text(); // Get the card title
    const imgSrc = card.find('.card-img').attr('src'); // Get the image link
    const btnLink = card.find('a.btn').attr('href'); // Get the button link (if available)
    const board_id = card.find('.card_board_id').text(); // Get the card title
    const cardHtml = card.prop('outerHTML'); // Get the entire card HTML

    cards.push({
        title: updatedTitle, // Trim whitespace
        img: imgSrc,
        btn_link: btnLink,
        board_id: board_id,
        html: cardHtml,
    });
    const uploadUrl = '/save-pin/'+pinId; // Backend route
    $.ajax({
        url: uploadUrl, // Laravel route
        type: "POST",
        data: {
            _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // CSRF token
            cards: cards, // Array of card data
        },
        success: function (response) {
            toastr.success('Pins Saved Successfully', 'Success');
        },
        error: function () {
            toastr.error('An error occurred while saving cards.', 'Error');
        },
    });
    
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

    if(maincard.data('pin')){
        var pinId = maincard.data('pin'); // or use card.attr('data-pin') if you prefer
        if(pinId){
            deletePin(pinId);
        }
    }


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
            toastr.success('Your pin has been deleted.', 'Success');
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

