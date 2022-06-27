function validateForm(){
    document.getElementById("validatetype").textContent = "";
    document.getElementById("validatedate").textContent = "";

    var service = document.getElementById("service").value;
    var date = document.getElementById("date").value;

    var flag = true;

    if(service == "Null")
    {
        document.getElementById("validatetype").textContent = "Please Select Service Type";
        document.getElementById("service").style.border = "1px solid red";
        flag = false;
    }
    if(date == "")
    {
        document.getElementById("validatedate").textContent = "Please Select a Date";
        document.getElementById("date").style.border = "1px solid red";
        flag = false;
    }

    return flag;
}

function clearservicevalidation(){
    document.getElementById("validatetype").textContent = "";
    document.getElementById("service").style.border = "1px solid green";
}
function cleardatevalidation(){
    document.getElementById("validatedate").textContent = "";
    document.getElementById("date").style.border = "1px solid green";
}

var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0 so need to add 1 to make it 1!
var yyyy = today.getFullYear();
if (dd < 10) {
    dd = '0' + dd
}
if (mm < 10) {
    mm = '0' + mm
}

today = yyyy + '-' + mm + '-' + dd;

document.getElementById("date").setAttribute("min", today);