// JavaScript Document
$(function () {
    $("select, input, button").uniform();
});
$(function () {
    var shuffle = function () {
        return 0.5 - Math.random();
    };
    var clocks = [];
    for (var skin in CoolClock.config.skins) {
        if (skin != 'chunkySwissOnBlack') {
            clocks.push('<div class="clock"><canvas class="CoolClock:' + skin + '"                ></canvas></div>');
        }
    }
    // shuffle three times for luck
    $('#clock_show').append(clocks.sort(shuffle).sort(shuffle).sort(shuffle).join('\n'));
    CoolClock.findAndCreateClocks();
});