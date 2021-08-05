const summerList = document.getElementById('title-list');
const searchBar = document.getElementById('searchBar');
const status = document.getElementById('status');
let titleData = [];

// Search Bar
searchBar.addEventListener('keyup', (e) => {
    const target = e.target.value;
    const filteredtitles = titleData.filter( (title) => {
        return title.title.includes(target) || title.country.includes(target);
    });

    console.log(filteredtitles);
});

// Grab API
const loadTitles = async () => {
    try {
        const res = await fetch('http://34.121.233.142/Database-Web-Basics/public/api.php');
        titleData = await res.json();
        console.log(titleData);
        displayData(titleData);
    } catch (err) {
        console.error(err);
    }
};

// Display Results
const displayData = (titles) => {
    const htmlString = titles
        .map((title) => {
            return `
            <li class="entry">
                <h2>${title.title}</h2>
                <p>${title.City}</p>
            </li>
        `;
        })
        .join('');
    summerList.innerHTML = htmlString;
};

loadTitles();

