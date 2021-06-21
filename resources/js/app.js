require('./bootstrap');

document.addEventListener('DOMContentLoaded', () => {
    axios.get('/api/orlas/schools').then(({status, data}) => {

        const dropdownMenu = document.querySelector('#orlas-dropdown');
        data.forEach(school => {
            const childElement = `
                <li>
                    <a href="${school.link}" class="dropdown-item">${school.name}</a>
                </li>
            `
            dropdownMenu.innerHTML += childElement
        })
    });
});

