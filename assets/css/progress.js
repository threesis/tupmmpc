var totalQuestions = 4;
var currentQuestion = 0;
var $progressbar = $("#progressbar");

$("#nextBtn").on("click", function(){
  if (currentQuestion >= totalQuestions){ return; }
  currentQuestion++;
  $progressbar.css("width", Math.round(100 * currentQuestion / totalQuestions) + "%");
  document.getElementById("progressbar").textContent = Math.round(100 * currentQuestion / totalQuestions);
});