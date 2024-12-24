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
            <button id="scrape-btn" class="tp-btn">Gneerate Pins</button>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
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
            // Clear the container first
            $('#image-container').empty();
            $('#loading-spinner').hide();

            // Display images in cards (limit to 10)
            const images = response.slice(0, 50); // Limit to 50 items
            images.forEach(function(item) {
                // Select the template based on user selection
                var card = '';
                if (template == '1') {
                    // Template 1
                    card = `
                        <div class="col-md-3">
                            <div class="card card-template-1">
                                <div class="card-header">
                                    <h5 class="card-title">${item.description}</h5>
                                </div>
                                <div class="website-link">
                                    <span>${new URL(item.link).hostname}</span>
                                </div>
                                <img src="${item.image}" class="card-img" alt="${item.description}">
                            </div>
                        </div>
                    `;

                } else if (template == '2') {
                    // Template 2
                    card = `
                            <div class="col-md-3">
                                <div class="card card-template-2">
                                    <div class="card-image">
                                        <img src="${item.image}" class="img-fluid" alt="${item.description}">
                                    </div>
                                    <div class="card-body">
                                        <p class="card-title">${item.description}</p>
                                        <a href="${item.link}" target="_blank" class="btn btn-link" style="display: none;">Visit</a>
                                    </div>
                                </div>  
                                <div class="card-toolbar">
                                    <div class="icon-group">
                                        <i class="fab fa-pinterest"></i>
                                        <i class="fas fa-clock"></i>
                                        <i class="fas fa-download"></i>
                                        <i class="fas fa-pen edit-icon" onclick="enableEdit(this)"></i>
                                        <i class="fab fa-android"></i>
                                    </div>
                                    <div class="icon-group">
                                        <i class="fas fa-sync-alt"></i>
                                        <i class="far fa-copy"></i>
                                        <i class="fas fa-lock-open"></i>
                                        <i class="fas fa-cog"></i>
                                        <i class="fas fa-trash-alt"></i>
                                    </div>
                                </div>
                            </div>
                        `;

                } else if (template == '3') {
                    // Template 3: Pinterest-Style Vertical Card
                    card = `<div class="col-md-3">
                            <div class="card card-template-3">
                                <div class="card-header">
                                    <h5 class="card-title">${item.description}</h5>
                                </div>
                                <img src="${item.image}" class="card-img" alt="${item.description}">
                                <div class="card-footer">
                                    <span>${new URL(item.link).hostname}</span>
                                    <a href="${item.link}" target="_blank" class="btn btn-link" style="display: none;">Visit</a>
                                </div>
                            </div>
                        </div>
                    `;

                } else if (template == '4') {
                    // Template 4: Minimalist Card with Hover Effect
                    card = `
                        <div class="col-md-3">
                            <div class="card card-template-4">
                                <img src="${item.image}" class="card-img-top" alt="${item.description}">
                                <div class="card-body">
                                    <span class="card-title">${item.description}</span>
                                    <a href="${item.link}" target="_blank" class="btn btn-link" style="display: none;">Visit</a>
                                </div>
                            </div>
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
function enableEdit(editIcon) {
    // Find the closest card element
    const card = editIcon.closest('.card');

    if (!card) {
        console.error('Card element not found');
        return;
    }

    // Find the title element within the card
    const titleElement = card.querySelector('.card-title');

    if (!titleElement) {
        console.error('Title element not found');
        return;
    }

    // Replace the span with an input field for editing
    const currentText = titleElement.textContent;
    const inputField = document.createElement('input');
    inputField.type = 'text';
    inputField.value = currentText;
    inputField.className = 'edit-title-input';

    // Replace the title element with the input field
    titleElement.replaceWith(inputField);

    // Focus on the input field
    inputField.focus();

    // Save changes when the input field loses focus
    inputField.addEventListener('blur', () => {
        const newTitle = inputField.value;
        const newTitleElement = document.createElement('p');
        newTitleElement.className = 'card-title';
        newTitleElement.textContent = newTitle;

        // Replace the input field with the new title
        inputField.replaceWith(newTitleElement);
    });
}

</script>
</div>
</div>
</main>
@endsection
