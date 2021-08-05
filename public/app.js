const summerList = document.getElementById('summer-list');
const searchBar = document.getElementById('searchBar');
let athletes = [];


// Grab API
const loadSummer = async () => {
    try {
        const res = await fetch('http://34.121.233.142/Database-Web-Basics/public/api.php');
        summerdata = await res.json();
        displayData(athletes);
    } catch (err) {
        console.error(err);
    }
};

// Display Results
const displayData = (data) => {
    const htmlString = data
        .map((athlete) => {
            return `
            <li class="entry">
                <h2>${athlete.Athlete}</h2>
                <p>${athlete.City}</p>
            </li>
        `;
        })
        .join('');
    summerList.innerHTML = htmlString;
};

loadSummer();

// Search Bar
searchBar.addEventListener('keyup', (e) => {
    const target = e.target.value;
    const filteredAthletes = athletes.filter( (athlete) => {
        return athlete.includes(target) || athlete.country.includes(target);
    });

    console.log(filteredAthletes);
});