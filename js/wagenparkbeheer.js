$(document).ready(function () {
    let windowSize = $(window).width();
    let videoFile = "../video/wagenparkbeheer/highway_at_night.mp4";

    if (windowSize > 1200) {
        $(".fleet-video-container video source").attr("src", videoFile);
        $(".fleet-video-container video")[0].load();
    }
});