function toggleActive(e) {
    if (!$(e.target).hasClass("item") && !$(e.target).hasClass("close")) {
      return;
    }
    $(".active").removeClass("active");
    if ($(e.target).hasClass("close")) {
      return;
    }
    $(e.target).addClass("active");
  }