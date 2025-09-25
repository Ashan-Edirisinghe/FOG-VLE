const express = require('express');

const app = express();
const server = require('http').createServer(app);

const io =  require('socket.io')(server, {
    cors: {
        origin: "*",
        methods: ["GET", "POST"]
    }
});

io.on('connection', (socket) => {
    console.log('A user connected');


    socket.on('sendNotification', (notification) => {
        console.log('Notification received:', notification);

        // Correct way to broadcast to all connected clients
        io.emit('receiveNotification', notification);
    });

    socket.on('disconnect', () => {
        console.log('A user disconnected');
    });
});

server.listen(3002, () => {
    console.log('Socket.IO Server is running on port 3001');
});