<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Only</title>
    <style>
        /* Center the card in the viewport */
        body {
        width: 300px; /* Set a fixed width for the rendering area */
        height: 500px; /* Set a fixed height for the rendering area */
        margin: 0; /* Remove default body margin */
        }

        /* Card Style */
        .card-template-1 {
            border: 3px solid #b8c58a; /* Light green border */
            border-radius: 10px;
            background-color: #f8f8f8;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 0;
            width: 300px; /* Set a fixed width */
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
            font-weight: 900 !important;
            padding: 8px;
        }

        .card-template-1 img {
            width: 100%;
            height: auto;
            padding: 15px;
        }
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
font-weight:normal !important;
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

.modal-backdrop.show{
display: none;
}
.container-updated{
 max-width:1300px !important;
}
    </style>
</head>
<body>
    <div class="card card-template-1">
        <div class="card-header">
            <h5 class="card-title">Upper For WOMEN - ENGINE</h5>
            <span class="card_published_date"></span>
            <span class="card_board_id"></span>
        </div>
        <div class="website-link">
            <span>engine.com.pk</span>
        </div>
        <img src="{{$data}}" class="card-img" alt="Upper For WOMEN - ENGINE">
    </div>
</body>
</html>
