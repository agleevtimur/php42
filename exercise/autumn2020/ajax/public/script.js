const button = document.getElementById('button');
const input = document.getElementById('input');

button.addEventListener('click', async () => {
    let field = await fetch('/get')
        .then(response => response.json());
    input.value += field;
});