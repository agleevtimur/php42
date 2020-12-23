const redButton = document.getElementById('red');
const greenButton = document.getElementById('green');
const blueButton = document.getElementById('blue');
const container = document.getElementById('container');

container.addEventListener('click', async () => {
   event.preventDefault();

   let element = event.target;
   let response = await fetch('http://localhost:8000/log_button', {
       method: 'POST',
       headers: {
           'Content-Type': 'application/json',
       },
       body: JSON.stringify(element.id)
   });

   if (!response.ok) {
       console.log(response.error);
   } else {
       alert('Button has been logged!');
   }
});