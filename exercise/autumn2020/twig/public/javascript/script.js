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
});

function createComment(name, comment, date) {
    let div = document.createElement('div');
    div.classList.add('comment');
    div.innerHTML = `<h4>${name}</h4>
        <p>${comment}</p>
        <span class='datetime'>${date}</span>
        <hr>`;

    return div;
}

//returns date from server
async function sendAjax(formData) {
    let response = await fetch('/save', {
        method: 'POST',
        body: formData
    });

    if (!response.ok) {
        throw new Error('error in sendAjax');
    }

    return (await response).json();
}