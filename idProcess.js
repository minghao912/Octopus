//Define processing URL and form element
const url = 'idProcess.php';
const form = document.querySelector('form');

//Listen for form submission
form.addEventListener('submit', e => {
    e.preventDefault();

    //Gather files and begin FormData
    const studentID = document.getElementById("studentIDForm").studentID.value;
    const formData = new FormData();

    formData.append('studentID', studentID);

    fetch(url, {
        method: 'POST',
        body: formData
    }).then(response => {
        console.log(response);
    });
});