
window.onload = function() {

    document.getElementById("menuButton").addEventListener('click', menuStyle,false);


};
function menuStyle() {
    var id = $("ul#menu li:first").get(0).id;
    if (id == "menuButton") {
        $("#menuButton").attr('id', 'menuButtona');
        $(".menuItem").attr('class', 'menuItema');
    } else {
        $("#menuButtona").attr('id', 'menuButton');
        $(".menuItema").attr('class', 'menuItem');
    }
}