window.addEventListener("load", () => {
    let myAlerts = document.querySelectorAll(".toast");
    myAlerts.forEach((alert) => {
        let bsAlert = new bootstrap.Toast(alert);
        setTimeout(() => {
            bsAlert.show();
        }, alert.getAttribute("data-delay"));
    });
});

$(".toast").toast(option);
