// function calculateCost(price) {
    
//     const days = document.getElementById('days').value;
    
//     if (days) {
//       const cost = price * days;
//       document.getElementById('cost').textContent = `Total Cost: $${cost}`;
//     } else {
//       document.getElementById('cost').textContent = 'Please enter the number of days.';
//     }
//   }
  

function calculateCost() {
  const carSelect = document.querySelector("select");
  const selectedOption = carSelect.options[carSelect.selectedIndex];
  const price = selectedOption.getAttribute("data-price");
  const days = document.getElementById("days").value;

  if (price && days) {
    const totalCost = price * days;
    document.getElementById("cost").textContent = `Total Cost: ${totalCost}`;
  } else {
    document.getElementById("cost").textContent = "Please select a car and enter the number of days.";
  }
}