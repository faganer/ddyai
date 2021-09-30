/* eslint-disable no-unused-vars */
/* eslint-disable no-undef */
// Importing JavaScript
//
// You have two choices for including Bootstrap's JS files—the whole thing,
// or just the bits that you need.

// Option 1
//
// Import Bootstrap's bundle (all of Bootstrap's JS + Popper.js dependency)

// import "../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js";

// Option 2
//
// Import just what we need

// If you're importing tooltips or popovers, be sure to include our Popper.js dependency
// import '../node_modules/popper.js/dist/popper.js'
// import '../node_modules/bootstrap/js/dist/util.js'
// // import "../node_modules/bootstrap/js/dist/alert.js";
// import '../node_modules/bootstrap/js/dist/button.js'
// // import "../node_modules/bootstrap/js/dist/carousel.js";
// import '../node_modules/bootstrap/js/dist/collapse.js'
// // import "../node_modules/bootstrap/js/dist/dropdown.js";
// // import "../node_modules/bootstrap/js/dist/index.js";
// import '../node_modules/bootstrap/js/dist/modal.js'
// // import "../node_modules/bootstrap/js/dist/popover.js";
// // import "../node_modules/bootstrap/js/dist/scrollspy.js";
// // import "../node_modules/bootstrap/js/dist/tab.js";
// // import '../node_modules/bootstrap/js/dist/toast.js'
// import '../node_modules/bootstrap/js/dist/tooltip.js'

/**
 * ------------------------------------------------------------------------
 * Common
 * ------------------------------------------------------------------------
 */

// Loading
$(".loading").removeClass("d-none").addClass("d-flex");
window.onload = function () {
  $(".loading").removeClass("d-flex").addClass("d-none");
};

// AOS
// https://github.com/michalsnik/aos/
AOS.init();

// blockquote
$("blockquote").addClass("blockquote");

/**
 * ------------------------------------------------------------------------
 * Header
 * ------------------------------------------------------------------------
 */

// Scroll
// https://github.com/cferdinandi/smooth-scroll/
$(document).on("scroll", function () {
  const scroH = $(document).scrollTop(); // 滚动高度
  if ($("body").hasClass("single")) {
    if (scroH > 56) {
      // 距离顶部大于100px时
      $(".navbar").addClass("scrolled");
    } else {
      $(".navbar").removeClass("scrolled");
    }
  } else {
    if (scroH > 56) {
      // 距离顶部大于100px时
      $(".navbar").addClass("bg-dark scrolled");
    } else {
      $(".navbar").removeClass("bg-dark scrolled");
    }
  }
});
const scroll = new SmoothScroll('a[href*="#"]');

// .navbar-toggler
$(".site-header .navbar-toggler").on("click", function () {
  // if ($('.navbar-collapse').hasClass('show')) {
  //   $('.navbar').addClass('bg-dark')
  // } else {
  //   $('.navbar').removeClass('bg-dark')
  // }
  const expanded = $(this).attr("aria-expanded");
  // console.log(expanded)
  if (expanded === "true") {
    $(".navbar").removeClass("bg-dark");
  } else {
    $(".navbar").addClass("bg-dark");
  }
});

// Nav
$(".menu-primary-container ul li").addClass("nav-item");
$(".menu-primary-container ul li a").addClass("nav-link");
$(".menu-primary-container ul li").each(function () {
  if ($(this).hasClass("current-menu-item")) {
    $(this).addClass("active");
  } else {
    $(this).removeClass("active");
  }
});
const nav = $(".menu-primary-container ul").html();
$("#navbarSupportedContent ul").html(nav);

// Search
$(".search-active").on("click", function () {
  $(".search-form-lg").toggleClass("current");
});

/**
 * ------------------------------------------------------------------------
 * Footer
 * ------------------------------------------------------------------------
 */

// https://getbootstrap.com/docs/4.5/components/modal/#modal-components
$(".site-info .social a").on("click", function () {
  $("#social").on("show.bs.modal", function (event) {
    const button = $(event.relatedTarget);
    const tips = button.data("tips");
    console.log(tips);
    const modal = $(this);
    modal.find(".modal-body p").html(tips);
  });
});

// https://getbootstrap.com/docs/4.5/components/tooltips/
$('[data-toggle="tooltip"]').tooltip();

/**
 * ------------------------------------------------------------------------
 * Home
 * ------------------------------------------------------------------------
 */
$(".home-mod-2 .content .card").on("click", function () {
  $(this)
    .removeClass("shadow-none")
    .addClass("shadow-sm")
    .siblings()
    .removeClass("shadow-sm")
    .addClass("shadow-none");
});
$(".home-mod-2 .content .card").on("mouseover", function () {
  $(this)
    .removeClass("shadow-none")
    .addClass("shadow-sm")
    .siblings()
    .removeClass("shadow-sm")
    .addClass("shadow-none");
});

const clipboard = new ClipboardJS(".code-clipboard");

clipboard.on("success", function (e) {
  $(".modal-code-clipboard .modal-body p span:last").text(e.text);
  $(".modal-code-clipboard").modal("show");
  e.clearSelection();
});

/**
 * ------------------------------------------------------------------------
 * Archive
 * ------------------------------------------------------------------------
 */
$(".wp-pagenavi a,.wp-pagenavi span").wrap('<li class="page-item"></li>');
$(".wp-pagenavi .page-link.current").parent().addClass("active");
const pagenaviHtml =
  '<ul class="pagination">' + $(".wp-pagenavi").html() + "</ul>";
$(".wp-pagenavi").html(pagenaviHtml).addClass("d-inline-block");

/**
 * ------------------------------------------------------------------------
 * Single
 * ------------------------------------------------------------------------
 */
$(".single .entry-body figure").removeAttr("style");
$(".single .entry-body").removeClass("invisible");
$(".single .entry-body img").removeAttr("width").removeAttr("height");
$(".single .entry-body table")
  .addClass("table table-bordered")
  .wrap('<div class="table-responsive"></div>');
$(".single img.size-full").each(function () {
  if ($(this).parent().is("a")) {
    $(this).parent("a").attr("data-fancybox", "images");
    const caption = $(this).parent("a").siblings(".wp-caption-text").text();
    if (caption) {
      $(this).parent("a").attr("data-caption", caption);
    }
  }
});
