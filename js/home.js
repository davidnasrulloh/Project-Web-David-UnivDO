const tombolSidebar = document.querySelector("#btn-sidebar");
const sidebar = document.querySelector(".sidebar");
const main = document.querySelector("main");
const aside = document.querySelector("aside");

tombolSidebar.addEventListener("click", () => {
  sidebar.classList.toggle("sidebar-open");
  main.classList.toggle("main-geser");
  aside.classList.toggle("aside-open");
});
