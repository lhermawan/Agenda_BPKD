// script.js
document.getElementById('eventForm').addEventListener('submit', function(event) {
    event.preventDefault();
    addEvent();
});

function addEvent() {
    const eventName = document.getElementById('eventName').value;
    const eventKategori = document.getElementById('eventKategori').value;
    const eventDatetime = document.getElementById('eventDatetime').value;
    const formData = new FormData();
    formData.append('eventName', eventName);
    formData.append('eventKategori', eventKategori);
    formData.append('eventDatetime', eventDatetime);

    fetch('manage_events.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('status').textContent = data;
        loadEvents();
    })
    .catch(error => console.error('Error:', error));
}

function loadEvents() {
    fetch('manage_events.php')
    .then(response => response.json())
    .then(data => {
        const eventList = document.getElementById('eventList');
        eventList.innerHTML = '';
        data.forEach(event => {
            const eventItem = document.createElement('li');
            eventItem.textContent = `${event.event_name} - ${new Date(event.event_datetime).toLocaleString()}`;
            eventList.appendChild(eventItem);

            scheduleAlarm(event.event_name, new Date(event.event_datetime));
        });
    })
    .catch(error => console.error('Error:', error));
}

function scheduleAlarm(eventName, eventDatetime) {
    const now = new Date();
    const notifyTime = new Date(eventDatetime.getTime() - 30 * 60 * 1000); // 30 minutes before event

    if (notifyTime <= now) {
        return;
    }

    const timeToAlarm = notifyTime - now;

    setTimeout(() => {
        triggerAlarm(eventName);
    }, timeToAlarm);
}

function triggerAlarm(eventName) {
    
    const audioBefore = new Audio('http://localhost/agenda/audio/tingtung.mp3');
    audioBefore.play();

    responsiveVoice.speak(`30 menit lagi menuju acara ${eventName}!`, 'Indonesian Female', {
        onend: function() {
            // Play MP3 after speaking
            const audioAfter = new Audio('http://localhost/agenda/audio/tingtung.mp3');
            audioAfter.play();
        }
    });
}

// Load events when the page loads
document.addEventListener('DOMContentLoaded', loadEvents);
