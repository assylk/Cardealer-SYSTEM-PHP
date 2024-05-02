$(function () {
  "use strict";

  // On window's load
  $(window).on("load", function () {
    populateColorPlates();
    setTimeout(function () {
      $(".page_loader").fadeOut("fast");
      $('link[id="style_sheet"]').attr("href", "assets/css/skins/default.css");
      $(".logo img").attr("src", "assets/img/logos/logo.png");
    }, 1000);
    if ($("body .filter-portfolio").length > 0) {
      $(function () {
        $(".filter-portfolio").filterizr({
          delay: 0,
        });
      });
      $(".filteriz-navigation li").on("click", function () {
        $(".filteriz-navigation .filtr").removeClass("active");
        $(this).addClass("active");
      });
    }
  });

  // WOW animation library initialization
  var wow = new WOW({
    animateClass: "animated",
    offset: 100,
    mobile: false,
  });
  wow.init();

  // Megamenu activation
  $(".megamenu").on("click", function (e) {
    e.stopPropagation();
  });

  // DROPDOWN ON HOVER

  /*    $(".dropdown").on('hover', function () {
            $('.dropdown-menu', this).stop().fadeIn("fast");
        },
        function () {
            $('.dropdown-menu', this).stop().fadeOut("fast");
        });*/

  // Counter Activation
  function isCounterElementVisible($elementToBeChecked) {
    var TopView = parseInt($(window).scrollTop());
    var BotView = parseInt(TopView + $(window).height());
    var TopElement = parseInt($elementToBeChecked.offset().top);
    var BotElement = parseInt(TopElement + $elementToBeChecked.height());
    return BotElement <= BotView && TopElement >= TopView;
  }
  $(window).scroll(function () {
    $(".counter").each(function () {
      var isOnView = isCounterElementVisible($(this));
      if (isOnView && !$(this).hasClass("Starting")) {
        $(this).addClass("Starting");
        $(this)
          .prop("Counter", 0)
          .animate(
            {
              Counter: $(this).text(),
            },
            {
              duration: 3000,
              easing: "swing",
              step: function (now) {
                $(this).text(Math.ceil(now));
              },
            }
          );
      }
    });
  });

  // Full  Page Search Activation
  $(function () {
    $('a[href="#full-page-search"]').on("click", function (event) {
      event.preventDefault();
      $("#full-page-search").addClass("open");
      $('#full-page-search > form > input[type="search"]').focus();
    });

    $("#full-page-search, #full-page-search button.close").on(
      "click keyup",
      function (event) {
        if (
          event.target === this ||
          event.target.className === "close" ||
          event.keyCode === 27
        ) {
          $(this).removeClass("open");
        }
      }
    );

    $("form").on("submit", function (event) {
      event.preventDefault();
      return false;
    });
  });

  // Page scroller initialization.
  $.scrollUp({
    scrollName: "page_scroller",
    scrollDistance: 300,
    scrollFrom: "top",
    scrollSpeed: 500,
    easingType: "linear",
    animation: "fade",
    animationSpeed: 200,
    scrollTrigger: false,
    scrollTarget: false,
    scrollText: '<i class="fa fa-chevron-up"></i>',
    scrollTitle: false,
    scrollImg: false,
    activeOverlay: false,
    zIndex: 2147483647,
  });

  // Magnify activation
  $(".car-magnify-gallery").each(function () {
    $(this).magnificPopup({
      delegate: "a",
      type: "image",
      gallery: { enabled: true },
    });
  });

  $(".portfolio-item").magnificPopup({
    delegate: "a",
    type: "image",
    gallery: { enabled: true },
  });

  // Range sliders activation
  $(".range-slider-ui").each(function () {
    var minRangeValue = parseInt($(this).attr("data-min"));
    var maxRangeValue = parseInt($(this).attr("data-max"));
    var minName = $(this).attr("data-min-name");
    var maxName = $(this).attr("data-max-name");
    var unit = $(this).attr("data-unit");

    $(this).append(
      "" +
        "<span class='min-value'></span> " +
        "<span class='max-value'></span>" +
        "<input class='current-min' type='hidden' name='" +
        minName +
        "'>" +
        "<input class='current-max' type='hidden' name='" +
        maxName +
        "'>"
    );
    $(this).slider({
      range: true,
      min: minRangeValue,
      max: maxRangeValue,
      values: [minRangeValue, maxRangeValue],
      slide: function (event, ui) {
        event = event;
        var currentMin = parseInt(ui.values[0]);
        var currentMax = parseInt(ui.values[1]);
        $(this)
          .children(".min-value")
          .text(currentMin + " " + unit);
        $(this)
          .children(".max-value")
          .text(currentMax + " " + unit);
        $(this).children(".current-min").val(currentMin);
        $(this).children(".current-max").val(currentMax);
      },
    });

    var currentMin = parseInt($(this).slider("values", 0));
    var currentMax = parseInt($(this).slider("values", 1));
    $(this)
      .children(".min-value")
      .text(currentMin + " " + unit);
    $(this)
      .children(".max-value")
      .text(currentMax + " " + unit);
    $(this).children(".current-min").val(currentMin);
    $(this).children(".current-max").val(currentMax);
  });

  // Select picket activation
  $("select").selectBox({
    mobile: true,
  });

  // Dropdown activation
  $(".dropdown-menu a.dropdown-toggle").on("click", function (e) {
    if (!$(this).next().hasClass("show")) {
      $(this)
        .parents(".dropdown-menu")
        .first()
        .find(".show")
        .removeClass("show");
    }

    var $subMenu = $(this).next(".dropdown-menu");
    $subMenu.toggleClass("show");
    $(this)
      .parents("li.nav-item.dropdown.show")
      .on("hidden.bs.dropdown", function (e) {
        $(".dropdown-submenu .show").removeClass("show");
      });

    return false;
  });

  // Modal activation
  $(".car-video").on("click", function () {
    $("#carModal").modal("show");
  });

  // Google map activation
  function LoadMap(propertes) {
    var defaultLat = 40.7110411;
    var defaultLng = -74.0110326;
    var mapOptions = {
      center: new google.maps.LatLng(defaultLat, defaultLng),
      zoom: 15,
      scrollwheel: false,
      styles: [
        {
          featureType: "administrative",
          elementType: "labels",
          stylers: [{ visibility: "off" }],
        },
        {
          featureType: "water",
          elementType: "labels",
          stylers: [{ visibility: "off" }],
        },
        {
          featureType: "poi.business",
          stylers: [{ visibility: "off" }],
        },
        {
          featureType: "transit",
          elementType: "labels.icon",
          stylers: [{ visibility: "off" }],
        },
      ],
    };
    var map = new google.maps.Map(document.getElementById("map"), mapOptions);
    var infoWindow = new google.maps.InfoWindow();
    var myLatlng = new google.maps.LatLng(40.7110411, -74.0110326);

    var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
    });
    (function (marker) {
      google.maps.event.addListener(marker, "click", function (e) {
        infoWindow.setContent(
          "" +
            "<div class='map-properties contact-map-content'>" +
            "<div class='map-content'>" +
            "<p class='address'>123 Kathal St. Tampa City </p>" +
            "<ul class='map-properties-list'> " +
            "<li><i class='fa fa-phone'></i>  +0477 8556 552</li> " +
            "<li><i class='fa fa-envelope'></i>  themevessel.us@gmail.com</li> " +
            "<li><a href='index.html'><i class='fa fa-globe'></i>  http://http://themevessel.com</li></a> " +
            "</ul>" +
            "</div>" +
            "</div>"
        );
        infoWindow.open(map, marker);
      });
    })(marker);
  }

  if ($("#map").length) {
    LoadMap();
  }

  // Countdown activation
  $(function () {
    // Add background image
    //$.backstretch('../img/nature.jpg');
    var endDate = "December  27, 2019 15:03:25";
    $(".countdown.simple").countdown({ date: endDate });
    $(".countdown.styled").countdown({
      date: endDate,
      render: function (data) {
        $(this.el).html(
          "<div>" +
            this.leadingZeros(data.days, 3) +
            " <span>Days</span></div><div>" +
            this.leadingZeros(data.hours, 2) +
            " <span>Hours</span></div><div>" +
            this.leadingZeros(data.min, 2) +
            " <span>Minutes</span></div><div>" +
            this.leadingZeros(data.sec, 2) +
            " <span>Seconds</span></div>"
        );
      },
    });
    $(".countdown.callback")
      .countdown({
        date: +new Date() + 10000,
        render: function (data) {
          $(this.el).text(this.leadingZeros(data.sec, 2) + " sec");
        },
        onEnd: function () {
          $(this.el).addClass("ended");
        },
      })
      .on("click", function () {
        $(this)
          .removeClass("ended")
          .data("countdown")
          .update(+new Date() + 10000)
          .start();
      });
  });

  // Multi-item carousel activation
  var itemsMainDiv = ".multi-carousel";
  var itemsDiv = ".multi-carousel-inner";
  var itemWidth = "";

  $(".leftLst, .rightLst").on("click", function () {
    var condition = $(this).hasClass("leftLst");
    if (condition) click(0, this);
    else click(1, this);
  });
  ResCarouselSize();

  $(window).resize(function () {
    ResCarouselSize();
    resizeModalsContent();
  });

  function ResCarouselSize() {
    var incno = 0;
    var dataItems = "data-items";
    var itemClass = ".item";
    var id = 0;
    var btnParentSb = "";
    var itemsSplit = "";
    var sampwidth = $(itemsMainDiv).width();
    var bodyWidth = $("body").width();
    $(itemsDiv).each(function () {
      id = id + 1;
      var itemNumbers = $(this).find(itemClass).length;
      btnParentSb = $(this).parent().attr(dataItems);
      itemsSplit = btnParentSb.split(",");
      $(this)
        .parent()
        .attr("id", "multiCarousel" + id);

      if (bodyWidth >= 1200) {
        incno = itemsSplit[3];
        itemWidth = sampwidth / incno;
      } else if (bodyWidth >= 992) {
        incno = itemsSplit[2];
        itemWidth = sampwidth / incno;
      } else if (bodyWidth >= 768) {
        incno = itemsSplit[1];
        itemWidth = sampwidth / incno;
      } else {
        incno = itemsSplit[0];
        itemWidth = sampwidth / incno;
      }
      $(this).css({
        transform: "translateX(0px)",
        width: itemWidth * itemNumbers,
      });
      $(this)
        .find(itemClass)
        .each(function () {
          $(this).outerWidth(itemWidth);
        });

      $(".leftLst").addClass("over");
      $(".rightLst").removeClass("over");
    });
  }

  function ResCarousel(e, el, s) {
    var leftBtn = ".leftLst";
    var rightBtn = ".rightLst";
    var translateXval = "";
    var divStyle = $(el + " " + itemsDiv).css("transform");
    var values = divStyle.match(/-?[\d\.]+/g);
    var xds = Math.abs(values[4]);
    if (e === 0) {
      translateXval = parseInt(xds) - parseInt(itemWidth * s);
      $(el + " " + rightBtn).removeClass("over");

      if (translateXval <= itemWidth / 2) {
        translateXval = 0;
        $(el + " " + leftBtn).addClass("over");
      }
    } else if (e === 1) {
      var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
      translateXval = parseInt(xds) + parseInt(itemWidth * s);
      $(el + " " + leftBtn).removeClass("over");

      if (translateXval >= itemsCondition - itemWidth / 2) {
        translateXval = itemsCondition;
        $(el + " " + rightBtn).addClass("over");
      }
    }
    $(el + " " + itemsDiv).css(
      "transform",
      "translateX(" + -translateXval + "px)"
    );
  }

  function click(ell, ee) {
    var Parent = "#" + $(ee).parent().attr("id");
    var slide = $(Parent).attr("data-slide");
    ResCarousel(ell, Parent, slide);
  }

  // Typed string activation
  if ($("#typed-strings").length > 0) {
    var typed = new Typed("#typed", {
      stringsElement: "#typed-strings",
      typeSpeed: 100,
      backSpeed: 0,
      backDelay: 1000,
      startDelay: 1000,
      loop: true,
    });
  }

  if ($("#typed-strings2").length > 0) {
    var typed = new Typed("#typed2", {
      stringsElement: "#typed-strings2",
      typeSpeed: 100,
      backSpeed: 0,
      backDelay: 1000,
      startDelay: 1000,
      loop: true,
    });
  }

  if ($("#typed-strings3").length > 0) {
    var typed = new Typed("#typed3", {
      stringsElement: "#typed-strings3",
      typeSpeed: 100,
      backSpeed: 0,
      backDelay: 1000,
      startDelay: 1000,
      loop: true,
    });
  }

  //Youtube carousel activation
  if ($(".player").length > 0) {
    $(document).on("ready", function () {
      $(".player").mb_YTPlayer();
    });
  }

  resizeModalsContent();
  function resizeModalsContent() {
    var winWidth = $(window).width();
    var videoWidth = 333;
    if (winWidth < 992) {
      videoWidth = 500;
    }
    var ratio = 0.72072;
    var videoHeight = videoWidth * ratio;
    $(".modalIframe").css("height", videoHeight);
  }

  // Switching Color schema
  function populateColorPlates() {
    var plateStings =
      '<div class="option-panel option-panel-collased">\n' +
      "    <h2>Change Color</h2>\n" +
      '    <div class="color-plate default-plate" data-color="default"></div>\n' +
      '    <div class="color-plate blue-plate" data-color="blue"></div>\n' +
      '    <div class="color-plate yellow-plate" data-color="yellow"></div>\n' +
      '    <div class="color-plate red-plate" data-color="red"></div>\n' +
      '    <div class="color-plate green-light-plate" data-color="green-light"></div>\n' +
      '    <div class="color-plate orange-plate" data-color="orange"></div>\n' +
      '    <div class="color-plate yellow-light-plate" data-color="yellow-light"></div>\n' +
      '    <div class="color-plate green-light-2-plate" data-color="green-light-2"></div>\n' +
      '    <div class="color-plate olive-plate" data-color="olive"></div>\n' +
      '    <div class="color-plate purple-plate" data-color="purple"></div>\n' +
      '    <div class="color-plate blue-light-plate" data-color="blue-light"></div>\n' +
      '    <div class="color-plate brown-plate" data-color="brown"></div>\n' +
      '    <div class="setting-button">\n' +
      '        <i class="fa fa-gear"></i>\n' +
      "    </div>\n" +
      "</div>";
    $("body").append(plateStings);
  }
  $(document).on("click", ".color-plate", function () {
    var name = $(this).attr("data-color");
    $('link[id="style_sheet"]').attr(
      "href",
      "assets/css/skins/" + name + ".css"
    );
    if (name === "default") {
      $(".logo img").attr("src", "assets/img/logos/logo.png");
    } else {
      $(".logo img").attr("src", "assets/img/logos/" + name + "-logo.png");
    }
  });

  $(document).on("click", ".setting-button", function () {
    $(".option-panel").toggleClass("option-panel-collased");
  });
});
