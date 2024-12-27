(function ($) {
  $(document).ready(function () {
    let mediaFrame;

    // Initialize sortable for drag-and-drop
    $("#aig-gallery-container").sortable({
      items: ".aig-gallery-item",
      cursor: "move",
      placeholder: "aig-placeholder",
      update: function (event, ui) {
        // Optionally, handle the reordering logic here if needed
        console.log("Reordered!");
      },
    });

    // Add images using the WordPress Media Library
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

    // Remove individual image
    $(document).on("click", ".aig-remove-image", function (e) {
      e.preventDefault();
      $(this).closest(".aig-gallery-item").remove();
    });

    // Clear all images
    $("#aig-clear-all-images").on("click", function (e) {
      e.preventDefault();
      $("#aig-gallery-container").empty();
    });
  });
})(jQuery);
