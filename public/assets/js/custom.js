/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./resources/assets/js/custom.js ***!
  \***************************************/
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
(function ($) {
  "use strict";

  // ______________ Page Loading
  $(window).on("load", function (e) {
    $("#global-loader").fadeOut("slow");
  });

  // ______________Full screen
  $(document).on("click", ".fullscreen-button", function toggleFullScreen() {
    $('html').addClass('fullscreen');
    if (document.fullScreenElement !== undefined && document.fullScreenElement === null || document.msFullscreenElement !== undefined && document.msFullscreenElement === null || document.mozFullScreen !== undefined && !document.mozFullScreen || document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen) {
      if (document.documentElement.requestFullScreen) {
        document.documentElement.requestFullScreen();
      } else if (document.documentElement.mozRequestFullScreen) {
        document.documentElement.mozRequestFullScreen();
      } else if (document.documentElement.webkitRequestFullScreen) {
        document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
      } else if (document.documentElement.msRequestFullscreen) {
        document.documentElement.msRequestFullscreen();
      }
    } else {
      $('html').removeClass('fullscreen');
      if (document.cancelFullScreen) {
        document.cancelFullScreen();
      } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else if (document.webkitCancelFullScreen) {
        document.webkitCancelFullScreen();
      } else if (document.msExitFullscreen) {
        document.msExitFullscreen();
      }
    }
  });

  // ______________Cover Image
  $(".cover-image").each(function () {
    var attr = $(this).attr('data-bs-image-src');
    if (_typeof(attr) !== ( true ? "undefined" : 0) && attr !== false) {
      $(this).css('background', 'url(' + attr + ') center center');
    }
  });

  // ______________ Horizonatl
  $("a[data-bs-theme]").on('click', function () {
    $("head link#theme").attr("href", $(this).data("theme"));
    $(this).toggleClass('active').siblings().removeClass('active');
  });
  $("a[data-bs-effect]").on('click', function () {
    $("head link#effect").attr("href", $(this).data("effect"));
    $(this).toggleClass('active').siblings().removeClass('active');
  });

  // ___________TOOLTIP
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });

  // __________Popover
  var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
  var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl);
  });

  // ______________Back to top Button
  $(window).on("scroll", function (e) {
    if ($(this).scrollTop() > 0) {
      $('#back-to-top').fadeIn('slow');
    } else {
      $('#back-to-top').fadeOut('slow');
    }
  });
  $("#back-to-top").on("click", function (e) {
    $("html, body").animate({
      scrollTop: 0
    }, 0);
    return false;
  });

  // ______________ Global Search
  $(document).on("click", "[data-bs-toggle='search']", function (e) {
    var body = $("body");
    if (body.hasClass('search-gone')) {
      body.addClass('search-gone');
      body.removeClass('search-show');
    } else {
      body.removeClass('search-gone');
      body.addClass('search-show');
    }
  });
  var toggleSidebar = function toggleSidebar() {
    var w = $(window);
    if (w.outerWidth() <= 1024) {
      $("body").addClass("sidebar-gone");
      $(document).off("click", "body").on("click", "body", function (e) {
        if ($(e.target).hasClass('sidebar-show') || $(e.target).hasClass('search-show')) {
          $("body").removeClass("sidebar-show");
          $("body").addClass("sidebar-gone");
          $("body").removeClass("search-show");
        }
      });
    } else {
      $("body").removeClass("sidebar-gone");
    }
  };
  toggleSidebar();
  $(window).on('resize', toggleSidebar);
  var DIV_CARD = 'div.card';

  // ______________ Input file-browser
  $(document).on('change', ':file', function () {
    var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  }); // We can watch for our custom `fileselect` event like this

  //______File Upload
  $(':file').on('fileselect', function (event, numFiles, label) {
    var input = $(this).parents('.input-group').find(':text'),
      log = numFiles > 1 ? numFiles + ' files selected' : label;
    if (input.length) {
      input.val(log);
    } else {
      if (log) {}
    }
  });
  var bodyRtl = $('body').hasClass('rtl');
  if (bodyRtl) {
    $('body').addClass('rtl');
    $("html[lang=en]").attr("dir", "rtl");
  }
  ;
  $("#password-toggle a").on('click', function (event) {
    event.preventDefault();
    if ($('#password-toggle input').attr("type") == "text") {
      $('#password-toggle input').attr('type', 'password');
      $('#password-toggle i').addClass("fe-eye-off");
      $('#password-toggle i').removeClass("fe-eye");
    } else if ($('#password-toggle input').attr("type") == "password") {
      $('#password-toggle input').attr('type', 'text');
      $('#password-toggle i').removeClass("fe-eye-off");
      $('#password-toggle i').addClass("fe-eye");
    }
  });
  $('.app-sidebar__toggle').on('click', function (e) {
    e.preventDefault();
    $('body').addClass('main-navbar-show');
  });
  $('body').append('<div class="main-navbar-backdrop"></div>');
  $('.main-navbar-backdrop').on('click touchstart', function () {
    $('body').removeClass('main-navbar-show');
  });
  $('body').append('<div class="main-navbar-backdrop"></div>');
  $('.main-navbar-backdrop').on('click touchstart', function () {
    $('body').removeClass('sidenav-toggled');
  });
  document.querySelector('body').setAttribute('autocomplete', 'off');
  var inputs = document.querySelectorAll('input');
  inputs.forEach(function (e) {
    e.setAttribute('autocomplete', 'off');
  });
})(jQuery);
/******/ })()
;

