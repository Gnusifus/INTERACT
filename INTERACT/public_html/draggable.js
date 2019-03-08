$(document).ready(function() {
  $(".node").draggable({
    obstacle: ".main",
    preventCollision: true,
    containment: ".middle"
});
});
