// Get that hamburger menu cookin' //
var modal = document.getElementById("modalWeddingGift");
var welcomeModal = document.getElementById("welcomeModal");
var containerGallery = document.getElementById("containerGallery")
var containerClosing = document.getElementById("containerClosing")
var ythLabel = document.getElementById('yth')
var toLabel = document.getElementById('to')
var inviteLabel = document.getElementById('invite')
var myAudio = document.getElementById("my_audio");

const queryString = window.location.search
const urlParams = new URLSearchParams(queryString)

if (urlParams.get('to') != null) {
  toLabel.innerHTML = urlParams.get('to')
} else {
  ythLabel.innerHTML = ""
  inviteLabel.innerHTML = ""
}

document.addEventListener("DOMContentLoaded", function () {
  //open welcome modal
  welcomeModal.style.display = 'block'
  // if (urlParams.get('to') != null) {
  // }

  // Get all "navbar-burger" elements
  var $navbarBurgers = Array.prototype.slice.call(
    document.querySelectorAll(".navbar-burger"),
    0
  );
  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {
    // Add a click event on each of them
    $navbarBurgers.forEach(function ($el) {
      $el.addEventListener("click", function () {
        // Get the target from the "data-target" attribute
        var target = $el.dataset.target;
        var $target = document.getElementById(target);
        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
        $el.classList.toggle("is-active");
        $target.classList.toggle("is-active");
      });
    });
  }
});

// play music in background
function toggleAudio(value) {
  return !value.checked ? myAudio.play() : myAudio.pause();
}

// Smooth Anchor Scrolling
$(document).on("click", 'a[href^="#"]', function (event) {
  event.preventDefault();
  $("html, body").animate(
    {
      scrollTop: $($.attr(this, "href")).offset().top
    },
    500
  );
});

// When the user scrolls down 20px from the top of the document, show the scroll up button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("toTop").style.display = "block";
  } else {
    document.getElementById("toTop").style.display = "none";
  }
}

// Preloader
$(document).ready(function ($) {
  $(".preloader-wrapper").fadeOut();
  $("body").removeClass("preloader-site");
});
$(window).load(function () {
  var Body = $("body");
  Body.addClass("preloader-site");
});

function openModal() {
  containerGallery.className = 'container is-blurred'
  containerClosing.className = 'container is-blurred'
  modal.style.display = 'block'
}

function closeModal() {
  modal.style.display = 'none'
  containerGallery.className = 'container'
  containerClosing.className = 'container'
}

function closeWelcomeModal() {
  welcomeModal.style.display = 'none'
  myAudio.play()
}

function copyToClipboard(element) {
  var value = element.innerText
  var popup1 = document.getElementById("popupCopy1")
  var popup2 = document.getElementById("popupCopy2")
  element.id == 'ananda' ? popup1.classList.toggle("show") :
    popup2.classList.toggle("show")

  navigator.clipboard.writeText(value)
    .then(() => {
      console.log("Text copied to clipboard...")
    })
    .catch(err => {
      console.log('Something went wrong', err);
    })
}