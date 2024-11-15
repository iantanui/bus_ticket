<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Ticket Booking</title>
    
</head>
<body>
    <h1>Bus Ticket Booking</h1>

    <form id="bookingForm" method="POST" action="">
        <div class="form-group">
            <label for="name">Passenger Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <br>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
        </div>

        <br>

        <div class="form-group">
            <label for="seat">Seat Number:</label>
            <input type="number" id="seat" name="seat" min="1" max="50" required>
        </div>
        
        <br>

        <div class="form-group">
            <label for="boarding">Boarding Station:</label>
            <select id="boarding" name="boarding" required>
                <option value="">Select Boarding Station</option>
                <option value="Nairobi">Nairobi</option>
                <option value="Kisumu">Kisumu</option>
                <option value="Mombasa">Mombasa</option>
            </select>
        </div>

        <br>

        <div class="form-group">
            <label for="destination">Destination:</label>
            <select id="destination" name="destination" required>
                <option value="">Select Destination</option>
                <option value="Nairobi">Nairobi</option>
                <option value="Kisumu">Kisumu</option>
                <option value="Mombasa">Mombasa</option>
            </select>
        </div>

        <br>

        <div class="form-group">
            <button type="button" onclick="validateForm()">Book Ticket</button>
        </div>

        <br>
        
    </form>

    <div id="errorMsg" class="error"></div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $seat = $_POST['seat'];
        $boarding = $_POST['boarding'];
        $destination = $_POST['destination'];

        // Fare calculation based on destination
        $fares = [
            "Nairobi" => 500,
            "Kisumu" => 800,
            "Mombasa" => 1000
        ];

        $fare = $fares[$destination];

        echo "<div class='ticket'>";
        echo "<h2>Ticket Confirmation</h2>";
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Address:</strong> $address</p>";
        echo "<p><strong>Seat Number:</strong> $seat</p>";
        echo "<p><strong>Boarding Station:</strong> $boarding</p>";
        echo "<p><strong>Destination:</strong> $destination</p>";
        echo "<p><strong>Total Fare:</strong> KES $fare</p>";
        echo "</div>";
    }
    ?>

    <script>
        function validateForm() {
            const name = document.getElementById('name').value.trim();
            const address = document.getElementById('address').value.trim();
            const seat = document.getElementById('seat').value.trim();
            const boarding = document.getElementById('boarding').value;
            const destination = document.getElementById('destination').value;

            const errorMsg = document.getElementById('errorMsg');
            errorMsg.innerText = '';

            if (!name || !address || !seat || !boarding || !destination) {
                errorMsg.innerText = 'Please fill in all the fields.';
                return;
            }

            if (boarding === destination) {
                errorMsg.innerText = 'Boarding and Destination cannot be the same.';
                return;
            }

            document.getElementById('bookingForm').submit();
        }
    </script>
</body>
</html>
