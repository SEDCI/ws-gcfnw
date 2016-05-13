// Dashboard Graphs

var lineChartData = {
    labels: months,
    datasets: [{
        label: 'Site Visits',
        backgroundColor: "rgba(0,136,64,0.5)",
        data: counts
    }]
};

window.onload = function() {
    var ctx = document.getElementById("monthlyvisits").getContext("2d");
    window.myBar = new Chart(ctx, {
        type: 'line',
        data: lineChartData,
        options: {
            responsive: true,
            legend: {
                position: 'top',
            }
        }
    });

};