if($(".app-sidebar__user-name").text()=="superadmin" || $(".app-sidebar__user-name").text()=="BOSS"){
  $("#resendverification").css('display','block');
}else{
  $("#resendverification").css('display','none');
}

setTimeout(function () {

    setOriginalSelect($("[name='custom_9']"), 0);
    setOriginalSelect($("[name='custom_10']"), 1);

    $("[name='custom_9']").attr('disabled', 'disabled')
    $("[name='custom_10']").attr('disabled', 'disabled')


    $("[name='custom_8']").on('change', function () {
        $("[name='custom_9']").removeAttr('disabled');
        $("[name='custom_10']").removeAttr('disabled');
        restoreOptions($("[name='custom_9']"), 0);
        restoreOptions($("[name='custom_10']"), 1);

        var re = new RegExp('.*' + $(this).val().trim() + '.*', "gi");

        removeOptions($("[name='custom_9']"), $("[name='custom_9'] option")
            .filter(function() {
                return  !this.value.match(re);
            }));

        removeOptions($("[name='custom_10']"), $("[name='custom_10'] option")
            .filter(function() {
                return  !this.value.match(re);
            }));


    });

    $("[name='custom_9']").on('change', function () {
        restoreOptions($("[name='custom_10']"));

        let val = $(this).val();

        let re0 = /(.*\()(.*)(\).*)/g;

        val = re0.exec(val);
        console.log(val);

        val[1] = val[1].replace('(', '');
        val[1] = val[1].replace(')', '');
        val[2] = val[2].replace('(', '');
        val[2] = val[2].replace(')', '');


        var re2 = new RegExp('.*' + val[1].trim() + '.*', "gi");

        var re = new RegExp('.*' + val[2].trim() + '.*', "gi");

        removeOptions($("[name='custom_10']"), $("[name='custom_10'] option")
            .filter(function() {

                console.log(re);
                console.log(re2);
                console.log(this.value);


                return  !(this.value.match(re) && this.value.match(re2));
            }));

    });


}, 500);

var orig = [];

function restoreOptions (select, i) {
    if (orig[i] != undefined) {
        select.html(orig[i]);
    }
}

function setOriginalSelect (select, i) {
    if (orig[i] == undefined) {
        orig[i] = select.html();
    } // If it's already there, don't re-set it
}

function removeOptions (select, options) {
    options.remove();
}
