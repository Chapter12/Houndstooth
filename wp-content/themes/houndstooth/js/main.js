function image_mouseover(el) {
  var prefix = "";
  if (document.domain == 'localhost' ) prefix = "/wordpress";
  el.src = prefix + "/wp-content/themes/houndstooth/img/image_rollover.png";
}
function image_mouseover_large(el) {
  var prefix = "";
  if (document.domain == 'localhost' ) prefix = "/wordpress";
  el.src = prefix + "/wp-content/themes/houndstooth/img/image_rollover_large.png";
}
function image_mouseout(el, src) {
  el.src = src;
}
