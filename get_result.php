document.getElementById('result-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    const rollNumber = document.getElementById('rollNumber').value;
    const registrationNumber = document.getElementById('registrationNumber').value;
   
    try {
        const response = await fetch('get_result.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ rollNumber, registrationNumber })
        });
       
        const data = await response.json();
       
        if (response.ok) {
            document.getElementById('result-container').innerHTML = `<p>Your result is: ${data.result}</p>`;
        } else {
            document.getElementById('result-container').innerHTML = `<p id="error-message">${data.error}</p>`;
        }
    } catch (error) {
        console.error('Error:', error);
    }
});
