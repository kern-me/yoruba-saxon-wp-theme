# Yoruba Saxon Wordpress Theme

## Setup
Must have nodejs installed locally. Strongly recommend running [Local.app](https://localwp.com/) to work with environments.

1. With nodejs installed, run `npm install` from the theme root.
2. Run `gulp` for local development. When ready to commit and push to an environment, run `gulp build` to compile minified `css` and `js`. ⚠️ The `build` directory is committed to the repo due to WPE server scripting restrictions. When updating `.scss` files, ensure that you run `gulp build` before commiting!

## Host
Hosted on WPEngine with two environments:

- Staging (labeled as "Development" ): http://yorubasaxon.wpenginepowered.com/
- Production: http://yorubasaxon.wpenginepowered.com/

## Branching / Deployment
- When pushing the `staging` branch, the github workflow (`.github/workflows/staging.yml`) deploys to the staging environment (http://yorubasaxon.wpenginepowered.com/)
- When pushing the `main` branch, the github workflow (`.github/workflows/prod.yml`) deploys to the live production environment (https://yorubasaxon.com/)

## Workflow
All development should be done on `staging` first, then merge into `main`.



