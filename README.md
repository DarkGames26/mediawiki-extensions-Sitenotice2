<div align="center">
<h3>
Sitenotice2 - MediaWiki
</h3>
<p>An extension that improves the appearance of Sitenotice.</p>
</div>

<div align="left">
This extension was built based on the DismissableSiteNotice extension, but with different changes to the HTML and CSS structure to improve its appearance.
</div>

## 🚀 Installation
1. [Download](https://github.com/DarkGames26/mediawiki-extensions-Sitenotice2/archive/refs/heads/main.zip) place the file(s) in a directory called `Sitenotice2` in your `extensions/` folder.
2. Add the following code at the bottom of your LocalSettings.php:
```php
wfLoadExtension( 'Sitenotice2' );
```
3. **✔️Done** - Navigate to Special:Version on your wiki to verify that the extension is successfully installed.

### 👀 Notes
⚠️ This extension should not be used with DismissableSiteNotice. It was created based on that extension, so it has all the functionality that DismissableSiteNotice already had.

## 🧞 Configurations
**Available configurations**

| ⚙️ | Name | Description | Values | Default
:--- | :--- | :--- | :--- | :---
| ⚙️ | `$wgDismissableSiteNoticeForAnons` | This allows to set whether or not it should be possible for anonymous visitors of the wiki to dismiss the sitenotice shown. Available for MW 1.25 + | `true` or `false` | true

