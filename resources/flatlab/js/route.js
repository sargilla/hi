var routes = window.Laravel.routes
module.exports = function () {
    var args = Array.prototype.slice.call(arguments);
    var name = args.shift();
    if (routes[name] === undefined) {
        console.error('Ruta no encontrada ', name);
    } else {
        return window.Laravel.baseUrl + '/' + routes[name]
            .split('/')
            .map(s => s[0] == '{' ? args.shift() : s)
            .join('/');
    }
};