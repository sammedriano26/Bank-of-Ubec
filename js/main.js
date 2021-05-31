"use strict";
// Variables
const toTop = document.querySelector(".to-top");
const footer = document.querySelector(".footer");
const scrollToTopBtn = document.querySelector(".scroll-to-top");
const topOfPage = document.querySelector("#main-nav");

// Go to top using AIO
const showToTopBtn = function (entries) {
  const [entry] = entries;

  if (entry.isIntersecting) toTop.classList.add("show-btn");
  else toTop.classList.remove("show-btn");
};

const showToTopObserver = new IntersectionObserver(showToTopBtn, {
  root: null,
  threshold: 0.5,
});

showToTopObserver.observe(footer);

toTop.addEventListener("click", (e) => {
  e.preventDefault();

  topOfPage.scrollIntoView({
    behavior: "smooth",
  });
});
