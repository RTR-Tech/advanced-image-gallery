(function ($) {
  $(document).ready(function () {
    $(".aig-gallery-item img").on("click", function () {
      const src = $(this).attr("src");
      const lightbox = `
                <div class="aig-lightbox">
                    <div class="aig-lightbox-content">
                        <img src="${src}" />
                    </div>
                </div>`;
      $("body").append(lightbox);
    });

    $(document).on("click", ".aig-lightbox", function () {
      $(this).remove();
    });
  });
})(jQuery);
