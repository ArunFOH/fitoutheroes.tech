# Database Schema for Fit Out Heroes WordPress Site

## Core WordPress Tables (with foh_ prefix)

### User Management
- `foh_users` - User accounts and basic information
- `foh_usermeta` - Extended user metadata

### Content Management  
- `foh_posts` - Posts, pages, custom post types
- `foh_postmeta` - Post metadata and custom fields
- `foh_comments` - Comments on posts
- `foh_commentmeta` - Comment metadata

### Site Configuration
- `foh_options` - Site settings and configuration
- `foh_links` - Blogroll/link management (legacy)

### Taxonomy & Navigation
- `foh_terms` - Categories, tags, custom taxonomies
- `foh_term_taxonomy` - Taxonomy definitions
- `foh_term_relationships` - Relationship between posts and terms

## Custom Tables (if needed)

### Fitness Tracking (future expansion)
```sql
-- Example custom table for fitness programs
CREATE TABLE foh_fitness_programs (
    id bigint(20) NOT NULL AUTO_INCREMENT,
    program_name varchar(255) NOT NULL,
    description text,
    duration_weeks int(11),
    difficulty_level enum('beginner','intermediate','advanced'),
    created_date datetime DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

-- Example custom table for user fitness data
CREATE TABLE foh_user_fitness_data (
    id bigint(20) NOT NULL AUTO_INCREMENT,
    user_id bigint(20) NOT NULL,
    program_id bigint(20),
    progress_data longtext,
    last_updated datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY user_id (user_id),
    KEY program_id (program_id)
);
```

## Installation Notes

1. WordPress will automatically create the core tables during installation
2. Table prefix is set to `foh_` in wp-config.php
3. Custom tables can be added through plugins or theme activation hooks
4. Always backup database before making schema changes

## Maintenance

- Regular database optimization recommended
- Monitor table sizes for performance
- Consider archiving old data for large sites
- Use proper indexing for custom queries