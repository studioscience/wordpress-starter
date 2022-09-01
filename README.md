# Dev Set Up
1. Install [Docker](https://docs.docker.com/engine/install/)
2. Install [WP-CLI](https://make.wordpress.org/cli/handbook/guides/installing/)
3. Setup keys for [WP Engine SSH Gateway](https://wpengine.com/support/ssh-gateway/)
  - connect dbsync in `bin/db-sync`
4. Enter the command `make start` to build the local dev servers
5. Enter the command `make sync` to sync database and upload dirs to your machine
6. Visit `http://127.0.0.1:8000` in a web browser to view the site

# Starter Theme

Webpack is set up to build the theme files. All NPM commands should be run in `ss-wordpress-starter/` rather than the project root.

## Structure

```
starter-theme/
├── acf-json/
├── assets/
├── dist/
├── functions/
├── template-parts/
├── [...theme-files].php
├── functions.php
└── style.css

```

### `acf-json/`

JSON files that mimic ACF's database entries. When ACF fields are updated, it will automatically update these JSON files so that changes are saved in version control. When a change is detected in one of these files that is not in your local ACF DB entries, a _sync_ option will appear in the ACF plugin settings for each fieldgroup with updates.

### `assets/`

Contains SCSS and JS files that are not strongly tied to an individual component.

### `dist/`

Minified distribution files.

### `functions/`

WordPress theme functions. Functionality should be broken up into logical files and `require_once`'d in the root `functions.php` file.

### `template-parts/`

Reusable templates that can be called with `get_template_part()` in theme files.

### `functions.php`

WordPress's entrypoint for PHP functions and hooks.

### `styles.css`

Every WordPress theme requires a file called `styles.css` that contains a formatted comment with metadata about the field. We are not including any actual CSS in this file.

### Other root PHP files

The other PHP files are theme files. When rendering a page, WordPress looks for a theme file that matches the content it tries to render. It starts by looking for highly specific files, before falling back to more and more generic files (eventually defaulting to `index.php`).

- [WordPress Template Hierarchy](https://developer.wordpress.org/themes/basics/template-hierarchy/)
- [Template Hierarchy visualized](https://wphierarchy.com)

## Theme Development

### `npm run watch`

This will watch all JS and style files in the theme for changes and then run linters & build on save accordingly.

### `npm run lint`

Manually runs linters with the `--fix` command. This is also run as a pre-commit hook.

## Contributing

### Branching Strategy and Naming

<!-- This project is following a [trunk-based](https://www.atlassian.com/continuous-delivery/continuous-integration/trunk-based-development)
development strategy. When starting a new body of work, branch from `main` and name your branch folling this
convention: -->

```
[name/[ticket-number]/[short-description]
```

This convention:

- Connects the branch to Shortcut (formerly Clubhouse) automations
- Reflects group, rather than individual, ownership of features

### Code Reviews

All pull requests made into the dev or main branch will require at least 1 approval prior to merging. This is intended to:

- Keep developers informed of their teammates’ work
- Encourage team ownership of work
- Encourage discussion and criticism within project team

If changes are pushed to an open pull request, any approvals on that PR will be dismissed.
