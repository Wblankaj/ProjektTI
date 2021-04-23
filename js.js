
const form = document.querySelector("form");
const inputName = form.querySelector("input[name=name]");
const inputLastName = form.querySelector("input[name=lastName]");
const inputEmail = form.querySelector("input[name=email]");
const inputPhoneNumber = form.querySelector("input[name=phoneNumber]");
const inputPesel = form.querySelector("input[name=pesel]");
const inputDateOfBirth = form.querySelector("input[name=DateOfBirth]");
const inputBirthPlace = form.querySelector("input[name=birthPlace]");
const inputStreet = form.querySelector("input[name=street]");
const inputZipCode = form.querySelector("input[name=zipCode]");
const inputCityRes = form.querySelector("input[name=cityRes]");


var emailPattern = /[a-z0-9\.+_-]+@[a-z0-9]+(\.[a-z0-9]+)*\.[a-z]{2,3}$/i;
var zipCodePattern = /^[0-9]{2}-[0-9]{3}$/;
var phonePattern = /^[0-9]{9}$/;
var peselPattern = /^[0-9]{11}$/;
var streetPattern = /^([A-ZŚŹŻŁĆa-zęłćńóżąźś]{1,30}\s){1,3}([0-9]){1,3}$/;
var textPattern = /^[A-ZŚŹŻŁĆa-zęłćńóżąźś]{2,30}$/;
var cityPattern = /^[A-ZŚŹŻŁĆa-zęłćńóżąźś]{2,30}(\s{1}[A-ZŚŹŻŁĆa-zęłćńóżąźś]{1,30}){0,2}$/;



form.onsubmit = function () {
    var fail=0;
    
    if (!textPattern.test(inputName.value)) {
        document.getElementById("iname").innerHTML = "Wypełnij poprawnie pole z imieniem";
        fail++;

    } else {
        document.getElementById("iname").innerHTML = "";

    }
    if (!textPattern.test(inputLastName.value)) {
        document.getElementById("ilastname").innerHTML = "Wypełnij poprawnie pole z nazwiskiem";
        fail++;
    } else {
        document.getElementById("ilastname").innerHTML = "";
    }
    if (!emailPattern.test(inputEmail.value)) {
        document.getElementById("iemail").innerHTML = "Wypełnij poprawnie pole z adresem email";
        fail++;
    } else {
        document.getElementById("iemail").innerHTML = "";
    }
    if (!phonePattern.test(inputPhoneNumber.value)) {
        document.getElementById("iphone").innerHTML = "Wypełnij poprawnie pole z numerem telefonu";
        fail++;
    } else {
        document.getElementById("iphone").innerHTML = "";
    }

    if (!peselPattern.test(inputPesel.value)) {
        document.getElementById("ipesel").innerHTML = "Wypełnij poprawnie pole z numerem pesel";
        fail++;
    } else {
        document.getElementById("ipesel").innerHTML = "";
    }
    if (!cityPattern.test(inputBirthPlace.value)) {
        document.getElementById("ibirthplace").innerHTML = "Wypełnij poprawnie pole z miejscem urodzenia";
        fail++;
    } else {
        document.getElementById("ibirthPlace").innerHTML = "";
    }
    if (!streetPattern.test(inputStreet.value)) {
        document.getElementById("istreet").innerHTML = "Wypełnij poprawnie pole z ulicą i numerem";
        fail++;
    } else {
        document.getElementById("istreet").innerHTML = "";
    }
    if (!zipCodePattern.test(inputZipCode.value)) {
        document.getElementById("izipCode").innerHTML = "Wypełnij poprawnie pole z kodem pocztowym";
        fail++;
    } else {
        document.getElementById("izipCode").innerHTML = "";
    }
    if (!cityPattern.test(inputCityRes.value)) {
        document.getElementById("icity").innerHTML = "Wypełnij poprawnie pole z miastem zamieszkania";
        fail++;
    } else {
        document.getElementById("icity").innerHTML = "";
    }


    if (fail==0) {

        return true;

    } else {

        return false;
    }
}
