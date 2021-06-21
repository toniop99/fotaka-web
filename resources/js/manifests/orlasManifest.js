const myDynamicManifest = {
    "background_color": "#fff59d",
    "theme_color": "#ffee58",
    "description": "Orla Interactiva",
    "display": "fullscreen",
    "icons": [
        {
            "src": window.location.origin + '/storage/assets/logo-144.png',
            "sizes": "144x144",
            "type": "image/png"
        },
        {
            "src": window.location.origin + '/storage/assets/logo-512.png',
            "sizes": "512x512",
            "type": "image/png"
        },
        {
            "src": window.location.origin + '/storage/assets/maskable_icon.png',
            "sizes": "196x196",
            "type": "image/png",
            "purpose": "any maskable"
        }

    ],
    "name": "Fotaka",
    "short_name": "Fotaka",
    "start_url": window.location.href
};
const stringManifest = JSON.stringify(myDynamicManifest);
const blob = new Blob([stringManifest], {type: 'application/json'});
const manifestURL = URL.createObjectURL(blob);
document.querySelector('#my-manifest-placeholder').setAttribute('href', manifestURL);
