(function ($) {
  $(document).ready(function () {
    let mediaFrame;

    $("#aig-add-images").on("click", function (e) {
      e.preventDefault();

      if (mediaFrame) {
        mediaFrame.open();
        return;
      }

      mediaFrame = wp.media({
        title: AIG_Admin.mediaFrameTitle,
        button: {
          text: AIG_Admin.mediaFrameButton,
        },
        multiple: true,
      });

      mediaFrame.on("select", function () {
        const attachments = mediaFrame.state().get("selection").toJSON();
        attachments.forEach(function (attachment) {
          const itemHTML = `
                        <div class="aig-gallery-item">
                            <img src="${attachment.url}" />
                            <input type="hidden" name="aig_gallery_images[]" value="${attachment.id}" />
                            <button class="aig-remove-image">Remove</button>
                        </div>`;
          $("#aig-gallery-container").append(itemHTML);
        });
      });

      mediaFrame.open();
    });

    $(document).on("click", ".aig-remove-image", function (e) {
      e.preventDefault();
      $(this).closest(".aig-gallery-item").remove();
    });
  });
})(jQuery);
