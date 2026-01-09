# Gascoigne Furniture WordPress Theme

Custom WordPress theme for Gascoigne Furniture, built with Bootstrap and WooCommerce integration.

---

## Repository & Deployment

**GitHub Repository**: https://github.com/Bangonline/gascoigne

### Branches & Environments

| Branch | Environment | WP Engine Install | Auto-Deploy |
|--------|-------------|-------------------|-------------|
| `develop` | Staging | `gascoignecostg` | ✅ Yes |
| `main` | Production | `gascoigne` | ✅ Yes |

### Deployment Workflow

**Complete deployment guide:** `docs/standards/PROCESSES/WPENGINE_DEPLOYMENT.md`

**Deploy to Staging:**
```bash
git checkout develop
# Make changes
git add .
git commit -m "Your changes"
git push origin develop  # Auto-deploys to gascoignecostg
```

**Deploy to Production:**
```bash
git checkout main
git merge develop  # Merge tested changes from staging
git push origin main  # Auto-deploys to gascoigne (live site)
```

### GitHub Actions

- `.github/workflows/deploy-staging.yml` - Auto-deploys `develop` → gascoignecostg
- `.github/workflows/deploy-production.yml` - Auto-deploys `main` → gascoigne

**What gets deployed:**
- All theme files except: `node_modules/`, `less/`, `scss/`, `.github/`, hidden files
- Compiled CSS is included (`css/` and `css/dist/`)
- Workflow files (`.github/`) are excluded automatically

---

## Local Development

### Prerequisites

- Local by Flywheel or similar WordPress local environment
- Node.js and npm (for Gulp build tools)

### Setup

1. **Clone repository:**
   ```bash
   git clone https://github.com/Bangonline/gascoigne.git
   cd gascoigne
   ```

2. **Checkout develop branch** for active development:
   ```bash
   git checkout develop
   ```

3. **Install dependencies:**
   ```bash
   npm install
   ```

4. **Install theme** in WordPress:
   - Copy to `wp-content/themes/gascoigne-2014/`
   - Activate in WordPress admin

### Build System

**Gulp tasks:**
- `gulp build-css` - Compile SCSS to CSS
- `gulp minify-css` - Minify CSS to `css/dist/`
- `gulp minify-js` - Minify JavaScript to `js/dist/`
- `gulp watch` - Watch for changes and auto-compile
- `gulp` - Run watch task (default)

**Development workflow:**
```bash
# Start watching for changes
gulp

# Edit files in scss/ and js/
# Compiled files automatically generated in css/ and js/dist/

# Commit both source and compiled files
git add .
git commit -m "Update styles"
git push origin develop  # Auto-deploys to staging
```

---

## Features

- **WooCommerce Integration** - Custom product pages and store functionality
- **Bootstrap Framework** - Responsive grid and components
- **ACF Integration** - Custom fields for store locator and content
- **Gulp Build System** - SCSS compilation and asset minification
- **Store Locator** - Find a store functionality
- **Custom Navigation** - Bootstrap navwalker integration

---

## File Structure

```
gascoigne-2014/
├── .github/workflows/       # GitHub Actions deployment
├── acf-json/               # ACF field group JSON
├── css/
│   ├── style.css          # Compiled CSS (tracked in git)
│   └── dist/              # Minified CSS
├── docs/
│   └── standards/         # Symlink to bang-web-standards
├── fonts/                 # Bootstrap glyphicons, Slick fonts
├── img/                   # Theme images and assets
├── js/
│   ├── *.js              # Source JavaScript
│   └── dist/             # Minified JavaScript
├── less/                 # Legacy Bootstrap LESS (not used)
├── scss/                 # SCSS source files (active)
│   ├── _bootstrap.scss
│   ├── _slick.scss
│   └── style.scss
├── parts/                # Template parts
├── woocommerce/          # WooCommerce template overrides
├── functions.php         # Theme functionality
├── style.css            # Theme header (required by WordPress)
├── gulpfile.js          # Gulp build configuration
└── README.md           # This file
```

---

## WP Engine Environments

### Staging (gascoignecostg)
- **Purpose**: Testing and client review
- **Branch**: `develop`
- **Auto-deploy**: Yes

### Production (gascoigne)
- **URL**: www.gascoigne.com.au (or production URL)
- **Purpose**: Live site
- **Branch**: `main`
- **Auto-deploy**: Yes

---

## Git Workflow Best Practices

1. **Always work on `develop` branch** for new features/fixes
2. **Test on staging** before merging to main
3. **Never push directly to `main`** during development
4. **Commit compiled CSS** (staging/production need it)
5. **Create feature branches** for larger changes:
   ```bash
   git checkout -b feature/new-feature
   # Work on feature
   git push origin feature/new-feature
   # Create PR to develop
   ```

---

## Troubleshooting

**Deployment Issues:**
1. Check [GitHub Actions](https://github.com/Bangonline/gascoigne/actions) logs
2. Review `docs/standards/PROCESSES/WPENGINE_DEPLOYMENT.md`
3. Verify WPEngine environment names in workflow files

**Common Issues:**
- Files not deploying → Check `.github/workflows/` configuration
- Permission denied → Verify SSH keys in WPEngine SSH Gateway
- CSS not updating → Ensure compiled CSS is committed to git
- See full troubleshooting guide in standards documentation

---

## Support

For issues or questions, contact Bang Digital development team.

**Repository**: https://github.com/Bangonline/gascoigne

---

**Last Updated**: January 2026
**Deployment Status**: Both Staging & Production Active
