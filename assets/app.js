// import { forEach } from 'core-js/core/array';
import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

document.addEventListener("DOMContentLoaded", function(event) {
  var req = new XMLHttpRequest();
  const selectElement = document.querySelector("#student_career");
  const selectorAsignatura = document.querySelector("#student_asignature");
  selectorAsignatura.innerHTML = "";
  selectElement.addEventListener("change", (event) => {
    var asignaturasCarreras = "/asignature/json/" + selectElement.value
    req.open('GET', asignaturasCarreras, true);
      req.onload = function () {
        var s = req.status;
        if ((s >= 200 && s < 300 && s != 204) || s === 304) {
          var res = JSON.parse(req.responseText);
          selectorAsignatura.innerHTML = "";
          res.forEach(function callback(currentValue, index, array) {
            var option = document.createElement("option");
            option.text = currentValue;
            option.value = index + 1;
            selectorAsignatura.add(option , index);
        });
        }
      };
      req.send();
  })
});


 