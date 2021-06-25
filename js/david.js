const tombolSidebar = document.querySelector("#btn-sidebar");
const sidebar = document.querySelector(".sidebar");
const main = document.querySelector("main");
const aside = document.querySelector("aside");

tombolSidebar.addEventListener("click", ()=> {
  sidebar.classList.toggle("sidebar-close");
  main.classList.toggle("main-geser");
  aside.classList.toggle("aside-close");
});

function hanyaAngka(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

    return false;
  return true;
}

function times(){
  document.getElementById("ubahFont").style.fontFamily = "Times";
}

function fira(){
  document.getElementById("ubahFont").style.fontFamily = "Fira Code";
}

function sans(){
  document.getElementById("ubahFont").style.fontFamily = "sans-serif";
}

function sego() {
  document.getElementById("ubahFont").style.fontFamily = "Segoe UI";
}

// function validasiEmail() {
// 	var rs = document.forms["formInput"]["email"].value;
// 	var atps=rs.indexOf("@");
// 	var dots=rs.lastIndexOf(".");
// 	if (atps<1 || dots<atps+2 || dots+2>=rs.length) {
// 		alert("Alamat email tidak valid.");
// 		return false;
// 	} else {
// 		alert("Alamat email valid.");
// 	}
// }

// function validation(){
//   var form = document.getElementById("form");
//   var email = document.getElementById("email").value;
//   var text = document.getElementById("text");
//   var pattern = /^[^ ]+@[^ ]+.[a-z]{2,3}$/;
  
//   if (email.match(pattern))
//   {
//       form.classList.add("valid");
//       form.classList.remove("invalid");
//       text.innerHTML = "Your Email Address in Valid.";
//       text.style.color = "#00ff00";
//   }
//   else
//   {
//       form.classList.remove("valid");
//       form.classList.add("invalid");
//       text.innerHTML = "Please Enter Valid Email Address.";
//       text.style.color = "#ff0000";
//   }
//   if (email == "")
//   {
//       form.classList.remove("valid");
//       form.classList.remove("invalid");
//       text.innerHTML = "";
//       text.style.color = "#00ff00";
//   }
// }

// const times = document.querySelector("#times");
// const arial = document.querySelector("#arial");
// const sans = document.querySelector("#sans");
// const body = document.getElementsByTagName("body");

// times.addEventListener("click", () => {
//   body.classList.toggle("body1");
// })
