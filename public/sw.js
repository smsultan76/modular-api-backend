self.addEventListener("push", event => {
    const data = event.data.json();

    self.registration.showNotification(data.title, {
        body: data.body,
        icon: "https://via.placeholder.com/128",
        vibrate: [200, 100, 200],
        data: { url: data.url ?? "/" }
    });
});

// Optional — open URL when notification is clicked
self.addEventListener("notificationclick", event => {
    event.notification.close();
    event.waitUntil(
        clients.openWindow(event.notification.data.url)
    );
});
