<script>
    // Ecouteur d'événement pour détecter la sélection de la date
    document.getElementById('date').addEventListener('change', function() {
        // Récupération de la date sélectionnée
        var date = this.value;
        // Requête AJAX pour récupérer les heures disponibles pour la date sélectionnée
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'get_availability.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Réception de la réponse AJAX
                var availability = JSON.parse(xhr.responseText);
                // Mise à jour des options de l'input d'heure
                var timeSelect = document.getElementById('time');
                timeSelect.innerHTML = '';
                for (var i = 0; i < availability.length; i++) {
                    var option = document.createElement('option');
                    option.value = availability[i];
                    option.text = availability[i];
                    timeSelect.appendChild(option);
                }
            }
        }
        xhr.send('date=' + date);
    });
</script>
