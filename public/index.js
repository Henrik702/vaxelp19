async function loadUsers() {
    const csvFileInput = document.getElementById('csvFileInput');
    const file = csvFileInput.files[0];

    if (!file) {
        alert('Please select a CSV file.');
        return;
    }

    const formData = new FormData();
    formData.append('action', 'loadUsers');
    formData.append('csvFile', file);

    try {
        const response = await fetch('/api.php', {
            method: 'POST',
            body: formData,
            headers: {
                'Accept': 'application/json'
            }
        });

        const data = await response.json();

        if (response.ok) {
            alert('Users loaded successfully!');
        } else {
            alert(`Error: ${data.error}`);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred while processing the request.');
    }
}

async function sendToQueue() {
    const mailingName = document.getElementById('mailingName').value;
    const mailingText = document.getElementById('mailingText').value;

    const formData = new FormData();
    formData.append('action', 'sendToQueue');
    formData.append('mailingName', mailingName);
    formData.append('mailingText', mailingText);

    try {
        const response = await fetch('/api.php', {
            method: 'POST',
            body: formData,
            headers: {
                'Accept': 'application/json'
            }
        });

        const data = await response.json();

        if (response.ok) {
            alert('Users sent to mailing queue successfully!');
        } else {
            alert(`Error: ${data.error}`);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred while processing the request.');
    }
}

async function stopMailing() {
    const formData = new FormData();
    formData.append('action', 'stopMailing');

    try {
        const response = await fetch('/api.php', {
            method: 'POST',
            body: formData,
            headers: {
                'Accept': 'application/json'
            }
        });

        const data = await response.json();

        if (response.ok) {
            alert('Mailing stopped!');
        } else {
            alert(`Error: ${data.error}`);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred while processing the request.');
    }
}

async function resumeMailing() {
    const formData = new FormData();
    formData.append('action', 'resumeMailing');

    try {
        const response = await fetch('/api.php', {
            method: 'POST',
            body: formData,
            headers: {
                'Accept': 'application/json'
            }
        });

        const data = await response.json();

        if (response.ok) {
            alert('Mailing resumed!');
        } else {
            alert(`Error: ${data.error}`);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred while processing the request.');
    }
}