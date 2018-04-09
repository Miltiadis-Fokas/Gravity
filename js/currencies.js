 
var Currency = {
  rates: {"USD":1.0,"EUR":0.0129042,"GBP":0.0160351},
  convert: function(amount, from, to) {
    return (amount * this.rates[from]) / this.rates[to]; 
  }
};