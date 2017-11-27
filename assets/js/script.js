function breakout_of_frame() {

}

// Break from frame
if (top.location != location) {
    top.location.href = document.location.href;
}