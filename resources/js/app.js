require('./bootstrap');

if ('serviceWorker' in navigator) {
    // Register a service worker hosted at the root of the
    // site using the default scope.
    navigator.serviceWorker.register('/js/service-worker.js').then(function(registration) {
    }, /*catch*/ function(error) {
    });
} else {
    console.log('Service workers are not supported.');
}

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

