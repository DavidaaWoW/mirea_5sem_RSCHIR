// Car CRUD

var BASE_URL = "http://localhost:3000/car";

function getCars() {
  var xmlHttp = new XMLHttpRequest();
  xmlHttp.open("GET", BASE_URL, false);
  xmlHttp.send();
  return xmlHttp.responseText;
}

function getCar(id) {
  let req = BASE_URL + "/" + id;
  var xmlHttp = new XMLHttpRequest();
  xmlHttp.open("GET", req, false);
  xmlHttp.send();
  return xmlHttp.responseText;
}

function updateCar(id, newName, newImage) {
  let req = BASE_URL + "/" + id;
  var xmlHttp = new XMLHttpRequest();
  var body = {
    name: newName ? newName : "",
    logo: newImage ? newImage : "",
  };
  xmlHttp.open("PUT", req, false);
  xmlHttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

  xmlHttp.send(JSON.stringify(body));
  return xmlHttp.responseText;
}

function deleteCar(id) {
  let req = BASE_URL + "/" + id;
  var xmlHttp = new XMLHttpRequest();
  xmlHttp.open("DELETE", req, false);
  xmlHttp.send();
  return xmlHttp.responseText;
}

function deleteAll() {
  var xmlHttp = new XMLHttpRequest();
  xmlHttp.open("DELETE", BASE_URL, false);
  xmlHttp.send();
  return xmlHttp.responseText;
}

function addCar(newName, newImage, brandId) {
  var xmlHttp = new XMLHttpRequest();
  var body = {
    name: newName ? newName : "",
    logo: newImage ? newImage : "",
    brandId: brandId,
  };
  console.log(body);
  xmlHttp.open("POST", BASE_URL, false);
  xmlHttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

  xmlHttp.send(JSON.stringify(body));
  return xmlHttp.responseText;
}
