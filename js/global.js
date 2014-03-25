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

function getAge(birthDate) 
{
    var today = new Date();

    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) 
    {
        age--;
    }
    return age;
}

function getDisplayNameWithEng(name, lastname, nameEng, lastnameEng) {
    var displayText;
    if (name) {
        displayText = name + " " + lastname;
    }

    if (nameEng) {
        if (displayText) {
            displayText += " (" + nameEng + " " + lastnameEng + ")";
        }
        else {
            displayText = nameEng + " " + lastnameEng;
        }
    }

    return displayText;
}