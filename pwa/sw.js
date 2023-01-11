const assets = [
    "./",
    "./index.html",
    "./css/style.css",
    "./js/index.js",
    "./images/coffee1.jpg",
    "./images/coffee2.jpg",
    "./images/coffee3.jpg",
    "./images/coffee4.jpg",
    "./images/coffee5.jpg",
    "./images/coffee6.jpg",
    "./images/coffee7.jpg",
    "./images/coffee8.jpg",
    "./images/coffee9.jpg"
  ];
//   ["./", "./css/style.css", "./images/icons/icon-192x192.png"]
self.addEventListener("install", e => {
    e.waitUntil(
        caches.open("static").then(cache => {
            return cache.addAll(assets);
        })
    );
});

self.addEventListener("fetch", e => {
    e.respondWith(
        caches.match(e.request).then(response => {
            return response || fetch(e.request);
        })
    )
})