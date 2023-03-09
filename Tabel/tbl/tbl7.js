$(document).ready(function() {
  $("#submit-btn").click(function() {
    const inputValue = $("#input").val();

    const row = $("<tr>");
    const col = $("<td>").text(inputValue);
    row.append(col);
    $("#table-body").append(row);

    $(this).css({
      "background-color": "blue",
      "color": "white"
    });

    $(this).hover(function() {
      $(this).css("background-color", "navy");
    }, function() {
      $(this).css("background-color", "blue");
    });
  });
});
