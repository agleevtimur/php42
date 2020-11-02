const form = document.getElementsByClassName('form')[0];
const comments = document.getElementsByClassName('comments')[0];

form.addEventListener('submit', async (event) => {
    event.preventDefault();
    const formData = new FormData(form);

    await sendAjax(formData)
        .then(responseDate => {
            let comment = createComment(formData.get('name'), formData.get('comment'), responseDate);
            comments.appendChild(comment);
            form.reset();
        })
        .catch(error => console.log(error));
})

function createComment(name, comment, date) {
    let div = document.createElement('div');
    div.innerHTML = `<div class='comment'>
        <h6>${name}</h6>
        <p>${comment}</p>
        <span class='datetime'>${date}</span>
        <hr>
        </div>`;
    return div;
}

//returns date from server
async function sendAjax(formData) {
    let response = await fetch('/index.php', {
        method: 'POST',
        body: formData
    });

    if (!response.ok) {
        throw new Error('error in sendAjax');
    }

    return (await response).text();
}