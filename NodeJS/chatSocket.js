const express = require('express');

const app = express();

const chatSocket = require('http').createServer(app);

const emit = function(sockets, message, data) {
    for (const x in sockets) {
        if (sockets.hasOwnProperty(x) && sockets[x]) {
            sockets[x].emit(message, data);
        }
    }
};

const io = require('socket.io')(chatSocket, {
    cors: { origin: "*"}
});

io.on('connection', (socket) => {
    console.log('connection');

    // sending message functionality
    socket.on('sendMessageToServer', (message) => {
        socket.broadcast.emit('sendMessageToClient', message);
    });


    // typing functionality
    socket.on('sendIsTypingToServer', (data) => {
        socket.broadcast.emit('sendIsTypingToClient', data);
    });



    socket.on('disconnect', (socket) => {
        console.log('Disconnect');
    });
});

chatSocket.listen(3001, () => {
    console.log('Server is running');
});
