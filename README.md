# Fit Out Heroes (FOH.TECH)

A professional WordPress website for Fit Out Heroes - your fitness and wellness technology platform.

## Project Structure

This is a custom WordPress installation with:
- Custom theme: `fitoutheroes`
- Standard WordPress directory structure
- Professional fitness/wellness focused design

## Setup Instructions

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- WordPress 6.0 or higher

### Installation

1. **Database Setup**
   ```sql
   CREATE DATABASE fitoutheroes_db;
   CREATE USER 'your_username'@'localhost' IDENTIFIED BY 'your_password';
   GRANT ALL PRIVILEGES ON fitoutheroes_db.* TO 'your_username'@'localhost';
   FLUSH PRIVILEGES;
   ```

2. **WordPress Configuration**
   - Copy `wp-config-sample.php` to `wp-config.php`
   - Update database credentials in `wp-config.php`
   - Generate security keys at https://api.wordpress.org/secret-key/1.1/salt/
   - Replace the placeholder keys in `wp-config.php`

3. **File Permissions**
   ```bash
   find . -type d -exec chmod 755 {} \;
   find . -type f -exec chmod 644 {} \;
   chmod 600 wp-config.php
   ```

4. **WordPress Installation**
   - Navigate to your domain in a web browser
   - Complete the WordPress installation wizard
   - Activate the "Fit Out Heroes" theme from Admin > Appearance > Themes

## Theme Features

- **Responsive Design**: Mobile-first approach
- **SEO Optimized**: Clean HTML5 structure
- **Performance Focused**: Lightweight and fast loading
- **Fitness/Wellness Ready**: Professional design for health & fitness
- **Widget Areas**: Sidebar and footer widget areas
- **Navigation Menus**: Primary and footer navigation support
- **Custom Logo Support**: Upload your brand logo
- **Post Thumbnails**: Featured image support

## Development

### Directory Structure
```
wp-content/
├── themes/
│   └── fitoutheroes/
│       ├── style.css
│       ├── index.php
│       ├── functions.php
│       ├── header.php
│       ├── footer.php
│       ├── single.php
│       ├── page.php
│       ├── sidebar.php
│       └── js/
│           └── main.js
├── plugins/
└── uploads/
```

### Customization
- Theme files are located in `wp-content/themes/fitoutheroes/`
- Modify `style.css` for custom styling
- Edit `functions.php` for theme functionality
- JavaScript customizations go in `js/main.js`

## Security Notes

- Keep WordPress core and plugins updated
- Use strong passwords
- Implement SSL/HTTPS
- Regular backups recommended
- Consider security plugins for production

## Support

For theme customization and development support, please refer to WordPress documentation or contact the development team.

---

**Fit Out Heroes** - Empowering your fitness journey through technology.
