<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enquiries Chart</title>
    <style>
.goback {
    background-color: #007bff; /* Button background color */
    color: white;             /* Text color */
    border: none;             /* Remove border */
    padding: 10px 20px;       /* Padding for the button */
    font-size: 1rem;          /* Font size */
    font-weight: 400;         /* Font weight */
    border-radius: 5px;       /* Rounded corners */
    cursor: pointer;          /* Pointer cursor on hover */
    transition: background-color 0.3s ease; /* Smooth transition for background color */
}

.goback:hover {
    background-color: #65b4e8; /* Background color on hover */
}

.goback:focus {
    outline: none; /* Remove focus outline */
}

    </style>
</head>
<body>

<div id="chartContainer" style="height: 370px; width: 80%; margin: 20px auto;"></div>

<button class="goback" onclick="goToDashboard()">Go Back to Dashboard</button>

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script>
    window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: "Enquiries per Month"
            },
            axisY: {
                title: "Number of Enquiries",
                includeZero: true
            },
            data: [{
                type: "bar",
                yValueFormatString: "#,##0",
                indexLabel: "{y}",
                indexLabelPlacement: "inside",
                indexLabelFontWeight: "bolder",
                indexLabelFontColor: "white",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
    }

    function goToDashboard() {
        window.location.href = "/sellerpage"; // Replace with your actual dashboard URL
    }
</script>

</body>
</html>
