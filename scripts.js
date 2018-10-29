require("jquery");
require('jquery-validation');
require("popper.js");
require("bootstrap");
window.$ = window.jQuery;

require("bootstrap-select");
require("bootstrap-select/dist/css/bootstrap-select.css");

// function uncollapse(){
//   $('#results-container').removeClass('collapse');
//   $('#results-container').addClass('col-md-6');
// }

$("#execute").click(()=>{
  $("#results-container").removeClass("collapse");
})
