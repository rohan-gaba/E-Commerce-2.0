
function sendproduct() {
    console.dir(upload);    
    var content = new FormData();
    var picname = upload.files[0];
    content.append("quantity", product_quantity.value);
    content.append("description", product_description.value);
    content.append("price", product_price.value);
    content.append("name", product_name.value);
    content.append("path", picname);
    let xml = new XMLHttpRequest();
    xml.open("POST", "/add_new_product");
    xml.send(content);
    xml.addEventListener("load", function () {
      console.log(xml.responseText);
      message.innerText = xml.responseText;
      message.style.display = "block";
      product_description.value = "";
      product_name.value = "";
      product_price.value = "";
      product_quantity.value = "";
      upload.files[0]={};
    })
  }
  function show_detail(x) {
    let request = new XMLHttpRequest();
    request.open("POST", "/product_info");
    request.setRequestHeader("content-type", "application/json");
    request.send(JSON.stringify({ id: x }));
    request.addEventListener("load", function () {
      if(request.responseText=='failure')
      {
          
        main_page_message.innerText = "Something Went Wrong,Please try again later";
        main_page_message.style.display = "block";
        return;
      }
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

  
function edit_product_popup(x) {
    let request = new XMLHttpRequest();
    request.open("POST", "/product_info");
    request.setRequestHeader("content-type", "application/json");
    request.send(JSON.stringify({ id: x }));
    request.addEventListener("load", function () {
      if(request.responseText=='failure')
        {
        main_page_message.innerText = "Something Went Wrong";
        main_page_message.style.display = "block";
        return;
        }
      let data = JSON.parse(request.responseText);
      let product_name_edit = document.getElementById("product_name_edit");
      let product_description_edit = document.getElementById("product_description_edit");
      let product_price_edit = document.getElementById("product_price_edit");
      let upload_edit = document.getElementById("upload_edit");
      let product_quantity_edit = document.getElementById("product_quantity_edit");
      edit_submit.setAttribute("key", data[0].product_id);
      console.log(edit_submit.getAttribute("key"));
      product_name_edit.value = data[0].name;
      product_description_edit.value = data[0].description;
      product_price_edit.value = data[0].price;
      product_quantity_edit.value = data[0].quantity;
      upload_edit.files[0] = data[0].path;
      edit_header.style.display = "block";
      parent.style.filter = "blur(2px)";
      nav.style.filter = "blur(2px)";
    })
  }
  function edit_product(x) {
    var content = new FormData();
    var picname = upload_edit.files[0];
    content.append("quantity", product_quantity_edit.value);
    content.append("description", product_description_edit.value);
    content.append("price", product_price_edit.value);
    content.append("name", product_name_edit.value);
    content.append("path", picname);
    content.append("product_id", edit_submit.getAttribute("key"));
    content.append("oldpath", "abc");
    let xml = new XMLHttpRequest();
    xml.open("POST", "/edit_product");
    xml.send(content);
    xml.addEventListener("load", function () {
        edit_message.innerText = "*"+xml.responseText;
        edit_message.style.display = "block";
        edit_message.style.color = "red";
    })
  
  }
  function close_edit_popup() {
    edit_header.style.display = "none";
    parent.style.filter = "blur(0)";
    nav.style.filter = "blur(0)";
  }
  
  function delete_product(x) {
    let xml = new XMLHttpRequest();
    xml.open("POST", "/delete_seller_products");
    xml.setRequestHeader("content-type", "application/json");
    xml.send(JSON.stringify({ "id": x }));
    xml.addEventListener("load", function () {
      if (xml.responseText == "success") {
        let element = document.getElementById(x);
        parent.removeChild(element);
      }
      else {
        main_page_message.innerText = "Something Went Wrong";
        main_page_message.style.display = "block";
      }
    })
  
  }
  