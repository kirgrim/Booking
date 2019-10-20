function setMinDate() {
    let today = new Date(),
        day = today.getDate(),
        month = today.getMonth() + 1,
        year = today.getFullYear();
    if (day < 10) {
        day = '0' + day
    }
    if (month < 10) {
        month = '0' + month
    }
    today = year + '-' + month + '-' + day;

    document.getElementById("sdate").setAttribute("min", today);
    document.getElementById("edate").setAttribute("min", today);
}