let weaponIndex = [];
let currentPage = 1;
const itemsPerPage = 50;


//Fonction qui permet de récupérer les armes
async function getWeapons() {
  const loadingDiv = document.getElementById('loading');
  try {
    loadingDiv.style.display = 'block';

    const response = await fetch("https://mhw-db.com/weapons");
    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }
    const data = await response.json();
    weaponIndex = data;

    return data;
  } catch (error) {
    console.error("Error fetching weapons:", error);
  } finally {
    loadingDiv.style.display = 'none';
  }
}


//Ici je crée les éléments HTML pour afficher les armes
function createWeaponHTML(weapon) {
  const weaponDiv = document.createElement("div");
  weaponDiv.classList.add("weapon");

  const weaponName = document.createElement("h2");
  weaponName.textContent = weapon.name ? weapon.name : "Nom indisponible";
  weaponDiv.appendChild(weaponName);

  const weaponImage = document.createElement("img");
  weaponImage.src = weapon.assets.image;
  weaponImage.alt = weapon.name ? weapon.name : "Nom indisponible";
  weaponDiv.appendChild(weaponImage);

  const weaponType = document.createElement("p");
  weaponType.textContent = `Type: ${weapon.type}`;
  weaponDiv.appendChild(weaponType);

  const weaponRarity = document.createElement("p");
  weaponRarity.textContent = `Rarity: ${weapon.rarity}`;
  weaponDiv.appendChild(weaponRarity);

  const weaponAttack = document.createElement("p");
  weaponAttack.textContent = `Attack: ${weapon.attack.display}`;
  weaponDiv.appendChild(weaponAttack);

  const favButton = document.createElement("button");
  favButton.textContent = "Ajouter aux favoris";
  favButton.addEventListener("click", () => {
    console.log("Ajouté aux favoris:", weapon.name);
  });
  weaponDiv.appendChild(favButton);

  //On met un event listener sur le bouton qu'on a crée pour ajouter l'arme aux favoris
  favButton.addEventListener("click", () => {
    const weaponData = {
      name: weapon.name,
      type: weapon.type,
      attack: weapon.attack.display,
      image: weapon.assets.image,
    };

    //On envoie une requete POST au back (le server.php) pour ajouter l'arme aux favoris en base de données
    fetch("../Back/addToFav.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(weaponData),
    })
    .then(alert(`${weapon.name} a été ajoutée aux favoris !`));
  });

  return weaponDiv;
}

//Cette fonction permet d'afficher les armes sous forme de page (50 armes par page) on appel la fonction avec la liste de d'arme et le numéro de page (set à 1 au debut du fichier)
function displayWeapons(weapons, page) {
  const weaponsList = document.getElementById("weapons-list");
  weaponsList.innerHTML = "";

  const startIndex = (page - 1) * itemsPerPage;
  const endIndex = page * itemsPerPage;

  const weaponsToDisplay = weapons.slice(startIndex, endIndex);
  weaponsToDisplay.forEach((weapon) => {
    const weaponElement = createWeaponHTML(weapon);
    weaponsList.appendChild(weaponElement);
  });
  updatePagination(weapons.length);
}


//Cette fonction est appelée par displayWeapons pour calculer le nombre de page total a afficher par rapport aux résultats obtenus de l'api
function updatePagination(totalItems) {
  const paginationDiv = document.getElementById("pagination");
  paginationDiv.innerHTML = "";

  const totalPages = Math.floor(totalItems / itemsPerPage);
  console.log('totalPages:', totalPages);

  for (let i = 1; i <= totalPages; i++) {
    const pageButton = document.createElement("button");
    pageButton.textContent = i;
    pageButton.classList.add("page-button");
    if (i === currentPage) {
      pageButton.classList.add("active");
    }
    pageButton.addEventListener("click", () => {
      currentPage = i;
      displayWeapons(weaponIndex, currentPage);
    });
    paginationDiv.appendChild(pageButton);
  }
}

//On attend que le DOM soit chargé pour appeler la fonction getWeapons et afficher les armes avec displayWeapons
document.addEventListener("DOMContentLoaded", async () => {
  console.log("DOM chargé");
  const weapons = await getWeapons();
  if (weapons) {
    displayWeapons(weapons, currentPage);
  } else {
    console.error("No weapons data received.");
  }
});

//On ajoute un event listener sur le bouton de recherche pour filtrer les armes
const searchButton = document.getElementById("search-button");
searchButton.addEventListener("click", searchWeapon);

//Fonction qui permet de filtrer les armes par nom
function searchWeapon() {
  const searchInput = document.getElementById("search");
  const searchTerm = searchInput.value.toLowerCase();

  const filteredWeapons = weaponIndex.filter((weapon) => {
    return weapon.name.toLowerCase().includes(searchTerm);
  });

  displayWeapons(filteredWeapons, 1);
}
