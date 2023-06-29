window.addEventListener('load', () => {
    $(window).ready(load);
    function load(e) {
        let route = window.location.pathname;
        $('#routeText').text(route.substring(route.lastIndexOf('/') + 1));
        $('#routeText2').text(route.substring(route.lastIndexOf('/') + 1));
    };
});