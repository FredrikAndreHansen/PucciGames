function openNav() {
  document.getElementById("myNav").style.height = "100%";
  document.body.style.overflow = "hidden";
  document.getElementById("mobileMenu").style.top = "-64px";
}

function closeNav() {
  document.getElementById("myNav").style.height = "0%";
  document.body.style.overflow = "visible";
  document.getElementById("mobileMenu").style.top = "16px";
}