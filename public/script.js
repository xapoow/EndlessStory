function loadSentences() {
    fetch('get_sentences.php')
        .then(response => response.json())
        .then(data => {
            const historyDiv = document.getElementById('history');
            historyDiv.innerHTML = data.map(s => `${s.text}`).join(' ');
        });
}
function checkLogin() {
    fetch('session_status.php')
        .then(response => response.json())
        .then(data => {
            if (data.logged_in) {
                document.getElementById('logoutForm').style.display = 'flex';
                document.getElementById('authForms').style.display = 'none';
            } else {
                document.getElementById('logoutForm').style.display = 'none';
                document.getElementById('authForms').style.display = 'flex';
            }
        })
        .catch(error => console.error('Error fetching session status:', error)); 
}
window.onload = function() {
    loadSentences();
    checkLogin();
};
