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
php artisan make:model Role<br />
php artisan make:model Permission<br />
composer dump-autoload<br />
php artisan laratrust:seeder<br />

## 5. step
### Summary of Roles
* Super Admin – somebody with access to the site network administration features and all other features. See the Create a Network article.<br />
* Administrator (slug: 'administrator') – somebody who has access to all the administration features within a single site.<br />
* Editor (slug: 'editor') – somebody who can publish and manage posts including the posts of other users.<br />
* Author (slug: 'author') – somebody who can publish and manage their own posts.<br />
* Contributor (slug: 'contributor') – somebody who can write and manage their own posts but cannot publish them.<br />
* Subscriber (slug: 'subscriber') – somebody who can only manage their profile.<br />

## 6. step
php artisan vendor:publish --tag=laravel-pagination<br />

## some step
<div id="social-links">
	<ul>
		<li><a href="https://www.facebook.com/sharer/sharer.php?u=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-facebook-official"></span></a></li>
		<li><a href="https://twitter.com/intent/tweet?text=my share text&amp;url=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-twitter"></span></a></li>
		<li><a href="https://plus.google.com/share?url=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-google-plus"></span></a></li>
		<li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://jorenvanhocht.be&amp;title=my share text&amp;summary=dit is de linkedin summary" class="social-button " id=""><span class="fa fa-linkedin"></span></a></li>
	</ul>
</div>