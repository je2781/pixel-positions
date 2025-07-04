import "./bootstrap";

import.meta.glob(["../images/**"]);

const open = document.getElementById("open-menu");
const backdrop = document.getElementById("backdrop");
const menu = document.getElementById("mobile-menu");
const close = document.getElementById("close-menu");

if (menu && open && close && backdrop) {
  open.addEventListener("click", function () {
    backdrop.classList.remove("hidden");
    backdrop.classList.add("block");
    menu.classList.remove("animate-[fadeOutLeft_0.3s_ease-in_forwards]");
    menu.classList.add("animate-[fadeInLeft_0.3s_ease-out_forwards]");
  });

  close.addEventListener("click", function () {
    backdrop.classList.add("hidden");
    backdrop.classList.remove("block");
    menu.classList.add("animate-[fadeOutLeft_0.3s_ease-in_forwards]");
    menu.classList.remove("animate-[fadeInLeft_0.3s_ease-out_forwards]");
  });

  backdrop.addEventListener("click", function () {
    backdrop.classList.add("hidden");
    backdrop.classList.remove("block");
    menu.classList.add("animate-[fadeOutLeft_0.3s_ease-in_forwards]");
    menu.classList.remove("animate-[fadeInLeft_0.3s_ease-out_forwards]");
  });
}
