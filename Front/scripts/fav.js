//On écoute le obuton supprimer et on envoie une requête POST pour supprimer des favoris
document.querySelectorAll('.delete-button').forEach(button => {
    button.addEventListener('click', function() {
        console.log('clické');
        const favoriteId = this.getAttribute('data-id');
        const favoriteElement = document.getElementById(`favorite-${favoriteId}`);
        console.log(favoriteElement);
        fetch('../Back/del_fav.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: favoriteId })
        })
        .then(confirm('Voulez vous supprimer cette arme des favoris ?'))
        .then(window.location.reload());
    });
});