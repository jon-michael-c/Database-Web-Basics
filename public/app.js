const summerList = document.getElementById('title-list');
const searchBar = document.getElementById('searchBar');
const status = document.getElementById('status');
let titleData = [];

// Search Bar
searchBar.addEventListener('keyup', (e) => {
    const target = e.target.value;
    const filteredtitles = titleData.filter( (title) => {
        return title.Title.includes(target);
    });

    displayData(filteredtitles);
});

// Grab API
const loadTitles = async () => {
    try {
        const res = await fetch('http://34.121.233.142/Database-Web-Basics/public/read.php');
        titleData = await res.json();
        console.log(titleData);
    
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
                <div class="header">
                    <p>${title.Form}</p>
                    <p> | </p>
                    <p>${title.Duration}</p>
                </div>
                <div class="title">
                    <h2>${title.Title}</h2>
                    <p>${title.Released}</p>
                    <p>${title.Rating}</p>
                </div>
                <p>${title.Descripition}</p>
                <div class="cast">
                    <p><b>Director(s):</b> ${title.Director}</p>
                    <p><b>Cast:</b> ${title.Cast}</p>
                </div>
            </li>
        `;
        })
        .join('');
    summerList.innerHTML = htmlString;
};

loadTitles();

