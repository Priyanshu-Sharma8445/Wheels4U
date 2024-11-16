function calculateCost() {
    const car = document.getElementById('car').value;
    const days = document.getElementById('days').value;
  
    const carPrices = {
      'Car Model 1': 50,
      'Car Model 2': 70
    };
  
    if (days) {
      const cost = carPrices[car] * days;
      document.getElementById('cost').textContent = `Total Cost: $${cost}`;
    } else {
      document.getElementById('cost').textContent = 'Please enter the number of days.';
    }
  }
  