// Brand CRUD

var BASE_URL = "http://localhost:3000/brand";

function getBrands() {
  var xmlHttp = new XMLHttpRequest();
  xmlHttp.open("GET", BASE_URL, false);
  xmlHttp.send();
  return xmlHttp.responseText;
}

function getBrand(id) {
  let req = BASE_URL + "/" + id;
  var xmlHttp = new XMLHttpRequest();
  xmlHttp.open("GET", req, false);
  xmlHttp.send();
  return xmlHttp.responseText;
}

function updateBrand(id, newName, newLogo) {
  let req = BASE_URL + "/" + id;
  var xmlHttp = new XMLHttpRequest();
  var body = {
    name: newName ? newName : "",
    logo: newLogo ? newLogo : "",
  };
  xmlHttp.open("PUT", req, false);
  xmlHttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

  xmlHttp.send(JSON.stringify(body));
  return xmlHttp.responseText;
}

function deleteBrand(id) {
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

function addBrand(newName, newLogo) {
  var xmlHttp = new XMLHttpRequest();
  var body = {
    name: newName ? newName : "",
    logo: newLogo ? newLogo : "",
  };
  console.log(body);
  xmlHttp.open("POST", BASE_URL, false);
  xmlHttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

  xmlHttp.send(JSON.stringify(body));
  return xmlHttp.responseText;
}
