const cacheName = 'fotakaweb-v1';
const appShellFiles = [
    '/',
    '/favicon.png',
    '/js/app.js',
    '/js/bootstrap.js',
    '/css/app.css'
];

const carouselImages = [
    '/storage/home/carousel/1.jpg',
    '/storage/home/carousel/2.jpg',
    '/storage/home/carousel/3.jpg',
    '/storage/home/carousel/4.jpg',
    '/storage/home/carousel/5.jpg',
    '/storage/home/carousel/6.jpg',
    '/storage/home/carousel/7.jpg',
];

const contentToCache = appShellFiles.concat(carouselImages);

self.addEventListener('install', (e) => {
    e.waitUntil(
        caches.open(cacheName).then((cache) => {
            return cache.addAll(contentToCache);
        })
    )
});

self.addEventListener('fetch', function(event) {
    event.respondWith(
       caches.match(event.request).then((response) => {
           return response || fetch(event.request).then((cache) => {
               cache.put(event.request, response.clone());
               return response;
           });
       })
   )
});
