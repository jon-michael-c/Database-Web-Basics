const summerList = document.getElementById('summer-list');
const searchBar = document.getElementById('searchBar');
const status = document.getElementById('status');
let summerdata = [];

// Search Bar
searchBar.addEventListener('keyup', (e) => {
    const target = e.target.value;
    const filteredAthletes = summerdata.filter( (athlete) => {
        return athlete.Athlete.includes(target) || athlete.country.includes(target);
    });

    console.log(filteredAthletes);
});

// Grab API
const loadSummer = async () => {
    try {
        const res = await fetch('http://34.121.233.142/Database-Web-Basics/public/api.php');
        summerdata = await res.json();
        status.innerHTML = "API CONNECTED";
        console.log(summerdata);
        displayData(summerdata);
    } catch (err) {
        status.innerHTML = "API NOT CONNECTED";
        console.error(err);
    }
};

// Display Results
const displayData = (athletes) => {
    const htmlString = athletes
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

