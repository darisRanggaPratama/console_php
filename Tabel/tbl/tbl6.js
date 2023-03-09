const submitBtn = document.getElementById("submit-btn");
const input = document.getElementById("input");
const tableBody = document.getElementById("table-body");

submitBtn.addEventListener("click", function() {
  const inputValue = input.value;

  const row = document.createElement("tr");
  const col = document.createElement("td");
  col.innerText = inputValue;
  row.appendChild(col);
  tableBody.appendChild(row);
});
