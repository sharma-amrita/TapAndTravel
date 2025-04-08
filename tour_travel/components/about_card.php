<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<style>
    .Exploration-card-container {
        display: flex;
        flex-wrap: wrap; /* Allows the cards to wrap */
        gap: 20px;
        justify-content: space-between;
        margin: 30px 29px;
    }

    .Exploration-card {
        display: flex;
        flex: 1 1 100%; /* Make each card take 100% width by default */
        height: auto; /* Allow height to adjust automatically */
        min-height: 250px; /* Ensure each card has a minimum height */
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 10px;
        background-color: rgb(252, 252, 252);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .Exploration-card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transform: translateY(-10px);
        background-color: rgb(248, 239, 207);
    }

    .Exploration-card-icon {
        font-size: 40px;
        color: rgb(10, 4, 133); /* Blue color for travel theme */
        margin-right: 20px;
    }

    .Exploration-card-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 100%;
    }

    .Exploration-card-content h3 {
        margin: 0;
        font-size: 24px;
        font-weight: bold;
    }

    .Exploration-card-content p {
        font-size: 14px;
        color: black;
    }

    /* Large screen - 3 cards per row */
    @media screen and (min-width: 1025px) {
        .Exploration-card {
            flex: 1 1 30%; /* 3 cards per row for larger screens */
        }
    }

    /* Medium screen - 2 cards per row */
    @media screen and (max-width: 1024px) {
        .Exploration-card {
            flex: 1 1 45%; /* 2 cards per row for medium screens (tablets) */
        }
    }

    /* Small screen - 1 card per row */
    @media screen and (max-width: 768px) {
        .Exploration-card {
            width: 100% !important; /* Force cards to take full width */
            flex: 1 1 100% !important; /* Ensure flex behavior is fully enforced */
            margin-bottom: 15px; /* Optional: Add some space between cards */
        }

        /* Adjust padding of the container */
        .Exploration-card-container {
            padding: 7px !important; /* Remove any padding around the container */
            margin: 0; /* Optional: Reset any margin on the container */
        }
    }
</style>

<div class="Exploration-card-container px-5">
    <div class="Exploration-card">
        <div class="Exploration-card-icon">
            <i class="fas fa-globe"></i> <!-- Exploration -->
        </div>
        <div class="Exploration-card-content">
            <h3>Exploration</h3>
            <p>We inspire the spirit of adventure, encouraging travelers to discover new places, cultures, and experiences that broaden their horizons.</p>
        </div>
    </div>
    <div class="Exploration-card">
        <div class="Exploration-card-icon">
            <i class="fas fa-route"></i> <!-- Journey -->
        </div>
        <div class="Exploration-card-content">
            <h3>Journey</h3>
            <p>We believe every journey is a story, filled with memorable moments and unique experiences that create lasting memories.</p>
        </div>
    </div>
    <div class="Exploration-card">
        <div class="Exploration-card-icon">
            <i class="fas fa-heart"></i> <!-- Hospitality -->
        </div>
        <div class="Exploration-card-content">
            <h3>Hospitality</h3>
            <p>We prioritize warm, welcoming experiences, ensuring every traveler feels comfortable, cared for, and valued on their journey.</p>
        </div>
    </div>
</div>
