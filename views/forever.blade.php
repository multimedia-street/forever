var server = require('http').Server(),
    io = require('socket.io')(server),
    Redis = require('ioredis'),
    redis = new Redis(),
    port = {{ $port }};

redis.subscribe('{{ $channel }}');

redis.on('message', function(channel, message) {
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
    io.emit(channel, message.data);
    io.emit(message.event, message.data);
});

server.listen(port);
