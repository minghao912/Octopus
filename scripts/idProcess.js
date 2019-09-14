const form = document.querySelector('form');

//Listen for form submission
form.addEventListener('submit', e => {
    e.preventDefault();

    //Gather files and begin FormData
    const studentID = document.getElementById("studentIDForm").studentID.value;

    loadJSON("data/id.json", e => {
        const ids = JSON.parse(e);

        if (ids.valid.includes(parseInt(studentID))) {
            window.location.replace("upload/upload.html?id=" + studentID);
        }
    });
});

function loadJSON(path, callback) {
    var xobj = new XMLHttpRequest();
    xobj.overrideMimeType("application/json");
    xobj.open('GET', path, true); // Replace 'my_data' with the path to your file
    xobj.onreadystatechange = function () {
        if (xobj.readyState == 4 && xobj.status == "200") {
            // Required use of an anonymous callback as .open will NOT return a value but simply returns undefined in asynchronous mode
            callback(xobj.responseText);
        }
    };
    xobj.send(null);
}