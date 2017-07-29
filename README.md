# Kodvetok new site
# After created new, empty laravel project
## 1. step

npm install <br />
npm install bulma <br />
npm install buefy <br />
npm install font-awesome <br />

## 2. step
app.js -> <br />
* import Buefy from 'buefy';<br />
* Vue.use(Buefy);<br />
<br />
app.scss -> <br />
@import "node_modules/font-awesome/scss/font-awesome";<br />
@import "node_modules/bulma/bulma";<br />
@import "node_modules/buefy/src/scss/buefy";<br />

## 3. step
npm run dev <br />
Setup Laravel environment<br />
Create database<br />
npm run watch<br />

## 4. step
install Laratrust<br />
php artisan migrate<br />
php artisan laratrust:migration<br />
