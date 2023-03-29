var upload = document.getElementById("upload");
var product_price = document.getElementById("product_price");
var product_name = document.getElementById("product_name");
var product_description = document.getElementById("product_description");
var product_quantity = document.getElementById("product_quantity");
var message = document.getElementById("message");
let parent = document.getElementById("parent");
let nav = document.getElementById("nav");
let edit_header = document.getElementById("edit_product_header");
let header = document.getElementById("issue_product");
let edit_submit = document.getElementById("edit_submit");
let edit_message = document.getElementById("edit_message");
let main_page_message = document.getElementById("main_page_message");

function show_detail(x) {
  let request = new XMLHttpRequest();
  request.open("POST", "/getproductinfo");
  request.setRequestHeader("content-type", "application/json");
  request.send(JSON.stringify({ id: x }));
  request.addEventListener("load", function () {
    let pop_title = document.getElementById("pop_title");
    let pop_price = document.getElementById("pop_price");
    let pop_description = document.getElementById("pop_description");
    let pop_image = document.getElementById("pop_image");
    let pop_close = document.getElementById("pop_close");
    let pop_quantity = document.getElementById("pop_quantity");
    let data = JSON.parse(request.responseText);
    pop_up.style.display = "block";
    parent.style.filter = "blur(2px)";
    nav.style.filter = "blur(2px)";
    pop_quantity.innerText = data[0].quantity;
    pop_title.innerText = data[0].name;
    pop_image.setAttribute("src", data[0].path);
    pop_price.innerText = "₹" + data[0].price;
    pop_description.innerText = data[0].description;
    pop_close.addEventListener("click", function () {
      pop_up.style.display = "none";
      parent.style.filter = "blur(0)";
      nav.style.filter = "blur(0)";
    })
  })

}

function sendproduct() {
  var content = new FormData();
  var picname = upload.files[0];
  content.append("quantity", product_quantity.value);
  content.append("description", product_description.value);
  content.append("price", product_price.value);
  content.append("name", product_name.value);
  content.append("path", picname);
  let xml = new XMLHttpRequest();
  xml.open("POST", "/saveproductdetails");
  xml.send(content);
  xml.addEventListener("load", function () {
    console.log(xml.responseText);
    message.innerText = xml.responseText;
    message.style.display = "block";
    product_description.value = "";
    product_name.value = "";
    product_price.value = "";
    product_quantity.value = "";
  })
}

function issue_product() {
  header.style.display = "block";
  parent.style.filter = "blur(2px)";
  nav.style.filter = "blur(2px)";
}
function close_issue() {
  header.style.display = "none";
  parent.style.filter = "blur(0)";
  nav.style.filter = "blur(0)";
}