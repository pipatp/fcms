function formatDbTime(timeText) {
    return timeText.substr(0, 2) + ":" + timeText.substr(2, 2);
}

function paddingTwoDigit(num) {
    var numText = "" + num;
    if (num < 10) {
        numText = "0" + numText;
    }

    return numText;
}

function calculateDuration(start, end) {
    var h1 = parseInt(start.substr(0, 2));
    var m1 = parseInt(start.substr(2, 2));

    var h2 = parseInt(end.substr(0, 2));
    var m2 = parseInt(end.substr(2, 2));

    return ((h2-h1)*60) + (m2-m1);
}