# Advanced Image Gallery Plugin

## Description
The **Advanced Image Gallery Plugin** is a WordPress plugin that allows users to create, manage, and display highly customizable image galleries. It supports image filters, responsive layouts, and an interactive lightbox feature for a seamless user experience.

---

## Features
- **Dynamic Image Filters**: Filter gallery items based on categories or tags.
- **Lightbox Integration**: Click on images to view them in an elegant lightbox with navigation controls.
- **Responsive Design**: Fully responsive layout for an optimized viewing experience across devices.
- **Admin Interface**: Manage gallery images and their filters using an intuitive meta box in the WordPress admin panel.
- **Bulk Remove Option**: Quickly clear all images in a gallery.

---

## Installation

1. Download the plugin files and extract the `advanced-image-gallery` folder.
2. Upload the folder to the `/wp-content/plugins/` directory.
3. Activate the plugin through the **Plugins** menu in WordPress.

---

## Usage

### Shortcode
Use the `[advanced_image_gallery]` shortcode to display a gallery on any post or page.

#### Example:
```php
[advanced_image_gallery id="123"]
```
- Replace `123` with the ID of your gallery post.

---

## How to Create a Gallery

1. Navigate to the **Galleries** custom post type in the WordPress admin.
2. Click **Add New** to create a new gallery.
3. Add images to your gallery using the "Gallery Images" meta box.
4. Optionally assign filters (tags) to each image.
5. Save the gallery post and use the shortcode on your desired page or post.

---

## File Structure

### Main Files
- `advanced-image-gallery.php`: Main plugin file that initializes the plugin.
- `/includes/`
  - `aig-assets.php`: Manages the loading of CSS and JavaScript files.
  - `aig-meta-box.php`: Handles the gallery images meta box in the admin panel.
  - `aig-post-type.php`: Registers the custom post type for galleries.
  - `aig-shortcodes.php`: Defines the shortcode for rendering the gallery.
- `/assets/`
  - `css/frontend.css`: Styles for the frontend gallery and lightbox.
  - `js/admin.js`: Handles admin-side functionality like adding and removing images.
  - `js/frontend.js`: Manages frontend interactivity, including lightbox and filters.

---

## Development Notes

### JavaScript Functionality
- **Lightbox**:
  - Opens a full-screen view of images with navigation controls.
- **Filters**:
  - Toggle visibility of gallery items based on assigned filters.

### CSS Highlights
- Customizable styles for gallery layout and lightbox.
- Supports responsive designs with animations for a polished look.

---

## Future Enhancements
- Add pagination support for large galleries.
- Include support for video thumbnails.
- Expand filtering options with multi-select functionality.

---

## Support
For support, please contact the plugin developer or submit an issue on the project's repository.

---

## License
This plugin is licensed under the **GPLv2 or later**. Feel free to modify and redistribute it in accordance with the license.

---

## Credits
- **Developer**: Rohan T George  
- **Contact**: [rohantgeorge05@gmail.com](mailto:rohantgeorge05@gmail.com)
- **Website**: [www.rohantgeorge.ca](https://www.rohantgeorge.ca/)

