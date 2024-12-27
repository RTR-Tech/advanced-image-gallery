(function ($) {
  $(document).ready(function () {
    // Filter functionality
    $(".filter-button").on("click", function () {
      const filter = $(this).data("filter");
      if (filter === "*") {
        $(".aig-gallery-item").show();
      } else {
        $(".aig-gallery-item").hide();
        $(`.aig-gallery-item.${filter}`).show();
      }
    });

    // Lightbox functionality
    $(".aig-gallery-item img").on("click", function () {
      const src = $(this).attr("src");
      const lightbox = `
        <div class="aig-lightbox">
          <div class="aig-lightbox-content">
            <button class="aig-lightbox-prev">&lt;</button>
            <img src="${src}" />
            <button class="aig-lightbox-next">&gt;</button>
          </div>
        </div>`;
      $("body").append(lightbox);
    });

    $(document).on("click", ".aig-lightbox", function (e) {
      if (
        !$(e.target).hasClass("aig-lightbox-prev") &&
        !$(e.target).hasClass("aig-lightbox-next")
      ) {
        $(this).remove();
      }
    });

    // Lightbox navigation
    $(document).on(
      "click",
      ".aig-lightbox-prev, .aig-lightbox-next",
      function (e) {
        e.preventDefault();
        const currentSrc = $(".aig-lightbox img").attr("src");
        const images = $(".aig-gallery-item img")
          .map(function () {
            return $(this).attr("src");
          })
          .get();
        const currentIndex = images.indexOf(currentSrc);
        let newIndex = currentIndex;

        if ($(this).hasClass("aig-lightbox-prev")) {
          newIndex = currentIndex === 0 ? images.length - 1 : currentIndex - 1;
        } else if ($(this).hasClass("aig-lightbox-next")) {
          newIndex = currentIndex === images.length - 1 ? 0 : currentIndex + 1;
        }

        $(".aig-lightbox img").attr("src", images[newIndex]);
      }
    );
  });
})(jQuery);
